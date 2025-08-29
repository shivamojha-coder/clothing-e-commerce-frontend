<?php
// Simple SQLite database connection for demo
$host = __DIR__ . "/database.sqlite";

try {
    $conn = new PDO("sqlite:$host");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create tables if they don't exist
    $conn->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            email TEXT UNIQUE,
            phone TEXT UNIQUE,
            password TEXT,
            is_verified INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");
    
    $conn->exec("
        CREATE TABLE IF NOT EXISTS login_otps (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            contact_info TEXT NOT NULL,
            contact_type TEXT NOT NULL CHECK(contact_type IN ('phone', 'email')),
            otp TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            expires_at DATETIME NOT NULL,
            is_used INTEGER DEFAULT 0,
            attempts INTEGER DEFAULT 0
        )
    ");
    
    $conn->exec("
        CREATE TABLE IF NOT EXISTS login_attempts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            contact_info TEXT NOT NULL,
            contact_type TEXT NOT NULL CHECK(contact_type IN ('phone', 'email')),
            attempt_time DATETIME DEFAULT CURRENT_TIMESTAMP,
            ip_address TEXT
        )
    ");
    
    $conn->exec("
        CREATE TABLE IF NOT EXISTS orders (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            order_number TEXT UNIQUE NOT NULL,
            total_amount DECIMAL(10,2) NOT NULL,
            status TEXT DEFAULT 'pending',
            order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
            shipping_address TEXT,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )
    ");
    
    $conn->exec("
        CREATE TABLE IF NOT EXISTS order_items (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            order_id INTEGER NOT NULL,
            product_name TEXT NOT NULL,
            product_image TEXT,
            quantity INTEGER NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            size TEXT,
            color TEXT,
            FOREIGN KEY (order_id) REFERENCES orders(id)
        )
    ");
    
    $conn->exec("
        CREATE TABLE IF NOT EXISTS products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            description TEXT,
            price DECIMAL(10,2) NOT NULL,
            category TEXT NOT NULL,
            image_url TEXT,
            sizes TEXT,
            colors TEXT,
            stock INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");
    
} catch (Exception $e) {
    error_log("Database connection error: " . $e->getMessage());
    die("Database connection failed. Please try again later.");
}

// Function to clean phone number
function cleanPhoneNumber($phone) {
    // Remove all non-numeric characters
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    // If phone starts with country code, normalize it
    if (strlen($phone) > 10 && substr($phone, 0, 2) == '91') {
        $phone = substr($phone, 2);
    }
    
    return $phone;
}

// Function to check rate limiting
function checkRateLimit($conn, $contactInfo, $contactType, $maxAttempts = 5, $timeWindow = 900) { // 15 minutes
    if ($contactType == 'phone') {
        $contactInfo = cleanPhoneNumber($contactInfo);
    }
    $timeLimit = date('Y-m-d H:i:s', time() - $timeWindow);
    
    $stmt = $conn->prepare("SELECT COUNT(*) as attempt_count FROM login_attempts WHERE contact_info = ? AND contact_type = ? AND attempt_time > ?");
    $stmt->execute([$contactInfo, $contactType, $timeLimit]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $row['attempt_count'] < $maxAttempts;
}

// Function to log login attempt
function logLoginAttempt($conn, $contactInfo, $contactType) {
    if ($contactType == 'phone') {
        $contactInfo = cleanPhoneNumber($contactInfo);
    }
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    
    $stmt = $conn->prepare("INSERT INTO login_attempts (contact_info, contact_type, ip_address) VALUES (?, ?, ?)");
    $stmt->execute([$contactInfo, $contactType, $ip]);
}
?>