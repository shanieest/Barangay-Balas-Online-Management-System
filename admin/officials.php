<?php
$pageTitle = "Barangay Officials";
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
        <h2>Barangay Officials</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Officials</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Officials List</h3>
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addOfficialModal">
                <i class="fas fa-plus me-1"></i> Add Official
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Contact</th>
                            <th>Term Start</th>
                            <th>Term End</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/official1.jpg" alt="Official" class="rounded-circle me-2" width="40" height="40">
                                    <div>Juan Dela Cruz</div>
                                </div>
                            </td>
                            <td>Barangay Captain</td>
                            <td>09123456789</td>
                            <td>June 1, 2023</td>
                            <td>May 31, 2026</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning mx-1" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="assets/img/official2.jpg" alt="Official" class="rounded-circle me-2" width="40" height="40">
                                    <div>Maria Santos</div>
                                </div>
                            </td>
                            <td>Barangay Secretary</td>
                            <td>09123456788</td>
                            <td>June 1, 2023</td>
                            <td>May 31, 2026</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-warning mx-1" data-bs-toggle="tooltip" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- More rows would be added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Official Modal -->
    <div class="modal fade" id="addOfficialModal" tabindex="-1" aria-labelledby="addOfficialModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOfficialModalLabel">Add New Official</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="officialName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="officialName" required>
                        </div>
                        <div class="mb-3">
                            <label for="officialPosition" class="form-label">Position</label>
                            <select class="form-select" id="officialPosition" required>
                                <option value="">Select Position</option>
                                <option value="Captain">Barangay Captain</option>
                                <option value="Secretary">Barangay Secretary</option>
                                <option value="Treasurer">Barangay Treasurer</option>
                                <option value="Councilor">Barangay Councilor</option>
                                <option value="Kagawad">Barangay Kagawad</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="officialContact" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="officialContact">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="termStart" class="form-label">Term Start</label>
                                <input type="date" class="form-control" id="termStart" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="termEnd" class="form-label">Term End</label>
                                <input type="date" class="form-control" id="termEnd" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="officialStatus" class="form-label">Status</label>
                            <select class="form-select" id="officialStatus" required>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="officialPhoto" class="form-label">Photo</label>
                            <input class="form-control" type="file" id="officialPhoto">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Official</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>