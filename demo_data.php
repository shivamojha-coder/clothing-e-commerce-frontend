<?php
include 'db.php';

try {
    // Add demo users
    $demoUsers = [
        [
            'name' => 'Demo User',
            'email' => 'demo@trends.com',
            'phone' => '9876543210',
            'password' => password_hash('123456', PASSWORD_DEFAULT)
        ],
        [
            'name' => 'Test User',
            'email' => 'test@trends.com', 
            'phone' => '9876543211',
            'password' => password_hash('password', PASSWORD_DEFAULT)
        ]
    ];

    foreach ($demoUsers as $user) {
        // Check if user already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR phone = ?");
        $stmt->execute([$user['email'], $user['phone']]);
        
        if (!$stmt->fetch()) {
            $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password, is_verified) VALUES (?, ?, ?, ?, 1)");
            $stmt->execute([$user['name'], $user['email'], $user['phone'], $user['password']]);
            echo "Added user: " . $user['email'] . " (Phone: " . $user['phone'] . ")<br>";
        } else {
            echo "User already exists: " . $user['email'] . "<br>";
        }
    }
    
    echo "<br><strong>Demo setup complete!</strong><br>";
    echo "<a href='login.php'>Go to Login Page</a>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>