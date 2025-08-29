<?php
session_start();
include 'db.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginType = $_POST["login_type"];
    
    if ($loginType == "email") {
        // Email/password login
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if (empty($email) || empty($password)) {
            $error = "Please enter both email and password.";
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user["password"])) {
                if ($user["is_verified"] == 1) {
                    $_SESSION["user_id"] = $user["id"];
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Please verify your account before login.";
                }
            } else {
                $error = "Invalid email or password.";
            }
        }
    } elseif ($loginType == "phone") {
        // Phone/password login
        $phone = cleanPhoneNumber($_POST["phone"]);
        $password = $_POST["password"];
        
        if (empty($phone) || empty($password)) {
            $error = "Please enter both phone number and password.";
        } elseif (strlen($phone) != 10) {
            $error = "Please enter a valid 10-digit phone number.";
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE phone = ?");
            $stmt->execute([$phone]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user["password"])) {
                if ($user["is_verified"] == 1) {
                    $_SESSION["user_id"] = $user["id"];
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Please verify your account before login.";
                }
            } else {
                $error = "Invalid phone number or password.";
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
    <title>Login - Trends</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(120deg, #667eea 0%, #764ba2 100%);
            animation: gradientMove 8s ease-in-out infinite alternate;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }
        .login-container {
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(16px);
            border-radius: 24px;
            border: 1px solid rgba(255,255,255,0.18);
            padding: 2.8rem 2.2rem;
            max-width: 420px;
            width: 100%;
            position: relative;
            overflow: hidden;
            animation: fadeInForm 1.2s;
        }
        @keyframes fadeInForm {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-container::before {
            content: '';
            position: absolute;
            top: -40px; left: -40px;
            width: 120px; height: 120px;
            background: linear-gradient(135deg, #20c997 0%, #2575fc 100%);
            opacity: 0.18;
            border-radius: 50%;
            z-index: 0;
        }
        .logo {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }
        .logo h1 {
            color: #333;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            letter-spacing: 1px;
        }
        .logo p {
            color: #666;
            font-size: 1rem;
        }
        .login-tabs {
            display: flex;
            margin-bottom: 2rem;
            background: rgba(255,255,255,0.18);
            border-radius: 12px;
            padding: 4px;
            box-shadow: 0 2px 8px rgba(37, 117, 252, 0.08);
        }
        .tab-button {
            flex: 1;
            background: none;
            border: none;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
            font-weight: 600;
            color: #666;
            font-size: 1rem;
            position: relative;
            z-index: 1;
        }
        .tab-button.active {
            background: linear-gradient(90deg, #2575fc 0%, #20c997 100%);
            color: white;
            box-shadow: 0 2px 8px rgba(37, 117, 252, 0.18);
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
            border-radius: 12px;
            font-size: 16px;
            transition: border 0.3s, box-shadow 0.3s;
            background: rgba(255,255,255,0.85);
        }
        .form-group input:focus {
            outline: none;
            border-color: #2575fc;
            box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.12);
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
            background: linear-gradient(135deg, #2575fc, #20c997);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(37, 117, 252, 0.08);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #20c997, #2575fc);
            transform: scale(1.04);
            box-shadow: 0 8px 25px rgba(37, 117, 252, 0.18);
        }
        .btn-primary:active {
            transform: scale(1);
        }
        .error-message, .success-message {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-weight: 500;
            font-size: 1rem;
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
        .login-form {
            display: none;
        }
        .login-form.active {
            display: block;
        }
        .divider {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
            color: #666;
        }
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e9ecef;
            z-index: 1;
        }
        .divider span {
            background: rgba(255,255,255,0.95);
            padding: 0 1rem;
            position: relative;
            z-index: 2;
        }
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e9ecef;
        }
        .register-link a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }
        .register-link a:hover {
            color: #20c997;
            text-decoration: underline;
        }
        @media (max-width: 480px) {
            .login-container {
                padding: 1.2rem;
                margin: 10px;
            }
            .logo h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1><i class="fas fa-shopping-bag"></i> Trends</h1>
            <p>Welcome back! Please sign in to your account</p>
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
        <div class="login-tabs">
            <button type="button" class="tab-button active" onclick="switchTab('email')">
                <i class="fas fa-envelope"></i> Email
            </button>
            <button type="button" class="tab-button" onclick="switchTab('phone')">
                <i class="fas fa-phone"></i> Phone
            </button>
        </div>
        <form method="POST" class="login-form active" id="email-form">
            <input type="hidden" name="login_type" value="email">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
                <i class="fas fa-envelope"></i>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit" class="btn-primary">
                <i class="fas fa-sign-in-alt"></i> Sign In
            </button>
        </form>
        <form method="POST" class="login-form" id="phone-form">
            <input type="hidden" name="login_type" value="phone">
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter 10-digit phone number" required>
                <i class="fas fa-phone"></i>
            </div>
            <div class="form-group">
                <label for="phone_password">Password</label>
                <input type="password" id="phone_password" name="password" required>
                <i class="fas fa-lock"></i>
            </div>
            <button type="submit" class="btn-primary">
                <i class="fas fa-sign-in-alt"></i> Sign In
            </button>
            <div class="divider">
                <span>Simple and secure login</span>
            </div>
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Sign up </a></p>
        </div>
    </div>
    <script>
        function switchTab(type) {
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            document.querySelectorAll('.login-form').forEach(form => {
                form.classList.remove('active');
            });
            document.getElementById(type + '-form').classList.add('active');
        }
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('phone');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);
                });
            }
        });
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Please wait...';
                    submitBtn.disabled = true;
                }
            });
        });
    </script>
</body>
</html>