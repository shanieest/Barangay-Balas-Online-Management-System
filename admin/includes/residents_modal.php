<!-- Add Resident Modal -->
<div class="modal fade" id="addResidentModal" tabindex="-1" aria-labelledby="addResidentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addResidentModalLabel">Add Resident</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addResidentForm" class="form-horizontal" method="POST" action="residents_backend.php">
          <div class="card">
            <div class="card-header">
              <h3>Resident Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" >
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 mb-3">
                    <label for="birthDate" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth">
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="sex" class="form-label">Sex <span class="text-danger">*</span></label>
                    <select class="form-select" id="sex" name="sex">
                      <option value="">Select Sex</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="civilStatus" class="form-label">Civil Status</label>
                    <select class="form-select" id="civilstatus" name="civilstatus">
                      <option value="">Select Status</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control" id="contact" name="contact">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label">Complete Address <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="address" name="address" rows="2"></textarea>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="purok" class="form-label">Purok</label>
                    <select class="form-select" id="purok" name="purok">
                      <option value="">Select Purok</option>
                      <option value="1">Purok 1</option>
                      <option value="2">Purok 2</option>
                      <option value="3">Purok 3</option>
                      <option value="4">Purok 4</option>
                      <option value="5">Purok 5</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="voterStatus" class="form-label">Voter Status</label>
                    <select class="form-select" id="voterstatus" name="voterstatus">
                      <option value="Yes">Registered Voter</option>
                      <option value="No">Not Registered</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="residentStatus" class="form-label">Resident Status</label>
                    <select class="form-select" id="residentstatus" name="residentstatus">
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                      <option value="Deceased">Deceased</option>
                      <option value="Moved Out">Moved Out</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="religion" class="form-label">Religion</label>
                    <input type="text" class="form-control" id="religion" name="religion">
                  </div>
                   <div class="col-md-4 mb-3">
                    <label for="age" class="form-label">Age (Years)</label>
                    <input type="number" class="form-control" id="age" name="age">
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="education" class="form-label">Educational Attainment</label>
                      <select class="form-select" id="eduAttain" name="educAttain">
                        <option value="">Select Educational Level</option>
                        <option value="High School">High School</option>
                        <option value="College">College</option>
                        <option value="Graduate">Graduate</option>
                        <option value="Postgraduate">Postgraduate</option>
                        <option value="None">None</option>
                      </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="indigent" class="form-label">Indigent</label>
                    <select class="form-select" id="indigent" name="indigent">
                      <option value="">Select Status</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="fourPs" class="form-label">4Ps Beneficiary</label>
                    <select class="form-select" id="four_ps" name="four_ps">
                      <option value="">Select</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="medicalHistory" class="form-label">Medical History</label>
                    <textarea class="form-control" id="medhistory" name="medhistory" rows="2"></textarea>
                  </div>
                </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="addResidentForm" class="btn btn-primary">Add Resident</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>


<!-- Edit Resident Modal -->
<div class="modal fade" id="editResidentModal" tabindex="-1" aria-labelledby="editResidentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editResidentModalLabel">Edit Resident</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editResidentForm" class="form-horizontal" method="POST" action="residents_backend.php">
          <input type="hidden" id="editresident_id" name="editresident_id">


          <div class="card">
            <div class="card-header">
              <h3>Resident Information</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="editFullName" class="form-label">Full Name</label>
                  <input type="text" class="form-control" id="editFullName" name="editFullName">
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 mb-3">
                  <label for="editBirthDate" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                  <input type="date" class="form-control" id="editBirthDate" name="editBirthDate">
                </div>
                <div class="col-md-3 mb-3">
                  <label for="editSex" class="form-label">Sex <span class="text-danger">*</span></label>
                  <select class="form-select" id="editSex" name="editSex">
                    <option value="">Select Sex</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="editCivilStatus" class="form-label">Civil Status</label>
                  <select class="form-select" id="editCivilStatus" name="editCivilStatus">
                    <option value="">Select Status</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Separated">Separated</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="editContactNumber" class="form-label">Contact Number</label>
                  <input type="tel" class="form-control" id="editContactNumber" name="editContactNumber">
                </div>
                
              </div>

              <div class="mb-3">
                <label for="editAddress" class="form-label">Complete Address <span class="text-danger">*</span></label>
                <textarea class="form-control" id="editAddress" name="editAddress" rows="2"></textarea>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="editPurok" class="form-label">Purok</label>
                  <select class="form-select" id="editPurok" name="editPurok">
                    <option value="">Select Purok</option>
                    <option value="1">Purok 1</option>
                    <option value="2">Purok 2</option>
                    <option value="3">Purok 3</option>
                    <option value="4">Purok 4</option>
                    <option value="5">Purok 5</option>
                  </select>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="editVoterStatus" class="form-label">Voter Status</label>
                  <select class="form-select" id="editVoterStatus" name="editVoterStatus">
                    <option value="Yes">Registered Voter</option>
                    <option value="No">Not Registered</option>
                  </select>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="editResidentStatus" class="form-label">Resident Status</label>
                  <select class="form-select" id="editResidentStatus" name="editResidentStatus">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="Deceased">Deceased</option>
                    <option value="Moved Out">Moved Out</option>
                  </select>
                </div>
              </div>

              <!-- New Fields -->
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="editReligion" class="form-label">Religion</label>
                  <input type="text" class="form-control" id="editReligion" name="editReligion">
                </div>
                <div class="col-md-4 mb-3">
                  <label for="editAge" class="form-label">Age (in Years)</label>
                  <input type="number" class="form-control" id="editAge" name="editAge">
                </div>
                <div class="col-md-4 mb-3">
                  <label for="editEducation" class="form-label">Educational Attainment</label>
                  <select class="form-select" id="editEducation" name="editEducation">
                    <option value="">Select Educational Level</option>
                    <option value="High School">High School</option>
                    <option value="College">College</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Postgraduate">Postgraduate</option>
                    <option value="None">None</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="editIndigent" class="form-label">Indigent Status</label>
                  <select class="form-select" id="editIndigent" name="editIndigent">
                    <option value="">Select Status</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="edit4Ps" class="form-label">4Ps Status</label>
                  <select class="form-select" id="edit4Ps" name="edit4Ps">
                    <option value="">Select Status</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="editMedicalHistory" class="form-label">Medical History</label>
                  <textarea class="form-control" id="editMedicalHistory" name="editMedicalHistory" rows="2"></textarea>
                </div>
              </div>

              
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" form="editResidentForm" class="btn btn-primary">Update Resident</button>
      </div>
    </div>
  </div>
</div>

<!--delete modals-->
<div class="modal fade" id="deleteResidentModal" tabindex="-1" aria-labelledby="deleteResidentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Are you sure you want to delete?</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="resident_delete.php">
                    <input type="hidden" class="user_id" name="id">
                    <div class="text-center">
                        <h2 class="del_stu bold"></h2>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
            </div>
        </div>
    </div>
</div>