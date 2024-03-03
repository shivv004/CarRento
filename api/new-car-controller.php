<?php
require("../components/database_connect.php");

session_start();
if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION["id"];
$vehicle_model = $_POST['vehicle_model'];
$vehicle_number = $_POST['vehicle_number'];
$seating_capacity = $_POST['seating_capacity'];
$rent_per_day = $_POST['rent_per_day'];

$sql = "SELECT * FROM cars WHERE vehicle_number='$vehicle_number'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

$row_count = mysqli_num_rows($result);
if ($row_count != 0) {
	echo "This car is already added!";
	exit;
}
// --------------------------------------
$sql = "INSERT INTO cars (user_id, vehicle_model, vehicle_number, seating_capacity, rent_per_day) VALUES ('$user_id','$vehicle_model', '$vehicle_number', '$seating_capacity', '$rent_per_day')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

echo "Car added successfully!";
header("location: ../booking_page.php");
mysqli_close($conn);
?>