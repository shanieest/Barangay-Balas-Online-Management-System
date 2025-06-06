<?php
$pageTitle = "News & Events";
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $pageTitle ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    .preview-img {
      max-height: 200px;
      object-fit: cover;
    }
  </style>
</head>
<body>
<main class="container py-5">
  <div class="page-header mb-4">
    <h2><?= $pageTitle ?></h2>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">News & Events</li>
      </ol>
    </nav>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="announcements_backend.php" method="POST" enctype="multipart/form-data" >
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea name="content" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Optional Image</label>
          <input class="form-control" type="file" name="image" id="image" accept="image/*">
        </div>

        <div class="mb-3" id="imagePreview" style="display: none;">
          <label class="form-label">Image Preview:</label>
          <img src="#" class="img-fluid rounded preview-img" alt="Preview">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Post Announcement</button>
      </form>
    </div>
  </div>
</main>

<script>
  const imageInput = document.getElementById('image');
  const imagePreview = document.getElementById('imagePreview');
  const previewImg = imagePreview.querySelector('img');

  imageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewImg.src = e.target.result;
        imagePreview.style.display = 'block';
      }
      reader.readAsDataURL(file);
    } else {
      imagePreview.style.display = 'none';
    }
  });
</script>
</body>
</html>
