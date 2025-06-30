<?php
$conn = new mysqli("localhost", "root", "", "barangay_reports");

$type = $_POST['type'];
$desc = $_POST['description'];
$location = $_POST['location'];
$user_id = $_POST['user_id'];

$sql = "INSERT INTO reports (user_id, type, description, location) 
        VALUES ('$user_id', '$type', '$desc', '$location')";

if ($conn->query($sql)) {
    echo "Report submitted successfully.";
} else {
    echo "Error: " . $conn->error;
}
?>