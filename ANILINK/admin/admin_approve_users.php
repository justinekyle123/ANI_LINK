<?php
include 'config.php';
include 'header.php';
include 'sidebar.php';



if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $conn->query("UPDATE users SET status='approved' WHERE id=$id");
}
if (isset($_GET['reject'])) {
    $id = $_GET['reject'];
    $conn->query("UPDATE users SET status='rejected' WHERE id=$id");
}

$result = $conn->query("SELECT * FROM users WHERE role != 'admin' ORDER BY status DESC");
?>

</head>
<body>
<!-- Content -->
<div class="content" id="content">
    <div class="d-flex justify-content-between align-items-center">
        <span class="toggle-btn" id="toggle-btn"><i class="fa-solid fa-bars"></i></span>
        <h3 class="text-white">User Approval</h3>
    </div>

    <div class="card-table mt-4">
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-white">
                <thead>
                    <tr>
                        <th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= ucfirst($row['role']) ?></td>
                        <td>
                            <?php if ($row['status'] == 'pending') { ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php } elseif ($row['status'] == 'approved') { ?>
                                <span class="badge bg-success">Approved</span>
                            <?php } else { ?>
                                <span class="badge bg-danger">Rejected</span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($row['status'] == 'pending') { ?>
                                <a href="?approve=<?= $row['id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-check"></i> Approve</a>
                                <a href="?reject=<?= $row['id'] ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Reject</a>
                            <?php } else { echo "-"; } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once 'footer.php'; ?>