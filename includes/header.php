<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Barangay Balas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .navbar-custom {
      background-color: #003366;
    }
    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link {
      color: white;
    }
    .navbar-custom .nav-link:hover,
    .dropdown-menu .dropdown-item:hover {
      color: #cc0000;
    }
    .dropdown-submenu {
      position: relative;
    }
    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-left: 0.1rem;
      display: none;
    }
    .dropdown-submenu.show > .dropdown-menu {
      display: block;
    }
    .dropdown-submenu:hover > .dropdown-menu {
        display: block;
        position: absolute;
        top: 0;
        left: 100%;
        margin-top: -1px;
        }

        .dropdown-menu > .dropdown-submenu {
        position: relative;
        }

  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">Province of Pampanga</a>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg  sticky-top" style="background-color: white;">
    <div class="container">
    <img src="assets\img\balas-logo.png" alt="Barangay Balas Logo" class="img-fluid" style="width: 80px; height: 80px; margin-left: 5px ;" />
      <a class="navbar-brand fw-bolder" href="index.php">
          Barangay Balas <br>Mexico, Pampanga
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
      </button>

      <div class="collapse navbar-collapse font-monospace" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">Services</a>
            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">

              <li class="dropdown-submenu">
                <a class="dropdown-item " href="#">Barangay Certifications</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#residency">Certificate of Residency</a></li>
                  <li><a class="dropdown-item" href="#">Certificate of Indigency</a></li>
                </ul>
              </li>

              <li class="dropdown-submenu">
                <a class="dropdown-item" href="#">Barangay Clearance</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#business">Business Clearance</a></li>
                  <li><a class="dropdown-item" href="#employment">Employment Clearance</a></li>
                </ul>
              </li>

            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="barangayDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">Barangay</a>
            <ul class="dropdown-menu" aria-labelledby="barangayDropdown">

                <li class="dropdown-submenu">
                    <a class="dropdown-item " href="#">Barangay Captain</a>
                    <a class="dropdown-item " href="#">Barangay Councils</a>
                    <a class="dropdown-item " href="#">Barangay Committees</a>
                    <a class="dropdown-item " href="#">Sangguniang Kabataan</a>
                    <a class="dropdown-item " href="#">Barangay Org Chart</a>
                </li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="publicationDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">Publications</a>
            <ul class="dropdown-menu" aria-labelledby="pubicationDropdown">

                <li class="dropdown-submenu">
                    <a class="dropdown-item " href="#">Barangay Ordinance</a>
                    <a class="dropdown-item " href="#">Barangay Order</a>
                    <a class="dropdown-item " href="#">Barangay Resolution</a>
                    
                </li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#jobs">Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#news">News & Events</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Enable multi-level dropdown
    document.querySelectorAll('.dropdown-submenu > a').forEach(function (element) {
      element.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        // Close other open submenus
        document.querySelectorAll('.dropdown-submenu').forEach(function (submenu) {
          if (submenu !== element.parentElement) {
            submenu.classList.remove('show');
          }
        });

        // Toggle current submenu
        element.parentElement.classList.toggle('show');
      });
    });

    // Close all submenus when clicking outside
    document.addEventListener('click', function (e) {
      document.querySelectorAll('.dropdown-submenu').forEach(function (submenu) {
        submenu.classList.remove('show');
      });
    });
  </script>
</body>
</html>
