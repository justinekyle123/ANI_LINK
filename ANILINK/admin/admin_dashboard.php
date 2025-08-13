<?php
include_once 'config.php';
include_once 'sidebar.php';
include_once 'header.php';

$total_users = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'] ?? 0;
$total_crops = $conn->query("SELECT COUNT(*) AS total FROM crops")->fetch_assoc()['total'] ?? 0;
$total_orders = $conn->query("SELECT COUNT(*) AS total FROM orders")->fetch_assoc()['total'] ?? 0;
?>

<style>
    body {
        background: linear-gradient(120deg, #4CAF50, #8BC34A);
        font-family: 'Segoe UI', sans-serif;
        overflow-x: hidden;
    }

    /* Loading screen */
    #loading-screen {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: #4CAF50;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 2000;
    }
    .loading-spinner {
        border: 6px solid rgba(255,255,255,0.3);
        border-top: 6px solid #fff;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
        100% { transform: rotate(360deg); }
    }

    /* Sidebar */
    .sidebar {
        background: #388E3C;
        height: 100vh;
        color: #fff;
        padding-top: 20px;
        position: fixed;
        left: -240px;
        top: 0;
        width: 240px;
        transition: all 0.4s ease;
        z-index: 1000;
    }
    .sidebar.active {
        left: 0;
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

    /* Content */
    .content {
        padding: 20px;
        transition: margin-left 0.4s ease;
    }
    .content.shift {
        margin-left: 240px;
    }

    /* Toggle Button */
    .toggle-btn {
        font-size: 24px;
        cursor: pointer;
        color: white;
    }

    /* Overlay for mobile */
    .sidebar-overlay {
        position: fixed;
        top: 0;
        left: 0;
        background: rgba(0,0,0,0.5);
        width: 100%;
        height: 100%;
        display: none;
        z-index: 900;
    }

    /* Card style */
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

<!-- Loading Animation -->
<div id="loading-screen">
    <div class="loading-spinner"></div>
</div>

<!-- Overlay for mobile -->
<div class="sidebar-overlay" id="sidebar-overlay"></div>

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
    const overlay = document.getElementById("sidebar-overlay");
    const toggleBtn = document.getElementById("toggle-btn");
    const content = document.getElementById("content");

    function toggleSidebar() {
        sidebar.classList.toggle("active");

        if (window.innerWidth >= 992) { // Desktop
            content.classList.toggle("shift");
        } else { // Mobile
            overlay.style.display = sidebar.classList.contains("active") ? "block" : "none";
        }
    }

    toggleBtn.addEventListener("click", toggleSidebar);
    overlay.addEventListener("click", () => {
        sidebar.classList.remove("active");
        overlay.style.display = "none";
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth >= 992) {
            overlay.style.display = "none";
            if (!sidebar.classList.contains("active")) {
                sidebar.classList.add("active");
                content.classList.add("shift");
            }
        } else {
            content.classList.remove("shift");
            sidebar.classList.remove("active");
        }
    });

    if (window.innerWidth >= 992) {
        sidebar.classList.add("active");
        content.classList.add("shift");
    }

    // Loading animation hide
    window.addEventListener("load", () => {
        document.getElementById("loading-screen").style.display = "none";
    });
</script>
</body>
</html>
