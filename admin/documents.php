<?php
$pageTitle = "Requested Documents";
?>
<?php
include 'includes/header.php'; 
?>



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
                <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab">Pending</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Completed</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#rejected" type="button" role="tab">Rejected</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">All Requests</button>
            </li>
        </ul>
        <div class="tab-content" id="documentsTabContent">
            <?php
            require_once 'includes/db.php';

            function renderRows($conn, $statusFilter = null, $limit = 5) {
                // Base SQL query
                $sql = "SELECT dr.docrequests_id, dr.residents_id, dr.document_id, dr.request_date, dr.status, dr.queue_number,
                         CONCAT(r.first_name, ' ', r.last_name) AS resident_name, d.name AS document_type
                        FROM document_requests dr
                        JOIN residents r ON dr.residents_id = r.residents_id
                        JOIN document_types d ON dr.document_id = d.document_id";

                if ($statusFilter !== null) {
                    $sql .= " WHERE dr.status = ?";
                }

                $sql .= " ORDER BY dr.request_date DESC LIMIT ?";

                // Prepare and execute statement to prevent SQL injection
                $stmt = $conn->prepare($sql);
                if ($statusFilter !== null) {
                    $stmt->bind_param("si", $statusFilter, $limit);
                } else {
                    $stmt->bind_param("i", $limit);
                }

                $stmt->execute();
                $result = $stmt->get_result();

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $status = strtolower($row['status']);
                        $badgeClass = 'bg-secondary';
                        switch ($status) {
                            case 'completed': $badgeClass = 'bg-success'; break;
                            case 'pending': $badgeClass = 'bg-warning'; break;
                            case 'rejected': $badgeClass = 'bg-danger'; break;
                        }

                        $dateRequested = date('F j, Y', strtotime($row['request_date']));

                        echo '<tr data-request-id="' . htmlspecialchars($row['docrequests_id']) . '">';
                        echo '<td>#' . htmlspecialchars($row['queue_number']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['resident_name']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['document_type']) . '</td>';
                        echo '<td>' . $dateRequested . '</td>';
                        echo '<td><span class="badge ' . $badgeClass . '">' . ucfirst($status) . '</span></td>';
                        echo '<td>';
                        if ($status === 'pending') {
                            echo '<button class="btn btn-sm btn-outline-primary me-1 btn-process">Process</button>';
                            echo '<button class="btn btn-sm btn-outline-danger">Reject</button>';
                        } else {
                            echo '<button class="btn btn-sm btn-outline-primary me-1 btn-process">Process</button>';
                            echo '<a href="generate_document.php?id=' . htmlspecialchars($row['docrequests_id']) . '">Download</a>';
                        }
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-center">No document requests found.</td></tr>';
                }

                $stmt->close();
            }
            ?>

            <!-- Pending Tab -->
            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Resident</th>
                                <th>Document Type</th>
                                <th>Date Requested</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php renderRows($conn, 'pending', 5); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Completed Tab -->
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Resident</th>
                                <th>Document Type</th>
                                <th>Date Requested</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php renderRows($conn, 'completed', 5); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Rejected Tab -->
            <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Resident</th>
                                <th>Document Type</th>
                                <th>Date Requested</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php renderRows($conn, 'rejected', 5); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- All Requests Tab -->
            <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Resident</th>
                                <th>Document Type</th>
                                <th>Date Requested</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php renderRows($conn, null, 10); ?>
                        </tbody>
                    </table>
                </div>
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
            <p><strong>Request ID:</strong> <span id="modalRequestId">#</span></p>
            <p><strong>Date Requested:</strong> <span id="modalDateRequested"></span></p>
            <p><strong>Document Type:</strong> <span id="modalDocumentType"></span></p>
            <p><strong>Purpose:</strong> <span id="modalPurpose"></span></p>
          </div>
          <div class="col-md-6">
            <h6>Resident Information</h6>
            <p><strong>Name:</strong> <span id="modalName"></span></p>
            <p><strong>Address:</strong> <span id="modalAddress"></span></p>
            <p><strong>Contact:</strong> <span id="modalContact"></span></p>
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
        <button type="button" class="btn btn-primary" id="saveDocumentChangesBtn">Save</button>
      </div>
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).on('click', '.btn-process', function() {
  const requestId = $(this).closest('tr').data('request-id'); // now using docrequests_id

  $.ajax({
    url: 'documents_backend.php',
    type: 'POST',
    data: {
      action: 'fetch',
      request_id: requestId
    },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        const data = response.data;
          $('#modalRequestId').text(data.queue_number);
        $('#modalDateRequested').text(data.request_date);
        $('#modalDocumentType').text(data.document_type);
        $('#modalPurpose').text(data.purpose);
        $('#modalName').text(data.name);
        $('#modalAddress').text(data.address);
        $('#modalContact').text(data.contact);
        $('#documentStatus').val(data.status);
        $('#documentNotes').val(data.admin_notes);
        $('#documentDetailsModal').data('request-id', requestId).modal('show');

      } else {
        alert('Failed to fetch request details.');
      }
    },
    error: function() {
      alert('An error occurred while fetching the document details.');
    }
  });
});

$('#saveDocumentChangesBtn').on('click', function() {
  const requestId = $('#documentDetailsModal').data('request-id');
  const status = $('#documentStatus').val();
  const adminNotes = $('#documentNotes').val();

  $.ajax({
    url: 'documents_backend.php',
    type: 'POST',
    data: {
      action: 'update',
      request_id: requestId,
      status: status,
      admin_notes: adminNotes
    },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        $('#processModal').modal('hide');
        location.reload(); // Refresh table
      } else {
        alert('Failed to update request.');
      }
    },
    error: function() {
      alert('An error occurred while updating the document request.');
    }
  });
});

</script>

</main>