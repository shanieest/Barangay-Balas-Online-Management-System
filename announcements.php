<?php
$pageTitle = "News & Events";

 include 'includes/header.php';
include_once 'includes/db.php';

// Fetch announcements
$result = $conn->query("SELECT * FROM announcements ORDER BY date_posted DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Barangay News and Events</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .announcement-img {
      max-height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body class="bg-light">

<div class="container py-5">
  <h2 class="mb-4 text-center">Barangay News and Events</h2>

  <?php if ($result->num_rows > 0): ?>
    <div class="row g-4">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
            <?php if (!empty($row['image_path']) && file_exists($row['image_path'])): ?>
              <img src="<?= htmlspecialchars($row['image_path']) ?>" class="card-img-top announcement-img" alt="Announcement Image">
            <?php endif; ?>
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
              <p class="card-text"><?= nl2br(htmlspecialchars($row['content'])) ?></p>
            </div>
            <div class="card-footer text-muted small">
              Posted on <?= date("F j, Y, g:i A", strtotime($row['date_posted'])) ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-info text-center">No announcements available at the moment.</div>
  <?php endif; ?>

</div>

</body>
</html>
