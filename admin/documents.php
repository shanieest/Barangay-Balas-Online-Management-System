<?php
$pageTitle = "Requested Documents";
include 'includes/header.php'; 
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
</head>

<main class="main-content container my-4">
    <div class="page-header mb-4">
        <h2>Requested Documents</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Documents</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Document Requests</h3>
            <div class="d-flex">
                <div class="input-group me-3" style="width: 250px;">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search requests..." />
                    <button class="btn btn-outline-secondary" type="button" id="searchBtn">
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
                <!-- Pending Tab -->
                <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Queue No.</th>
                                    <th>Resident</th>
                                    <th>Document Type</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="pendingTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <!-- Completed Tab -->
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Queue No.</th>
                                    <th>Resident</th>
                                    <th>Document Type</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="completedTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <!-- Rejected Tab -->
                <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Queue No.</th>
                                    <th>Resident</th>
                                    <th>Document Type</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="rejectedTableBody"></tbody>
                        </table>
                    </div>
                </div>

                <!-- All Requests Tab -->
                <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Queue No.</th>
                                    <th>Resident</th>
                                    <th>Document Type</th>
                                    <th>Date Requested</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="allTableBody"></tbody>
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
                            <p><strong>Queue No.:</strong> <span id="modalQueueNumber">#</span></p>
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

</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function getStatusColor(status) {
    switch (status) {
        case 'Pending': return 'warning';
        case 'Completed': return 'success';
        case 'Rejected': return 'danger';
        default: return 'secondary';
    }
}

function fetchRequestsByStatus(status, search = '') {
    const tbodyMap = {
        'Pending': '#pendingTableBody',
        'Completed': '#completedTableBody',
        'Rejected': '#rejectedTableBody',
        'All': '#allTableBody'
    };
    $.ajax({
        url: 'documents_backend.php',
        type: 'POST',
        data: { action: 'list', status: status, search: search },
        dataType: 'json',
        success: function(response) {
            const tbodyId = tbodyMap[status];
            if (response.success) {
                const rows = response.data.map(row => `
                    <tr data-request-id="${row.request_id}">
                        <td>${row.queue_number}</td>
                        <td>${row.name}</td>
                        <td>${row.document_type}</td>
                        <td>${row.request_date}</td>
                        <td><span class="badge bg-${getStatusColor(row.status)}">${row.status}</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary btn-process">
                                <i class="fas fa-eye"></i> Process
                            </button>
                        </td>
                    </tr>
                `).join('');
                $(tbodyId).html(rows);
            } else {
                $(tbodyMap[status]).html('<tr><td colspan="6" class="text-center">No records found.</td></tr>');
            }
        },
        error: function() {
            const tbodyId = tbodyMap[status];
            $(tbodyId).html('<tr><td colspan="6" class="text-center text-danger">Error loading data.</td></tr>');
        }
    });
}

$(document).ready(function() {
    // Initial load for Pending tab
    fetchRequestsByStatus('Pending');

    // Tab switch handler
    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
        let tabId = $(e.target).attr('id');
        let status = 'Pending';
        if (tabId === 'completed-tab') status = 'Completed';
        else if (tabId === 'rejected-tab') status = 'Rejected';
        else if (tabId === 'all-tab') status = 'All';

        fetchRequestsByStatus(status);
    });

    // Search button handler
    $('#searchBtn').click(function() {
        let searchTerm = $('#searchInput').val().trim();
        let activeTab = $('#documentsTab button.active').attr('id');
        let status = 'Pending';
        if (activeTab === 'completed-tab') status = 'Completed';
        else if (activeTab === 'rejected-tab') status = 'Rejected';
        else if (activeTab === 'all-tab') status = 'All';

        fetchRequestsByStatus(status, searchTerm);
    });

    // Enter key in search input triggers search
    $('#searchInput').on('keypress', function(e) {
        if (e.which === 13) {
            $('#searchBtn').click();
        }
    });

    // Open modal with details on clicking View button
    $(document).on('click', '.btn-process', function() {
        let requestId = $(this).closest('tr').data('request-id');

        $.ajax({
            url: 'documents_backend.php',
            type: 'POST',
            data: { action: 'details', request_id: requestId },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    const data = response.data;
                    $('#modalQueueNumber').text(data.queue_number);
                    $('#modalDateRequested').text(data.request_date);
                    $('#modalDocumentType').text(data.document_type);
                    $('#modalPurpose').text(data.purpose);
                    $('#modalName').text(data.name);
                    $('#modalAddress').text(data.address);
                    $('#modalContact').text(data.contact);
                    $('#documentNotes').val(data.admin_notes || '');
                    $('#documentStatus').val(data.status);

                    $('#saveDocumentChangesBtn').data('request-id', requestId);

                    let modal = new bootstrap.Modal(document.getElementById('documentDetailsModal'));
                    modal.show();
                } else {
                    alert('Failed to fetch details.');
                }
            },
            error: function() {
                alert('Error fetching details.');
            }
        });
    });

    // Save changes in modal
   // Save changes in modal
$('#saveDocumentChangesBtn').click(function() {
    let requestId = $(this).data('request-id');
    let notes = $('#documentNotes').val().trim();
    let status = $('#documentStatus').val();

    $.ajax({
        url: 'documents_backend.php',
        type: 'POST',
        data: {
            action: 'update',
            request_id: requestId,
            admin_notes: notes,
            status: status
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert('Request updated successfully.');

                // Hide modal
                let modalEl = document.getElementById('documentDetailsModal');
                let modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();

                // Refresh current tab
                let activeTab = $('#documentsTab button.active').attr('id');
                let statusFilter = 'Pending';
                if (activeTab === 'completed-tab') statusFilter = 'Completed';
                else if (activeTab === 'rejected-tab') statusFilter = 'Rejected';
                else if (activeTab === 'all-tab') statusFilter = 'All';
                fetchRequestsByStatus(statusFilter);

                // If status is completed, trigger print/download
                if (status === 'Completed') {
                    // Trigger print/download (open new window or iframe)
                    window.open(`/barangay-balas/services/barangay-certifications/documents_generate.php?request_id=${requestId}`, '_blank');
                }

            } else {
                alert('Failed to update request.');
            }
        },
        error: function() {
            alert('Error updating request.');
        }
    });
});

});
</script>

<?php include 'includes/footer.php'; ?>
