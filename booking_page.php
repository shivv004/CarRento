<?php
  session_start();

  require "components/database_connect.php";

  $sql = "SELECT * FROM cars ORDER BY id DESC;";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
      echo "Something went wrong!";
      return;
  }
  $numCars = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include "components/head_tags.php";
        ?>
        <title>Booking | CarRento</title>
        <link rel="stylesheet" href="css/booking-page.css">
    </head>
    <body>
        <?php
            include "components/navbar.php";
        ?>
        <div class="booking-page">
            <div class="booking-page-title">
                <span>Available cars for rent</span>
            </div>
            <?php
            if($numCars == 0){
            ?>
            <p style="text-align:center; color:#afafaf;">Sorry, no cars available to rent!</p>
            <?php
            } else{
            ?>
            <div class="booking-page-main">
                <div class="booking-card-group">
                    <?php
                    $cars_count = mysqli_num_rows($result);
                    for ($i = 0; $i < $cars_count; $i++) {
                        $cars = mysqli_fetch_assoc($result);
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
                            <?php
                                $agencyId = $cars['user_id'];
                                $sql2 = "SELECT * FROM users where id=$agencyId";
                                $result2 = mysqli_query($conn, $sql2);
                                $user = mysqli_fetch_assoc($result2);
                            ?>
                            <span>Agency: <?= $user['agencyName'] ?></span>
                        </div>
                        <div class="booking-card-row-3">
                        <form method="post" action="api/book_car_controller.php" data-bs-theme="dark">
                            <input type="hidden" name="car_id" value="<?= $cars['id'] ?>">
                            <?php
                            if (isset($_SESSION["id"])) {
                            ?>
                            <select class="form-select mb-3" name="num_of_days" aria-label="Default select example" required>
                                <option selected> Number of days</option>
                                <?php
                                for ($n = 1; $n <= 90; $n++) {
                                    ?>
                                    <option value="<?= $n ?>"><?= $n ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class="mx-2" style="color:#fff">Start Date: </span>
                            <div class="start-date">
                                <select class="form-select" name="start_day" aria-label="Default select example" required>
                                <option selected> DD</option>
                                <?php
                                for ($j = 1; $j <= 30; $j++) {
                                    ?>
                                    <option value="<?= $j ?>"><?= $j ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <span>/</span>
                                <select class="form-select" name="start_mon" aria-label="Default select example" required>
                                <option selected> MM</option>
                                <?php
                                for ($k = 1; $k <= 12; $k++) {
                                    ?>
                                    <option value="<?= $k ?>"><?= $k ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                                <span>/</span>                               
                                <select class="form-select"name="start_year" aria-label="Default select example" required>
                                <option selected> YYYY</option>
                                <?php
                                for ($l = 2024; $l <= 2030; $l++) {
                                    ?>
                                    <option value="<?= $l ?>"><?= $l ?></option>
                                    <?php
                                }
                                ?>
                                </select>
                            </div>
                            <?php
                            }
                            ?>
                            <button type="submit" class="btn btn-success w-100 mt-3"
                            <?php
                            if (isset($_SESSION["id"])) {
                                if ($_SESSION["isAgency"] == 1) {
                                ?>
                                    disabled
                                <?php
                                }
                            }
                            ?>
                            >Book Now</button>
                        </form>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>