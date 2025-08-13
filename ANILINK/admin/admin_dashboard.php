<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "anilink_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example query (count users)
$total_users = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$total_crops = $conn->query("SELECT COUNT(*) AS total FROM crops")->fetch_assoc()['total'];
$total_orders = $conn->query("SELECT COUNT(*) AS total FROM orders")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AniLink Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
    body {
        background: linear-gradient(120deg, #4CAF50, #8BC34A);
        font-family: 'Segoe UI', sans-serif;
        overflow-x: hidden;
    }
    .sidebar {
        background: #388E3C;
        min-height: 100vh;
        color: #fff;
        padding-top: 20px;
        position: fixed;
        left: 0;
        top: 0;
        width: 240px;
        transform: translateX(-240px);
        transition: all 0.4s ease;
    }
    .sidebar.active {
        transform: translateX(0);
    }
    .sidebar a {
        color: #fff;
        padding: 12px 20px;
        display: block;
        text-decoration: none;
        transition: 0.3s;
    }
    .sidebar a:hover {
        background: rgba(255, 255, 255, 0.2);
        padding-left: 30px;
    }
    .content {
        margin-left: 0;
        transition: all 0.4s ease;
        padding: 20px;
    }
    .content.active {
        margin-left: 240px;
    }
    .toggle-btn {
        font-size: 24px;
        cursor: pointer;
        color: white;
    }
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h4 class="text-center mb-4"><i class="fa-solid fa-leaf"></i> AniLink</h4>
    <a href="#"><i class="fa-solid fa-gauge"></i> Dashboard</a>
    <a href="#"><i class="fa-solid fa-users"></i> Manage Users</a>
    <a href="#"><i class="fa-solid fa-seedling"></i> Manage Crops</a>
    <a href="#"><i class="fa-solid fa-cart-shopping"></i> Orders</a>
    <a href="#"><i class="fa-solid fa-credit-card"></i> Payments</a>
    <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>

<!-- Content -->
<div class="content" id="content">
    <div class="d-flex justify-content-between align-items-center">
        <span class="toggle-btn" id="toggle-btn"><i class="fa-solid fa-bars"></i></span>
        <h3 class="text-white">Admin Dashboard</h3>
    </div>

    <div class="row mt-4">
        <div class="col-md-4 mb-3">
            <div class="card p-3 bg-success text-white">
                <h5><i class="fa-solid fa-users"></i> Total Users</h5>
                <h3><?php echo $total_users; ?></h3>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card p-3 bg-warning text-dark">
                <h5><i class="fa-solid fa-seedling"></i> Total Crops</h5>
                <h3><?php echo $total_crops; ?></h3>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card p-3 bg-info text-white">
                <h5><i class="fa-solid fa-cart-shopping"></i> Total Orders</h5>
                <h3><?php echo $total_orders; ?></h3>
            </div>
        </div>
    </div>
</div>

<script>
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");
    document.getElementById("toggle-btn").addEventListener("click", function(){
        sidebar.classList.toggle("active");
        content.classList.toggle("active");
    });
</script>
</body>
</html>
