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
        <button type="button" class="btn btn-primary" id="saveDocumentChangesBtn">Save Changes</button>
      </div>
    </div>
  </div>
</div>
