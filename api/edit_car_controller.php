<?php
require("../components/database_connect.php");

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit;
}

$id = $_POST['car_id'];
$vehicle_model = $_POST['vehicle_model'];
$vehicle_number = $_POST['vehicle_number'];
$seating_capacity = $_POST['seating_capacity'];
$rent_per_day = $_POST['rent_per_day'];

$sql = "UPDATE cars SET vehicle_model = '$vehicle_model', vehicle_number = '$vehicle_number', seating_capacity = '$seating_capacity', rent_per_day = '$rent_per_day' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

echo "Car updated successfully!";
header("location: ../dashboard.php");
mysqli_close($conn);
?>