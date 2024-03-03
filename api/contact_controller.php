<?php
require("../components/database_connect.php");

$question = $_POST['question'];
$email = $_POST['email'];

$sql = "INSERT INTO contact (email, question) VALUES ('$email', '$question')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

header("location: ../index.php");
mysqli_close($conn);
?>