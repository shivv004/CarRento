<?php
session_start();

require "components/database_connect.php";

if (!isset($_SESSION["id"])) {
    header("location: index.php");
    die();
}
$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Something went wrong!";
    return;
}
$user = mysqli_fetch_assoc($result);
if (!$user) {
    echo "Something went wrong!";
    return;
}

$sql2 = "SELECT * FROM cars where user_id=$id ORDER BY id DESC";
$result2 = mysqli_query($conn, $sql2);
if (!$result2) {
    echo "Something went wrong!";
    return;
}

//-------------------------------------------------------
$select_booked_cars_sql = "SELECT * FROM booked_cars WHERE user_id = $id ORDER BY id DESC";
$select_booked_cars_result = mysqli_query($conn, $select_booked_cars_sql);
if (!$select_booked_cars_result) {
    echo "Something went wrong!";
    return;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include "components/head_tags.php";
    ?>
    <title>Dashboard | CarRento</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php
include "components/navbar.php";
?>
<div class="dashboard-body">
    <div class="dashboard-title">
        <span>Dashboard</span>
    </div>
    <div class="dashboard-details">
        <div class="dashboard-details-col1">
            <svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" fill="white" class="bi bi-person mb-1 mx-1" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
            </svg>
        </div>
        <div class="dashboard-details-col2">
            <span>Name:&nbsp;<?= $user['name'] ?></span>
            <?php
            if (isset($_SESSION["id"]) && $_SESSION["isAgency"] == 1) {
                ?>
                <span>Agency Name:&nbsp;<?= $user['agencyName'] ?></span>
                <?php
            }
            ?>
            <span>Email Address:&nbsp;<?= $user['email'] ?></span>
        </div>
        <div class="dash-logout">
            <a class="dash-logout-link" href="api/logout.php">Logout</a>
        </div>
    </div>
    <?php
    if (isset($_SESSION["id"])) {
        if ($_SESSION["isAgency"] == 1) {
    ?>
    <div class="dashboard-title">
        <span style="font-size:30px">Your Cars</span>
    </div>
    <div class="dashboard-cars">
        <div class="booking-card-group">
            <a href="new-car.php">
                <div class="booking-card" id="add-car-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </div>
            </a>
            <?php
            $cars_count = mysqli_num_rows($result2);
            if($cars_count == 0){
            ?>
            <span style="color:#afafaf; margin:auto;">No cars added yet!</span>
            <?php
            } else {
            for ($i = 0; $i < $cars_count; $i++) {
                $cars = mysqli_fetch_assoc($result2);
                if (!$cars) {
                    break;
                }
                ?>
                <div class="booking-card">
                    <div class="booking-card-row-1">
                        <img src="assets/car.svg" alt="car-logo">
                    </div>
                    <div class="booking-card-row-2">
                        <span>Vehicle Model: <?= $cars['vehicle_model'] ?></span>
                        <span>Vehicle Number: <?= $cars['vehicle_number'] ?></span>
                        <span>Seating capacity: <?= $cars['seating_capacity'] ?></span>
                        <span>Rent per day (₹): <?= $cars['rent_per_day'] ?></span>
                    </div>
                    <a id="edit-card" href='edit-car.php?car_id=<?= $cars['id'] ?>'>Edit</a>
                </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <?php
        } else{
    ?>
        <div class="dashboard-title">
            <span style="font-size:30px">Booked Cars</span>
        </div>
        <div class="dashboard-cars">
            <div class="booking-card-group">
                <?php
                $booked_cars_count = mysqli_num_rows($select_booked_cars_result);
                if($booked_cars_count == 0){
                ?>
                <span style="color:#afafaf;">No cars booked yet!</span>
                <?php
                } else {
                    for ($i = 0; $i < $booked_cars_count; $i++) {
                    $booked_cars = mysqli_fetch_assoc($select_booked_cars_result);

                    if (!$booked_cars) {
                        break;
                    }

                    $booked_car_id = $booked_cars['car_id'];
                    $booked_car_details_sql = "SELECT * FROM cars WHERE id = $booked_car_id";
                    $booked_car_details_result = mysqli_query($conn, $booked_car_details_sql);
                    if (!$booked_car_details_result) {
                        echo "Something went wrong!";
                        return;
                    }
                    $booked_car_details = mysqli_fetch_assoc($booked_car_details_result);
                ?>
                    <div class="booking-card">
                        <div class="booking-card-row-1">
                            <img src="assets/car.svg" alt="car-logo">
                        </div>
                        <div class="booking-card-row-2">
                            <span>Vehicle Model: <?= $booked_car_details['vehicle_model'] ?></span>
                            <span>Vehicle Number: <?= $booked_car_details['vehicle_number'] ?></span>
                            <span>Seating capacity: <?= $booked_car_details['seating_capacity'] ?></span>
                            <span>Rent per day (₹): <?= $booked_car_details['rent_per_day'] ?></span>
                            <span>Number of days: <?= $booked_cars['num_of_days'] ?></span>
                            <span>Start Date: <?= $booked_cars['start_date'] ?></span>
                        </div>
                    </div>
                <?php
                }
                ?>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
        }
    }
    ?>
</div>
<!-- Bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
