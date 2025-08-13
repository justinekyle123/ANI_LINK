<!-- Overlay for mobile -->
<div class="sidebar-overlay" id="sidebar-overlay"></div>

<div class="sidebar" id="sidebar">
    <h4 class="text-center mb-4"><i class="fa-solid fa-leaf"></i> AniLink</h4>
    <a href="#"><i class="fa-solid fa-gauge"></i> Dashboard</a>
    <a href="#"><i class="fa-solid fa-users"></i> Manage Users</a>
    <a href="#"><i class="fa-solid fa-seedling"></i> Manage Crops</a>
    <a href="#"><i class="fa-solid fa-cart-shopping"></i> Orders</a>
    <a href="#"><i class="fa-solid fa-credit-card"></i> Payments</a>
        <a href="admin_approve_users.php"><i class="fa-solid fa-user-check"></i> User Approval</a> 
    <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</div>


<style>
    body {
        background: linear-gradient(120deg, #4CAF50, #8BC34A);
        font-family: 'Segoe UI', sans-serif;
        overflow-x: hidden;
    }
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
    .sidebar.active { left: 0; }
    .sidebar a {
        color: #fff;
        padding: 12px 20px;
        display: block;
        text-decoration: none;
        transition: 0.3s;
    }
    .sidebar a:hover, .sidebar a.active {
        background: rgba(255, 255, 255, 0.2);
        padding-left: 30px;
    }
    .content {
        padding: 20px;
        transition: margin-left 0.4s ease;
    }
    .content.shift { margin-left: 240px; }
    .toggle-btn {
        font-size: 24px;
        cursor: pointer;
        color: white;
    }
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
    .card-table {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border-radius: 12px;
        padding: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        color: white;
    }
    .table th {
        background: rgba(72, 136, 72, 0.7);
        color: white;
    }
    .btn-success {
        background: #4CAF50;
        border: none;
    }
    .btn-danger {
        background: #c0392b;
        border: none;
    }
</style>