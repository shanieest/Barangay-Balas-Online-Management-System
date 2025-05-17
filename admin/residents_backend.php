<?php

require 'includes/db.php';

if (isset($_POST['add_resident'])) {

    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $dateofbirth = mysqli_real_escape_string($conn, $_POST['dateofbirth']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $bloodtype = mysqli_real_escape_string($conn, $_POST['bloodtype']);
    $purok = mysqli_real_escape_string($conn, $_POST['purok']);
    $voterstatus = mysqli_real_escape_string($conn, $_POST['voterstatus']);
    $residentstatus = mysqli_real_escape_string($conn, $_POST['residentstatus']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $educAttain = mysqli_real_escape_string($conn, $_POST['educAttain']);
    $indigent = mysqli_real_escape_string($conn, $_POST['indigent']);
    $four_ps = mysqli_real_escape_string($conn, $_POST['four_ps']);
    $medhistory = mysqli_real_escape_string($conn, $_POST['medhistory']);

    if (
        empty($lastname) ||
        empty($firstname) ||
        empty($dateofbirth) ||
        empty($sex) ||
        empty($address)
    ) {
        $res = [
            'status' => 'error',
            'message' => 'Please fill in all required fields.'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO `residents`(
        `residents_id`, `first_name`, `middle_name`, `last_name`, `address`, `contact`, `dob`, 
        `sex`, `civil_status`, `blood_type`, `purok`, `voter_status`, `resident_status`, 
        `religion`, `education`, `indigent`, `four_ps`, `medical_history`, `status`
    ) VALUES (
        NULL, '$firstname', '$middlename', '$lastname', '$address', '$contact', '$dateofbirth',
        '$sex', '$civilstatus', '$bloodtype', '$purok', '$voterstatus', '$residentstatus',
        '$religion', '$educAttain', '$indigent', '$four_ps', '$medhistory', 'Active'
    )";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $res = [
            'status' => 'success',
            'message' => 'Resident added successfully.'
        ];
    } else {
        $res = [
            'status' => 'error',
            'message' => 'Error adding resident: ' . mysqli_error($conn)
        ];
    }

    echo json_encode($res);
}

if(isset($_GET['resident_id']))
{
    $resident_id - mysqli_real_escape_string($conn, $_GET['resident_id']);

    $query = "SELECT * FROM residents WHERE residents_id='$resident_id'";

    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $resident = mysqli_fetch_array($query_run);
        $res = [
            'status' => 'success',
            'message' => 'Resident found.',
            'data' => $resident
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 'error',
            'message' => 'No resident found.'
        ];
        echo json_encode(['status' => 'error', 'message' => 'No resident found.']);
    }
}

if (isset($_GET['editFirstName'])) {
    $id = $_GET['editresident_id'] ?? null;

    $first_name = $_GET['editFirstName'];
    $middle_name = $_GET['editMiddleName'];
    $last_name = $_GET['editLastName'];
    $dob = $_GET['editBirthDate'];
    $sex = $_GET['editSex'];
    $civil_status = $_GET['editCivilStatus'];
    $blood_type = $_GET['editBloodType'];
    $contact = $_GET['editContactNumber'];
    $address = $_GET['editAddress'];
    $purok = $_GET['editPurok'];
    $voter_status = $_GET['editVoterStatus'];
    $resident_status = $_GET['editResidentStatus'];
    $religion = $_GET['editReligion'];
    $education = $_GET['editEducation'];
    $indigent = $_GET['editIndigent'];
    $four_ps = $_GET['edit4Ps'];
    $medical_history = $_GET['editMedicalHistory'];

    $sql = "UPDATE residents SET 
        first_name = ?, middle_name = ?, last_name = ?, dob = ?, sex = ?, civil_status = ?, blood_type = ?, 
        contact = ?, address = ?, purok = ?, voter_status = ?, resident_status = ?, religion = ?, education = ?, 
        indigent = ?, four_ps = ?, medical_history = ?
        WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssi",
        $first_name, $middle_name, $last_name, $dob, $sex, $civil_status, $blood_type,
        $contact, $address, $purok, $voter_status, $resident_status, $religion, $education,
        $indigent, $four_ps, $medical_history, $id
    );

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Resident updated successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Update failed."]);
    }

    $stmt->close();
}

// Fetch data for edit modal (AJAX)
if (isset($_GET['resident_id'])) {
    $resident_id = $_GET['resident_id'];
    $sql = "SELECT * FROM residents WHERE residents_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $resident_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $resident = $result->fetch_assoc();

    if ($resident) {
        echo json_encode(["status" => "success", "data" => $resident]);
    } else {
        echo json_encode(["status" => "error", "message" => "Resident not found."]);
    }

    $stmt->close();
}

$conn->close();

?>
