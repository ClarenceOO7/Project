<?php
session_start();
$conn = new mysqli("localhost", "root", "", "barangay_reports");

$email = $_POST['email'];
$password = md5($_POST['password']); // use md5 for simplicity (bcrypt is safer in real apps)

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['name'] = $user['name'];

    if ($user['role'] === 'admin') {
        header("Location: admin_dashboard.php");
    } else {
        header("Location: user_dashboard.php");
    }
} else {
    echo "Invalid credentials.";
}
?>