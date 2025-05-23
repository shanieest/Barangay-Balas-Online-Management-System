<?php 
include 'includes/header.php'; 
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'fetch') {
        $request_id = $_POST['request_id'];

        $stmt = $conn->prepare("SELECT dr.request_code, dr.requested_at, dr.status, dr.remarks AS admin_notes, dr.purpose,
                                       CONCAT(r.first_name, ' ', r.last_name) AS name, r.address, r.contact_number AS contact,
                                       dt.name AS document_type
                                FROM document_requests dr
                                JOIN residents r ON dr.residents_id = r.residents_id
                                JOIN document_types dt ON dr.document_id = dt.document_id
                                WHERE dr.docrequests_id = ?");
        $stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        echo json_encode(['success' => (bool) $data, 'data' => $data]);

        $stmt->close();
    }

    if ($action === 'update') {
        $request_id = $_POST['request_id'];
        $status = $_POST['status'];
        $admin_notes = $_POST['admin_notes'];

        $stmt = $conn->prepare("UPDATE document_requests SET status = ?, remarks = ?, processed_at = NOW() WHERE docrequests_id = ?");
        $stmt->bind_param("ssi", $status, $admin_notes, $request_id);
        $success = $stmt->execute();

        echo json_encode(['success' => $success]);

        $stmt->close();
    }
}
?>
