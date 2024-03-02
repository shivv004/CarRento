<?php
require("../components/database_connect.php");

$name = $_POST['name'];
$isAgency = "0";
$email = $_POST['email'];
$password = $_POST['password'];
$password = sha1($password);

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

$row_count = mysqli_num_rows($result);
if ($row_count != 0) {
	echo "Email already exists!";
	exit;
}
// --------------------------------------
$sql = "INSERT INTO users (name, isAgency, email, password) VALUES ('$name', '$isAgency', '$email', '$password')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

echo "Account created successfully!";
header("location: ../signin.php");
mysqli_close($conn);
?>