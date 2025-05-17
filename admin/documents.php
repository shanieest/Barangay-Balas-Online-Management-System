<?php
$pageTitle = "Requested Documents";
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
        <h2>Requested Documents</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Documents</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Document Requests</h3>
            <div class="d-flex">
                <div class="input-group me-3" style="width: 250px;">
                    <input type="text" class="form-control" placeholder="Search requests...">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <button class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
            </div>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-4" id="documentsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">Pending (5)</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Completed (12)</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">Rejected (3)</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">All Requests</button>
                </li>
            </ul>
            <div class="tab-content" id="documentsTabContent">
                <div class="tab-pane fade show active" id="pending" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Resident</th>
                                    <th>Document Type</th>
                                    <th>Date Requested</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#BRG-2023-006</td>
                                    <td>Luis Mendoza</td>
                                    <td>Barangay Clearance</td>
                                    <td>May 16, 2023</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary me-1">Process</button>
                                        <button class="btn btn-sm btn-outline-danger">Reject</button>
                                    </td>
                                </tr>
                                <!-- More pending requests would be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="completed" role="tabpanel">
                    <!-- Completed requests table would be here -->
                </div>
                <div class="tab-pane fade" id="rejected" role="tabpanel">
                    <!-- Rejected requests table would be here -->
                </div>
                <div class="tab-pane fade" id="all" role="tabpanel">
                    <!-- All requests table would be here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Document Details Modal -->
    <div class="modal fade" id="documentDetailsModal" tabindex="-1" aria-labelledby="documentDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentDetailsModalLabel">Document Request Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6>Request Information</h6>
                            <p><strong>Request ID:</strong> #BRG-2023-006</p>
                            <p><strong>Date Requested:</strong> May 16, 2023</p>
                            <p><strong>Document Type:</strong> Barangay Clearance</p>
                            <p><strong>Purpose:</strong> Business Permit Application</p>
                        </div>
                        <div class="col-md-6">
                            <h6>Resident Information</h6>
                            <p><strong>Name:</strong> Luis Mendoza</p>
                            <p><strong>Address:</strong> Purok 2, Sitio Masaya</p>
                            <p><strong>Contact:</strong> 09123456787</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="documentNotes" class="form-label">Admin Notes</label>
                        <textarea class="form-control" id="documentNotes" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="documentStatus" class="form-label">Update Status</label>
                        <select class="form-select" id="documentStatus">
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>