<?php
require_once __DIR__ . '../../vendor/autoload.php';
require '../includes/db.php';
use PhpOffice\PhpWord\TemplateProcessor;

// Check if docrequests_id is set in the URL
if (!isset($_GET['docrequests_id'])) {
    die("Error: Document request ID is not provided.");
}

$id = $_GET['docrequests_id'];

// Corrected SQL query
// Changed 'r.id' to 'r.docrequests_id'
// Changed 'res.docrequests_id' to 'res.residents_id' in the JOIN condition
$stmt = $conn->prepare("SELECT r.*, res.first_name, res.middle_name, res.last_name, res.address FROM document_requests r JOIN residents res ON r.residents_id = res.residents_id WHERE r.docrequests_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();

// Check if data was found
if (!$data) {
    die("Error: Document request not found.");
}

$docType = $data['document_id']; // Use 'document_id' from document_requests table
$queue = str_pad($data['queue_number'], 3, "0", STR_PAD_LEFT);
$templatePath = "templates/{$docType}.docx";

if (!file_exists($templatePath)) {
    die("Template for '$docType' not found.");
}

$templateProcessor = new TemplateProcessor($templatePath);

// Construct full name for replacement
$fullName = trim($data['first_name'] . ' ' . $data['middle_name'] . ' ' . $data['last_name']);

// Common replacements
$templateProcessor->setValue('full_name', $fullName);
$templateProcessor->setValue('address', $data['address'] ?? 'N/A');
$templateProcessor->setValue('queue_number', $queue);
$templateProcessor->setValue('date', date("F j, Y", strtotime($data['request_date'])));
$templateProcessor->setValue('year', $data['year']);

// Output the file
$filename = "{$docType}_{$queue}.docx";
$templateProcessor->saveAs($filename);
header("Content-Disposition: attachment; filename=$filename");
readfile($filename);
unlink($filename);
exit;
?>