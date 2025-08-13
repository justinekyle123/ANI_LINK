<?php
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, password, role, status) 
            VALUES ('$name', '$email', '$pass', '$role', 'pending')";
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
    body {
        background: url('https://images.unsplash.com/photo-1501004318641-b39e6451bec6') no-repeat center center/cover;
        font-family: 'Segoe UI', sans-serif;
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
                <option value="buyer">Buyer</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success w-100">Register</button>
    </form>
</div>

</body>
</html>
