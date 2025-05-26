<?php
$pageTitle = "News & Events";
include_once 'includes/db.php';

// Fetch announcements
$result = $conn->query("SELECT * FROM announcements ORDER BY date_posted DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Barangay Balas - News & Events</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    .hero-section {
      background: linear-gradient(to right, #0033cc 0%, #990000 97%);
      color: white;
      padding: 100px 20px;
      text-align: center;
    }
    .card-img-top {
      max-height: 250px;
      object-fit: cover;
    }
    .form-section {
      padding: 40px 20px;
      background-color: #f8f9fa;
    }
    .service-box:hover {
      background-color:  #f8f9fa;
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<div class="hero-section">
  <h2 class="fw-bold">BRGY. BALAS</h2>
  <h1 class="display-5 fw-bold text-warning">News and Events</h1>
</div>

<!-- Announcements Section -->
<div class="container py-5">
  <?php if ($result && $result->num_rows > 0): ?>
    <div class="row g-4">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
            <?php
              $imagePath = htmlspecialchars($row['image_path']);
              if (!empty($imagePath) && file_exists($imagePath)):
            ?>
              <img src="<?= $imagePath ?>" class="card-img-top" alt="Announcement Image">
            <?php else: ?>
              <img src="assets/no-image.png" class="card-img-top" alt="No Image Available">
            <?php endif; ?>
            <div class="card-body text-center p-4">
              <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
              <p class="card-text"><?= nl2br(htmlspecialchars($row['content'])) ?></p>
            </div>
            <div class="card-footer text-muted small text-center">
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
 <?php include 'includes/foot.php'; ?>

</body>
</html>
