<?php
$conn = new mysqli("localhost", "root", "", "barangay_reports");

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE reports SET status='$status' WHERE id='$id'";
$conn->query($sql);

header("Location: admin_dashboard.php");
?>