<?php
session_start();
include 'db.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $phone = cleanPhoneNumber($_POST["phone"]);
        $password = $_POST["password"];
        
        // Basic validation
        if (empty($name) || empty($email) || empty($phone) || empty($password)) {
            $error = "All fields are required.";
        } elseif (strlen($phone) != 10) {
            $error = "Please enter a valid 10-digit phone number.";
        } elseif (strlen($password) < 6) {
            $error = "Password must be at least 6 characters long.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Please enter a valid email address.";
        } else {
            try {
                // Check if email already exists
                $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
                $stmt->execute([$email]);
                if ($stmt->fetch()) {
                    $error = "Email already registered. Please login.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password, is_verified) VALUES (?, ?, ?, ?, 1)");
                    if ($stmt->execute([$name, $email, $phone, $hashedPassword])) {
                        $success = "Registration successful! Your account has been created. You can now login.";
                    } else {
                        $error = "Registration failed. Please try again.";
                    }
                }
            } catch (Exception $e) {
                $error = "An error occurred. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Trends</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
            overflow: hidden;
        }
        .animated-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: -1;
            pointer-events: none;
        }
        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.3;
            animation: float 8s infinite ease-in-out;
        }
        .circle1 { width: 180px; height: 180px; background: #5c6ac4; left: 10vw; top: 10vh; animation-delay: 0s; }
        .circle2 { width: 120px; height: 120px; background: #f59e0b; right: 12vw; top: 20vh; animation-delay: 2s; }
        .circle3 { width: 90px; height: 90px; background: #4a5499; left: 30vw; bottom: 10vh; animation-delay: 4s; }
        .circle4 { width: 140px; height: 140px; background: #cfdef3; right: 20vw; bottom: 8vh; animation-delay: 1s; }
        @keyframes float {
            0% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.08); }
            100% { transform: translateY(0) scale(1); }
        }

        .register-container {
            background: rgba(255,255,255,0.92);
            backdrop-filter: blur(10px);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 1.2s;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo h1 {
            color: #333;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .logo p {
            color: #666;
            font-size: 1rem;
        }

        .security-notice {
            background: #e3f2fd;
            border: 1px solid #2196f3;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .security-notice i {
            color: #1976d2;
            margin-right: 0.5rem;
        }

        .security-notice p {
            color: #1976d2;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-group input:focus {
            box-shadow: 0 0 0 3px #5c6ac433;
        }

        .form-group i {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            margin-top: 12px;
        }

        .btn-primary {
            width: 100%;
            background: linear-gradient(90deg, #5c6ac4 0%, #f59e0b 100%);
            color: #fff;
            border: none;
            border-radius: 24px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(31,38,135,0.08);
            transition: background 0.3s, transform 0.2s;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #f59e0b 0%, #5c6ac4 100%);
            transform: scale(1.08);
        }

        .btn-secondary {
            width: 100%;
            background: #20c997;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background: #1ba085;
            transform: translateY(-1px);
        }

        .otp-choice-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .otp-choice-btn {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .otp-choice-btn:hover {
            border-color: #2575fc;
            background: #e3f2fd;
        }

        .otp-choice-btn.selected {
            border-color: #2575fc;
            background: #e3f2fd;
            color: #1976d2;
        }

        .otp-choice-btn i {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #2575fc;
        }

        .error-message, .success-message {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .register-form, .otp-form, .otp-choice-form {
            display: none;
        }

        .register-form.active, .otp-form.active, .otp-choice-form.active {
            display: block;
        }

        .otp-input {
            text-align: center;
            font-size: 24px;
            letter-spacing: 8px;
            font-weight: 600;
        }

        .back-to-register {
            text-align: center;
            margin-top: 1rem;
        }

        .back-to-register a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 600;
        }

        .back-to-register a:hover {
            text-decoration: underline;
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e9ecef;
        }

        .login-link a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .register-container {
                padding: 1.5rem;
                margin: 10px;
            }

            .logo h1 {
                font-size: 1.8rem;
            }

            .otp-choice-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="animated-bg">
        <div class="circle circle1"></div>
        <div class="circle circle2"></div>
        <div class="circle circle3"></div>
        <div class="circle circle4"></div>
    </div>
    <div class="register-container">
        <div class="logo">
            <h1><i class="fas fa-shopping-bag"></i> Trends</h1>
            <p>Create your account</p>
        </div>
        <?php if (!empty($error)): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="success-message">
                <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success); ?>
            </div>
        <?php endif; ?>
        <?php if (empty($success)): ?>
        <form method="POST" class="register-form active">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
                <i class="fas fa-user"></i>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter 10-digit phone number" required>
                <i class="fas fa-phone"></i>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit" name="register" class="btn-primary">
                <i class="fas fa-arrow-right"></i> Register
            </button>
        </form>
        <?php endif; ?>
        <div class="login-link">
            <p>Already have an account? <a href="login.php">Sign in here</a></p>
        </div>
    </div>
</body>
</html>