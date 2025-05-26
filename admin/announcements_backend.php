<?php
include_once 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $date_posted = date("Y-m-d H:i:s");

    $imagePath = '';

    // Debug to confirm file reached
    if (!isset($_FILES['image'])) {
        echo "No file uploaded.";
        exit;
    }

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/announcements/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '', basename($_FILES['image']['name']));
        $targetPath = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $imagePath = $targetPath;
        } else {
            echo "Image upload failed.";
            exit;
        }
    }

    // Insert to DB
    $stmt = $conn->prepare("INSERT INTO announcements (title, content, image_path, date_posted) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $content, $imagePath, $date_posted);

    if ($stmt->execute()) {
        header("Location: announcements.php"); 
        exit;
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
