<?php
$pageTitle = "Dashboard";
?>
<?php include 'includes/header.php'; ?>

<?php include 'includes/sidebar.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<main class="main-content">
    <div class="page-header">
        <h2>Dashboard</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Residents</h6>
                            <h3 class="mb-0">1,245</h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded">
                            <i class="fas fa-users text-primary fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-success"><i class="fas fa-caret-up me-1"></i> 5.2%</span>
                        <span class="text-muted">since last month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Pending Requests</h6>
                            <h3 class="mb-0">12</h3>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded">
                            <i class="fas fa-file-alt text-warning fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-danger"><i class="fas fa-caret-up me-1"></i> 2.4%</span>
                        <span class="text-muted">since last month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Barangay Officials</h6>
                            <h3 class="mb-0">15</h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded">
                            <i class="fas fa-user-tie text-success fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-success"><i class="fas fa-caret-up me-1"></i> 1.1%</span>
                        <span class="text-muted">since last month</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">New Residents</h6>
                            <h3 class="mb-0">24</h3>
                        </div>
                        <div class="bg-info bg-opacity-10 p-3 rounded">
                            <i class="fas fa-user-plus text-info fs-3"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="text-success"><i class="fas fa-caret-up me-1"></i> 8.7%</span>
                        <span class="text-muted">since last month</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Recent Document Requests</h3>
                    <a href="documents.php" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Resident Name</th>
                                    <th>Document Type</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#BRG-2023-001</td>
                                    <td>Juan Dela Cruz</td>
                                    <td>Barangay Clearance</td>
                                    <td>May 15, 2023</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BRG-2023-002</td>
                                    <td>Maria Santos</td>
                                    <td>Certificate of Residency</td>
                                    <td>May 14, 2023</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BRG-2023-003</td>
                                    <td>Pedro Reyes</td>
                                    <td>Business Permit</td>
                                    <td>May 13, 2023</td>
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BRG-2023-004</td>
                                    <td>Ana Lopez</td>
                                    <td>Barangay ID</td>
                                    <td>May 12, 2023</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#BRG-2023-005</td>
                                    <td>Carlos Garcia</td>
                                    <td>Certificate of Indigency</td>
                                    <td>May 11, 2023</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Recent Registered Residents</h3>
                    <a href="residents.php" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Juan Dela Cruz</h6>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Purok 1, Sitio Maligaya</p>
                            <small>Registered: May 12, 2023</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Maria Santos</h6>
                                <small>4 days ago</small>
                            </div>
                            <p class="mb-1">Purok 2, Sitio Masaya</p>
                            <small>Registered: May 11, 2023</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Pedro Reyes</h6>
                                <small>5 days ago</small>
                            </div>
                            <p class="mb-1">Purok 3, Sitio Mabuhay</p>
                            <small>Registered: May 10, 2023</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Ana Lopez</h6>
                                <small>1 week ago</small>
                            </div>
                            <p class="mb-1">Purok 4, Sitio Pag-asa</p>
                            <small>Registered: May 5, 2023</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Carlos Garcia</h6>
                                <small>1 week ago</small>
                            </div>
                            <p class="mb-1">Purok 5, Sitio Bagong Buhay</p>
                            <small>Registered: May 4, 2023</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://kit.fontawesome.com/a076d05399.js" ;crossorigin="anonymous">
<?php include 'includes/footer.php'; ?>