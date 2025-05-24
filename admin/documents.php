<?php
$pageTitle = "Requested Documents";
?>
<?php
include 'includes/header.php'; ?>



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
                        </tbody>
                    </table>
                </div>
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
    url: 'document_backend.php',
    type: 'POST',
    data: {
      action: 'fetch',
      request_id: requestId
    },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        const data = response.data;
          $('#modalRequestId').text(data.request_code);
        $('#modalDateRequested').text(data.requested_at);
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
    url: 'document_backend.php',
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