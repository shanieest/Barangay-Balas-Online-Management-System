<?php
include_once 'includes/db.php';


// Example values, replace with actual data from your form or variables
$id = '[id]';
$title = '[title]';
$content = '[content]';
$date_posted = '[date_posted]';

$sql = "INSERT INTO `announcements`(`id`, `title`, `content`, `date_posted`) VALUES ('$id','$title','$content','$date_posted')";
if (mysqli_query($conn, $sql)) {
	echo "Announcement added successfully.";
} else {
	echo "Error: " . mysqli_error($conn);
}
?>