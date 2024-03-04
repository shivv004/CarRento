<?php
  session_start();
  if ($_SESSION["isAgency"] == 0) {
    header("location: index.php");
    }
  $id = $_SESSION['id'];

  require "components/database_connect.php";

  $sql = "SELECT * FROM cars where user_id=$id;";
  $result = mysqli_query($conn, $sql);
  $numCars = mysqli_num_rows($result);
  $carIds = array();
  while ($row = mysqli_fetch_assoc($result)) {
    $carIds[] = $row['id'];
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include "components/head_tags.php";
        ?>
        <title>View booked cars | CarRento</title>
        <link rel="stylesheet" href="css/booking-page.css">
    </head>
    <body>
        <?php
            include "components/navbar.php";
        ?>
        <div class="booked-car-page">
            <div class="booking-page-title">
                <span>Booked cars by users</span>
            </div>
            <div class="booking-card-group">
            <?php
            foreach ($carIds as $carId) {
                if($carIds == 0){
                ?>
                <span style="color:#afafaf; text-align:end; margin-right:-21vw !important;">No cars booked by anyone!</span>
                <?php
                break;
                }
                $sql2 = "SELECT * FROM booked_cars WHERE car_id=$carId;";
                $result2 = mysqli_query($conn, $sql2);
            
                while ($booked_cars = mysqli_fetch_assoc($result2)) {
                    $carDetailsSql = "SELECT * FROM cars WHERE id={$booked_cars['car_id']}";
                    $carDetailsResult = mysqli_query($conn, $carDetailsSql);
                    $carDetails = mysqli_fetch_assoc($carDetailsResult);
                    $userDetailsSql = "SELECT * FROM users WHERE id={$booked_cars['user_id']}";
                    $userDetailsResult = mysqli_query($conn, $userDetailsSql);
                    $userDetails = mysqli_fetch_assoc($userDetailsResult);
                    ?>
                    <div class="booking-card">
                        <div class="booking-card-row-1">
                            <img src="assets/car.svg" alt="car-logo">
                        </div>
                        <div class="booking-card-row-2">
                            <span>Vehicle model: <?= $carDetails['vehicle_model'] ?></span>
                            <span>Vehicle number: <?= $carDetails['vehicle_number'] ?></span>
                            <span>Booked by: <?= $userDetails['name'] ?></span>
                            <span>Number of days: <?= $booked_cars['num_of_days'] ?></span>
                            <span>Start Date: <?= $booked_cars['start_date'] ?></span>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        </div>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>