<?php
require("../components/database_connect.php");

session_start();
if (!isset($_SESSION["id"])) {
    header("location: ../signin.php");
    exit;
}

if ($_SESSION["isAgency"] == 1) {
    echo "Not allowed for agencies!";
    exit;
}

$user_id = $_SESSION["id"];
$car_id = $_POST['car_id'];
$num_of_days = $_POST['num_of_days'];

$start_day = $_POST['start_day'];
$start_month = $_POST['start_mon'];
$start_year = $_POST['start_year'];

$start_date = $start_year . '-' . $start_month . '-' . $start_day;

if($num_of_days === 'Number of days' || $start_day === 'DD' || $start_month === 'MM' || $start_year === 'YYYY') {
    echo "Please fill all details";
    exit;
}

$sql = "SELECT * FROM booked_cars WHERE user_id='$user_id' and car_id='$car_id'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}
$row_count = mysqli_num_rows($result);
if ($row_count != 0) {
	echo "You have already booked this car!";
	exit;
}
// --------------------------------------
$sql = "INSERT INTO booked_cars (user_id, car_id, num_of_days, start_date) VALUES ('$user_id', '$car_id', '$num_of_days', '$start_date')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

echo "Car booked successfully!";
header("location: ../dashboard.php");
mysqli_close($conn);
?>