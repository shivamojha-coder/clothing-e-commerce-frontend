<?php
header('Content-Type: application/json');
include 'db.php';

function verifyOTPResponse($success, $message, $data = null) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data
    ]);
    exit();
}

if (!isset($_GET['phone']) || !isset($_GET['otp'])) {
    verifyOTPResponse(false, 'Phone number and OTP are required');
}

$phone = cleanPhoneNumber($_GET['phone']);
$inputOtp = $_GET['otp'];

if (empty($phone) || empty($inputOtp)) {
    verifyOTPResponse(false, 'Invalid input');
}

if (strlen($inputOtp) != 6 || !ctype_digit($inputOtp)) {
    verifyOTPResponse(false, 'OTP must be 6 digits');
}

try {
    // Get the latest unused OTP for this phone
    $stmt = $conn->prepare("
        SELECT id, otp, expires_at, attempts 
        FROM login_otps 
        WHERE phone = ? AND is_used = 0 AND expires_at > datetime('now') 
        ORDER BY created_at DESC 
        LIMIT 1
    ");
    $stmt->execute([$phone]);
    $otpRecord = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$otpRecord) {
        verifyOTPResponse(false, 'OTP expired or not found. Please request a new one');
    }

    // Check attempts limit (max 3 attempts per OTP)
    if ($otpRecord['attempts'] >= 3) {
        // Mark OTP as used to prevent further attempts
        $updateStmt = $conn->prepare("UPDATE login_otps SET is_used = 1 WHERE id = ?");
        $updateStmt->execute([$otpRecord['id']]);
        
        verifyOTPResponse(false, 'Too many incorrect attempts. Please request a new OTP');
    }

    // Increment attempt counter
    $incrementStmt = $conn->prepare("UPDATE login_otps SET attempts = attempts + 1 WHERE id = ?");
    $incrementStmt->execute([$otpRecord['id']]);

    // Verify OTP
    if ($inputOtp === $otpRecord['otp']) {
        // Mark OTP as used
        $markUsedStmt = $conn->prepare("UPDATE login_otps SET is_used = 1 WHERE id = ?");
        $markUsedStmt->execute([$otpRecord['id']]);

        // Clean up old OTPs for this phone
        $cleanupStmt = $conn->prepare("DELETE FROM login_otps WHERE phone = ? AND id != ?");
        $cleanupStmt->execute([$phone, $otpRecord['id']]);

        verifyOTPResponse(true, 'OTP verified successfully', [
            'phone' => $phone,
            'verified_at' => date('Y-m-d H:i:s')
        ]);
    } else {
        $remainingAttempts = 3 - ($otpRecord['attempts']);
        $message = "Invalid OTP";
        if ($remainingAttempts > 0) {
            $message .= ". $remainingAttempts attempts remaining";
        }
        
        verifyOTPResponse(false, $message);
    }

} catch (Exception $e) {
    error_log("OTP verification error: " . $e->getMessage());
    verifyOTPResponse(false, 'Internal error. Please try again later');
}
?>