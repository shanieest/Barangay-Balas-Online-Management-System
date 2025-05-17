<?php
$pageTitle = "Residents Management";
?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/residents_modal.php'; ?>

<html>
    <body>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        </head>

        <main class="main-content">
            <div class="page-header">
                <h2>Residents Management</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Residents</li>
                    </ol>
                </nav>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Residents List</h3>
                    <div>
                        <button class="btn btn-primary btn-sm" 
                                data-bs-toggle="modal" 
                                data-bs-target="#addResidentModal">
                            <i class="fas fa-plus me-1"></i> Add Resident
                        </button>

                        <button class="btn btn-outline-primary btn-sm ms-2">
                            <i class="fas fa-download me-1"></i> Export
                        </button>
                    </div>
                </div>
                <?php
                    require 'includes/db.php';

                    $query = "SELECT * FROM residents WHERE status = 'Active' ORDER BY residents_id DESC";
                    $query_run = mysqli_query($conn, $query);
                ?>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="residentTable" class="table table-hover table-bordered">
                            <thead>
                                <tr class="border-bottom">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Complete Address</th>
                                    <th>Contact</th>
                                    <th>Birth Date</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Civil Status</th>
                                    <th>Blood Type</th>
                                    <th>Voter Status</th>
                                    <th>Resident Status</th>
                                    <th>Religion</th>
                                    <th>Educational Attainment</th>
                                    <th>Indigent</th>
                                    <th>4Ps Beneficiary</th>
                                    <th>Medical History</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(mysqli_num_rows($query_run) > 0): ?>
                                    <?php while($resident = mysqli_fetch_assoc($query_run)): ?>
                                        <tr>
                                            <td><?= $resident['residents_id']; ?></td>
                                            <td><?= htmlspecialchars($resident['first_name'] . ' ' . $resident['middle_name'] . ' ' . $resident['last_name']); ?></td>
                                            <td><?= htmlspecialchars( 'Purok ' .$resident['purok'] . '  ' .$resident['address']); ?></td>
                                            <td><?= htmlspecialchars($resident['contact']); ?></td>
                                            <td><?= htmlspecialchars($resident['dob']); ?></td>
                                            <td><?= htmlspecialchars(calculateAge($resident['dob'])); ?></td>
                                            <td><?= htmlspecialchars($resident['sex']); ?></td>
                                            <td><?= htmlspecialchars($resident['civil_status']); ?></td>
                                            <td><?= htmlspecialchars($resident['blood_type']); ?></td>
                                            <td><?= htmlspecialchars($resident['voter_status']); ?></td>
                                            <?php
                                                $status = $resident['resident_status'];
                                                $badgeClass = '';

                                                switch ($status) {
                                                    case 'Active':
                                                        $badgeClass = 'bg-success'; // green
                                                        break;
                                                    case 'Inactive':
                                                        $badgeClass = 'bg-danger'; // red
                                                        break;
                                                    case 'Deceased':
                                                        $badgeClass = 'bg-dark'; // black
                                                        break;
                                                    case 'Moved Out':
                                                        $badgeClass = 'bg-warning text-dark'; // yellow with readable text
                                                        break;
                                                    default:
                                                        $badgeClass = 'bg-secondary'; // default gray
                                                }
                                            ?>

                                            <td>
                                                <span class="badge <?= $badgeClass ?>">
                                                    <?= htmlspecialchars($status); ?>
                                                </span>
                                            </td>
                                            <td><?= htmlspecialchars($resident['religion']); ?></td>
                                            <td><?= htmlspecialchars($resident['education']); ?></td>
                                            <td><?= htmlspecialchars($resident['indigent']); ?></td>
                                            <td><?= htmlspecialchars($resident['four_ps']); ?></td>
                                            <td><?= htmlspecialchars($resident['medical_history']); ?></td>
                                            <td>

                                            
                                            <button class="btn btn-info btn-sm editResidentForm"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#editResidentModal" 
                                                data-id="<?= $resident['residents_id']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                                <button class="btn btn-danger btn-sm" 
                                                        data-id="<?= $resident['residents_id']; ?>" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteResidentModal<?= $resident['residents_id']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <button class="btn btn-secondary btn-sm" 
                                                        data-id="<?= $resident['residents_id']; ?>" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#viewResidentModal<?= $resident['residents_id']; ?>">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>

                                            
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="18" class="text-center">No residents found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                            <?php
                            function calculateAge($dob) {
                                $dateofbirth = new DateTime($dob);
                                $today = new DateTime();
                                $age = $today->diff($dateofbirth)->y;
                                return $age;
                            }
                            ?>

                        </table>
                    </div>
                    <nav aria-label="Page navigation" class="mt-3">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </main>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            $(document).on('submit', '#addResidentForm', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('add_resident', true);
                $.ajax({
                    type: 'POST',
                    url: 'residents_backend.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var res = JSON.parse(response);
                        if (res.status == 'success') {
                            $('#addResidentModal').modal('hide');
                            $('#addResidentForm')[0].reset();
                            alert(res.message);
                            location.reload();
                        } else {
                            alert(res.message);
                        }
                        $('#residentTable').DataTable().ajax.reload();
                    }

                    
                });
            });

            $(document).on('click', '.editResidentForm', function(e) {
                e.preventDefault();
                var resident_id = $(this).data('id');
                //alert('Editing resident ID: ' + resident_id);
                
                 $.ajax({
                    type: "GET",
                    url: "residents_backend.php?resident_id=" + resident_id,
                    success: function (response){
                        var res = JSON.parse(response);
                        if (res.status == 'success') {

                             $('#editresident_id').val(res.data.id);
                             $('#editLastName').val(res.data.last_name);
                             $('#editFirstName').val(res.data.first_name);
                             $('#editMiddleName').val(res.data.middle_name);
                             $('#editBirthDate').val(res.data.dob);
                             $('#editSex').val(res.data.sex);
                             $('#editCivilStatus').val(res.data.civil_status);
                             $('#editBloodType').val(res.data.blood_type);
                             $('#editContactNumber').val(res.data.contact);
                             $('#editAddress').val(res.data.address);
                             $('#editPurok').val(res.data.purok);
                             $('#editVoterStatus').val(res.data.voter_status);
                             $('#editResidentStatus').val(res.data.resident_status);
                             $('#editReligion').val(res.data.religion);
                             $('#editEducation').val(res.data.education);
                             $('#editIndigent').val(res.data.id);
                             $('#edit4Ps').val(res.data.four_ps);
                             $('#editMedicalHistory').val(res.data.medical_history);
                             $('#editResidentModal').modal('show');
                             $('#addResidentForm')[0].reset();


                            alert(res.message);
                            location.reload();
                        } else {
                            alert(res.message);
                        }
                        $('#residentTable').DataTable().ajax.reload();
                    }

                 }
            
            );
            });



            
        </script>
    </body>
</html>
<?php include 'includes/footer.php'; ?>


