<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, password, role, location, contact_no, verified) 
            VALUES ('$name', '$email', '$pass', '$role', '', '', 0)";
    if ($conn->query($sql)) {
        echo "<script>alert('Registration submitted! Please wait for admin approval.'); window.location='login.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register - AniLink</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
    body, html {
        height: 100%;
        margin: 0;
        overflow: hidden;
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(120deg, #4CAF50, #8BC34A);
    }
    svg {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    .register-box {
        max-width: 450px;
        margin: 80px auto;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        color: white;
        animation: slideDown 0.8s ease;
        z-index: 2;
        position: relative;
    }
    .register-box h3 {
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
        color: #fff;
    }
    .form-control {
        background: rgba(255,255,255,0.2);
        border: none;
        color: white;
    }
    .form-control::placeholder {
        color: #ddd;
    }
    .btn-success {
        background: #4CAF50;
        border: none;
        transition: 0.3s;
    }
    .btn-success:hover {
        background: #45a049;
    }
    @keyframes slideDown {
        from { transform: translateY(-30px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>
</head>
<body>

<!-- SVG Animated Background -->
<svg>
    <circle cx="20%" cy="20%" r="80" fill="rgba(255,255,255,0.1)">
        <animate attributeName="cx" values="20%;80%;20%" dur="10s" repeatCount="indefinite"/>
        <animate attributeName="cy" values="20%;80%;20%" dur="12s" repeatCount="indefinite"/>
    </circle>
    <circle cx="80%" cy="80%" r="100" fill="rgba(255,255,255,0.15)">
        <animate attributeName="cx" values="80%;20%;80%" dur="15s" repeatCount="indefinite"/>
        <animate attributeName="cy" values="80%;30%;80%" dur="18s" repeatCount="indefinite"/>
    </circle>
    <circle cx="50%" cy="50%" r="60" fill="rgba(255,255,255,0.05)">
        <animate attributeName="r" values="60;100;60" dur="8s" repeatCount="indefinite"/>
    </circle>
</svg>

<div class="register-box">
    <h3><i class="fa-solid fa-seedling"></i> AniLink Registration</h3>
    <form method="POST">
        <div class="mb-3">
            <label><i class="fa-solid fa-user"></i> Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label><i class="fa-solid fa-envelope"></i> Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>
        <div class="mb-3">
            <label><i class="fa-solid fa-lock"></i> Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>
        <div class="mb-3">
            <label><i class="fa-solid fa-user-tag"></i> Role</label>
            <select name="role" class="form-control" required>
                <option value="farmer">Farmer</option>
                <option value="market">Market</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success w-100">Register</button>
    </form>
</div>

</body>
</html>
