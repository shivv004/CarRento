<?php
session_start();
require("../components/database_connect.php");

$email = $_POST['email'];
$password = $_POST['password'];
$password = sha1($password);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Something went wrong! Login Again";
	exit;
}
$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
    echo "Invalid email or password.";
	exit;
}
$row = mysqli_fetch_assoc($result);
$_SESSION['id'] = $row['id'];
$_SESSION['name'] = $row['name'];
$_SESSION['agencyName'] = $row['agencyName'];
$_SESSION['isAgency'] = $row['isAgency'];
$_SESSION['email'] = $row['email'];

header("location: ../index.php");
mysqli_close($conn);
?>