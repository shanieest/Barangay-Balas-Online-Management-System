<?php
// ✅ Turn on error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'fetch') {
        $request_id = intval($_POST['request_id']);

        $stmt = $conn->prepare("SELECT dr.queue_number, dr.request_date, dr.status, dr.purpose,
                                       CONCAT(r.first_name, ' ', r.last_name) AS name, r.address, r.contact AS contact,
                                       dt.name AS document_type
                                FROM document_requests dr
                                JOIN residents r ON dr.residents_id = r.residents_id
                                JOIN document_types dt ON dr.document_id = dt.document_id
                                WHERE dr.docrequests_id = ?");
        $stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        echo json_encode(['success' => !!$data, 'data' => $data]);
        $stmt->close();
    }

    if ($action === 'update') {
        $request_id = intval($_POST['request_id']);
        $status = $_POST['status'];
        $admin_notes = $_POST['admin_notes'];

        $stmt = $conn->prepare("UPDATE document_requests SET status = ?, purpose = ? WHERE docrequests_id = ?");
        $stmt->bind_param("ssi", $status, $admin_notes, $request_id);
        $success = $stmt->execute();

        echo json_encode(['success' => $success]);
        $stmt->close();
    }
}
