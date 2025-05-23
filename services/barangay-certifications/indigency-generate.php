<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../../includes/db.php';

$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$purok = $_POST['purok'];
$age = $_POST['age'];
$civil_status = $_POST['civil_status'];
$purpose = $_POST['purpose'];
$sex = $_POST['sex'] ?? 'N/A';
$email = $_POST['email'];
$shipping_method = $_POST['shipping_method'];
$requested_at = date('Y-m-d H:i:s');

// 1. Find resident ID securely
$stmt = $conn->prepare("SELECT * FROM residents WHERE first_name=? AND middle_name=? AND last_name=? AND purok=? AND address=?");
$stmt->bind_param("sssss", $first_name, $middle_name, $last_name, $purok, $address);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    exit("Resident not found. Please make sure the resident exists in the database.");
}
$resident = $result->fetch_assoc();
$residents_id = $resident['residents_id'];

// 2. Insert into document_requests securely
$document_id = 1; // Assuming 1 corresponds to Indigency Certificate

$insertStmt = $conn->prepare("INSERT INTO document_requests (residents_id, document_id, purpose, status, requested_at) VALUES (?, ?, ?, 'Pending', ?)");
$insertStmt->bind_param("iiss", $residents_id, $document_id, $purpose, $requested_at);
$insertStmt->execute();

// 3. Instead of generating document now, just confirm request
echo "Document request successfully submitted. It will be processed by the admin.";
exit;
