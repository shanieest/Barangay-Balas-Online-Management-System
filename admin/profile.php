<?php
$pageTitle = "Admin Profile";
?>
<?php include 'includes/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<main class="main-content">
    <div class="page-header">
        <h2>My Profile</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        <img src="assets/img/admin-avatar.jpg" class="rounded-circle mb-3" width="150" height="150" alt="Profile">
                        <a href="#" class="position-absolute bottom-0 end-0 bg-primary rounded-circle p-2 text-white" data-bs-toggle="modal" data-bs-target="#changePhotoModal">
                            <i class="fas fa-camera"></i>
                        </a>
                    </div>
                    <h4>Admin User</h4>
                    <p class="text-muted mb-1">Barangay Administrator</p>
                    <p class="text-muted">Since June 2022</p>
                    <div class="d-flex justify-content-center mb-3">
                        <button class="btn btn-primary me-2">Edit Profile</button>
                        <button class="btn btn-outline-secondary">Change Password</button>
                    </div>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Account Information</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="admin_user" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="admin@barangay.gov.ph">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Login</label>
                        <input type="text" class="form-control" value="May 16, 2023 09:45 AM" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5>Personal Information</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="profileFirstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="profileFirstName" value="Admin">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="profileLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="profileLastName" value="User">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="profileBirthDate" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="profileBirthDate" value="1985-01-15">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="profileGender" class="form-label">Gender</label>
                                <select class="form-select" id="profileGender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="profileAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="profileAddress" rows="2">123 Barangay Hall, Main Street</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="profileContact" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="profileContact" value="09123456789">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="profileEmergencyContact" class="form-label">Emergency Contact</label>
                                <input type="tel" class="form-control" id="profileEmergencyContact" value="09187654321">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update Information</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Activity Log</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-indicator bg-primary"></div>
                            </div>
                            <div class="timeline-item-content">
                                <p class="mb-0">Logged in to the system</p>
                                <small class="text-muted">May 16, 2023 09:45 AM</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-indicator bg-success"></div>
                            </div>
                            <div class="timeline-item-content">
                                <p class="mb-0">Approved document request #BRG-2023-005</p>
                                <small class="text-muted">May 15, 2023 03:22 PM</small>
                            </div>
                        </div>
                        <!-- More timeline items would be added here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Change Photo Modal -->
    <div class="modal fade" id="changePhotoModal" tabindex="-1" aria-labelledby="changePhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePhotoModalLabel">Change Profile Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img src="assets/img/admin-avatar.jpg" class="rounded-circle mb-3" width="200" height="200" alt="Current Profile">
                    </div>
                    <div class="mb-3">
                        <label for="newPhoto" class="form-label">Upload New Photo</label>
                        <input class="form-control" type="file" id="newPhoto">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="removePhoto">
                        <label class="form-check-label" for="removePhoto">Remove current photo</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>