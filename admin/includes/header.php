<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Barangay Balas | Admin</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />
  <style>
    body {
      transition: padding-left 0.3s ease;
    }
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      height: 100vh;
      background-color: #f8f9fa;
      padding-top: 60px; /* height of header */
      overflow-y: auto;
      transition: transform 0.3s ease;
      z-index: 1040;
      transform: translateX(0);
      
    }
    .sidebar.hidden {
      transform: translateX(-100%);
    }
    body.with-sidebar {
      padding-left: 220px;
    }
    header.header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 60px;
      background-color: #ffffff;
      border-bottom: 1px solid #ddd;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 15px;
      z-index: 1050;
    }
    main.main-content {
      padding: 80px 20px 20px 20px; /* some top padding for header */
    }
    .logo img {
      height: 40px;
      margin-right: 10px;
    }
    .logo h1 {
      margin: 0;
      font-size: 1.25rem;
    }
    #sidebarToggle {
      font-size: 1.5rem;
      border: none;
      background: none;
      color: #333;
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="d-flex align-items-center">
      <button id="sidebarToggle" aria-label="Toggle sidebar">
        <i class="fas fa-bars"></i>
      </button>
      <div class="logo d-flex align-items-center ms-3">
        <img src="assets/img/logo_balas.jpg" alt="Barangay Logo" />
        <h1>Barangay Admin</h1>
      </div>
    </div>
    <div class="user-info dropdown">
      <a
        href="#"
        class="d-flex align-items-center text-decoration-none dropdown-toggle"
        id="userDropdown"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        <img
          src="assets/img/logo_balas.jpg"
          alt="Admin Avatar"
          class="rounded-circle me-2"
          style="height: 40px; width: 40px;"
        />
        <span class="user-name">Admin User</span>
      </a>
      <ul
        class="dropdown-menu dropdown-menu-end"
        aria-labelledby="userDropdown"
      >
        <li>
          <a class="dropdown-item" href="profile.php"
            ><i class="fas fa-user me-2"></i> Profile</a
          >
        </li>
        <li>
          <a class="dropdown-item" href="settings.php"
            ><i class="fas fa-cog me-2"></i> Settings</a
          >
        </li>
        <li><hr class="dropdown-divider" /></li>
        <li>
          <a class="dropdown-item" href="index.php"
            ><i class="fas fa-sign-out-alt me-2"></i> Logout</a
          >
        </li>
      </ul>
    </div>
  </header>

  <nav id="sidebar" class="sidebar">
  <ul class="list-unstyled">
    <li>
      <a href="dashboard.php" class="d-block py-2 px-3 text-dark text-decoration-none">
        <i class="fas fa-home me-2"></i>Dashboard
      </a>
    </li>
    <li>
      <a href="residents.php" class="d-block py-2 px-3 text-dark text-decoration-none">
        <i class="fas fa-users me-2"></i>Residents
      </a>
    </li>
    <li>
      <a href="documents.php" class="d-block py-2 px-3 text-dark text-decoration-none">
        <i class="fas fa-file-alt me-2"></i>Requested Documents
      </a>
    </li>
    <li>
      <a href="officials.php" class="d-block py-2 px-3 text-dark text-decoration-none">
        <i class="fas fa-person-alt me-2"></i>Officials List
      </a>
    </li>
    <li>
      <a href="announcements.php" class="d-block py-2 px-3 text-dark text-decoration-none">
        <i class="fas fa-person-alt me-2"></i>News & Events
      </a>
    </li>
  </ul>
</nav>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const sidebar = document.getElementById("sidebar");
      const toggleBtn = document.getElementById("sidebarToggle");

      toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("hidden");
        document.body.classList.toggle("with-sidebar");
      });

      // Initialize sidebar shown by default on load
      document.body.classList.add("with-sidebar");
    });
  </script>
</body>
</html>
