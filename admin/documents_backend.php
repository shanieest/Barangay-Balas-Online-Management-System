<?php
include 'includes/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'list') {
        $status = $_POST['status'] ?? 'All';

        $whereClause = '';
        if ($status !== 'All') {
            $whereClause = "WHERE dr.status = ?";
        }

        $sql = "
            SELECT 
                dr.id AS request_id,
                dr.queue_number,
                dr.document_type,
                dr.status,
                dr.request_date,
                r.full_name AS name,
                r.address,
                r.contact
            FROM 
                document_requests dr
            JOIN 
                residents r ON dr.resident_id = r.id
            $whereClause
            ORDER BY dr.request_date DESC
        ";

        $stmt = $conn->prepare($sql);

        if ($status !== 'All') {
            $stmt->bind_param("s", $status);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode(['success' => true, 'data' => $data]);
        exit;
    }

    if ($action === 'fetch' || $action === 'details') {
        $requestId = intval($_POST['request_id'] ?? 0);
        if ($requestId <= 0) {
            echo json_encode(['success' => false, 'message' => 'Invalid request ID']);
            exit;
        }

        $stmt = $conn->prepare("
            SELECT 
                dr.id AS request_id,
                dr.queue_number,
                dr.document_type,
                dr.purpose,
                dr.status,
                dr.admin_notes,
                dr.request_date,
                r.full_name AS name,
                r.address,
                r.contact
            FROM 
                document_requests dr
            JOIN 
                residents r ON dr.resident_id = r.id
            WHERE 
                dr.id = ?
        ");
        $stmt->bind_param("i", $requestId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo json_encode(['success' => true, 'data' => $row]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Request not found']);
        }
        exit;
    }

    if ($action === 'update') {
        $requestId = intval($_POST['request_id'] ?? 0);
        $status = $_POST['status'] ?? '';
        $adminNotes = $_POST['admin_notes'] ?? '';

        if ($requestId <= 0) {
            echo json_encode(['success' => false, 'message' => 'Invalid request ID']);
            exit;
        }

        $stmt = $conn->prepare("
            UPDATE document_requests
            SET status = ?, admin_notes = ?
            WHERE id = ?
        ");
        $stmt->bind_param("ssi", $status, $adminNotes, $requestId);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Update failed']);
        }
        exit;
    }

    echo json_encode(['success' => false, 'message' => 'Invalid action']);
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid request']);
exit;
?>
