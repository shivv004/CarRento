<?php
session_start();

require "components/database_connect.php";

if (!isset($_SESSION["id"])) {
    header("location: index.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["car_id"])) {
    $car_id = $_GET["car_id"];
    $sql = "SELECT * FROM cars WHERE id = $car_id";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Something went wrong!";
        return;
    }
    $car = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "components/head_tags.php"; ?>
    <title>Edit Car | CarRento</title>
    <link rel="stylesheet" href="css/new-car-page.css">
</head>
<body>
    <?php
    include "components/navbar.php";
    ?>
        <div class="new-car-page">
            <div class="new-car-page-title">
                <span>Edit car details</span>
            </div>
            <div class="new-car-form">
            <form data-bs-theme="dark" method="post" action="api/edit_car_controller.php">
            <input type="hidden" name="car_id" value="<?= $car['id'] ?>">
            <div class="mb-3">
                <label class="form-label">Vehicle model</label>
                <input type="text" name="vehicle_model" class="form-control" value="<?= $car['vehicle_model'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Vehicle number</label>
                <input type="text" name="vehicle_number" class="form-control" value="<?= $car['vehicle_number'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Seating capacity</label>
                <input type="text" name="seating_capacity" class="form-control" value="<?= $car['seating_capacity'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Rent per day (₹)</label>
                <input type="text" name="rent_per_day" class="form-control" value="<?= $car['rent_per_day'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Car</button>
            </form>
            </div>
        </div>
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>