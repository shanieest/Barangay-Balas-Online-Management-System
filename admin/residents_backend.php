<?php
require 'includes/db.php';

// ADD RESIDENT
if (isset($_POST['add_resident'])) {
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $dateofbirth = mysqli_real_escape_string($conn, $_POST['dateofbirth']);
    $sex = mysqli_real_escape_string($conn, $_POST['sex']);
    $civilstatus = mysqli_real_escape_string($conn, $_POST['civilstatus']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $purok = mysqli_real_escape_string($conn, $_POST['purok']);
    $voterstatus = mysqli_real_escape_string($conn, $_POST['voterstatus']);
    $residentstatus = mysqli_real_escape_string($conn, $_POST['residentstatus']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $educAttain = mysqli_real_escape_string($conn, $_POST['educAttain']);
    $indigent = mysqli_real_escape_string($conn, $_POST['indigent']);
    $four_ps = mysqli_real_escape_string($conn, $_POST['four_ps']);
    $medhistory = mysqli_real_escape_string($conn, $_POST['medhistory']);

    if (empty($fullName) || empty($dateofbirth) || empty($sex) || empty($address)) {
        echo json_encode(['status' => 'error', 'message' => 'Please fill in all required fields.']);
        return;
    }

    $query = "INSERT INTO residents (
        full_name, address, contact, dob, sex, civil_status, age, purok, 
        voter_status, resident_status, religion, education, indigent, four_ps, 
        medical_history, status
    ) VALUES (
        '$fullName', '$address', '$contact', '$dateofbirth', '$sex', '$civilstatus', 
        '$age', '$purok', '$voterstatus', '$residentstatus', '$religion', 
        '$educAttain', '$indigent', '$four_ps', '$medhistory', 'Active'
    )";

    $run = mysqli_query($conn, $query);

    echo json_encode([
        'status' => $run ? 'success' : 'error',
        'message' => $run ? 'Resident added successfully.' : 'Error: ' . mysqli_error($conn)
    ]);
    return;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['resident_id'])) {
    $resident_id = intval($_GET['resident_id']);

    $stmt = $conn->prepare("SELECT * FROM residents WHERE id = ?");
    $stmt->bind_param("i", $resident_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $resident = $result->fetch_assoc();
        echo json_encode([
            'status' => 'success',
            'data' => $resident
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Resident not found.'
        ]);
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editresident_id'])) {
    $id = intval($_POST['editresident_id']);
    $full_name = $_POST['editFullName'];
    $dob = $_POST['editBirthDate'];
    $sex = $_POST['editSex'];
    $civil_status = $_POST['editCivilStatus'];
    $contact = $_POST['editContactNumber'];
    $address = $_POST['editAddress'];
    $purok = $_POST['editPurok'];
    $voter_status = $_POST['editVoterStatus'];
    $resident_status = $_POST['editResidentStatus'];
    $religion = $_POST['editReligion'];
    $age = $_POST['editAge'];
    $education = $_POST['editEducation'];
    $indigent = $_POST['editIndigent'];
    $four_ps = $_POST['edit4Ps'];
    $medical_history = $_POST['editMedicalHistory'];

    $stmt = $conn->prepare("UPDATE residents SET 
        full_name=?, dob=?, sex=?, civil_status=?, contact=?, address=?, purok=?, 
        voter_status=?, resident_status=?, religion=?, age=?, education=?, indigent=?, 
        four_ps=?, medical_history=? 
        WHERE id=?");

    $stmt->bind_param("ssssssssssissssi", 
        $full_name, $dob, $sex, $civil_status, $contact, $address, $purok,
        $voter_status, $resident_status, $religion, $age, $education,
        $indigent, $four_ps, $medical_history, $id
    );

    if ($stmt->execute()) {
        header("Location: residents.php?success=1");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>
