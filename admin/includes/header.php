<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Balas | <?php echo isset($pageTitle) ? $pageTitle : 'Admin'; ?></title>

    <!-- Bootstrap 4.6 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header d-flex justify-content-between align-items-center p-3">
        <div class="d-flex align-items-center">
            <div class="logo d-flex align-items-center">
                <img src="assets/img/logo_balas.jpg" alt="Barangay Logo" style="height: 40px;" class="mr-2">
                <h1 class="h5 m-0">Barangay Admin</h1>
            </div>
            <button id="sidebarToggle" class="btn btn-link mr-3">
                <i class="fas fa-bars"></i>
            </button>

            

<nav class="sidebar">
    
    <ul class="sidebar-menu">
        <li>
            <a href="dashboard.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="officials.php">
                <i class="fas fa-users"></i>
                <span>Barangay Officials</span>
            </a>
        </li>
        <li>
            <a href="documents.php">
                <i class="fas fa-file-alt"></i>
                <span>Requested Documents</span>
                <span class="badge bg-danger float-end"></span>
            </a>
        </li>
        <li>
            <a href="residents.php">
                <i class="fas fa-address-book"></i>
                <span>Residents</span>
            </a>
        </li>
    </ul>
</nav>
        </div>
        <div class="user-info">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="assets/img/logo_balas.jpg" alt="Admin Avatar" class="rounded-circle mr-2" style="height: 32px;">
                    <span class="user-name">Admin User</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-2"></i> Profile</a>
                    <a class="dropdown-item" href="settings.php"><i class="fas fa-cog mr-2"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="index.php"><i class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                </div>
            </div>
        </div>
    </header>

    <!-- ✅ Bootstrap 4 JS Bundle + jQuery + Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
