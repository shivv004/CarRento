<?php
  session_start();
  if ($_SESSION["isAgency"] == 0) {
    header("location: index.php");
    }
    
  require "components/database_connect.php";

  $sql = "SELECT * FROM booked_cars ORDER BY id DESC;";
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
        <title>View booked cars | CarRento</title>
        <link rel="stylesheet" href="css/booking-page.css">
    </head>
    <body>
        <?php
            include "components/navbar.php";
        ?>
        <div class="booking-page">
            <div class="booking-page-title">
                <span>Booked cars by users</span>
            </div>
            <?php
            if($numCars == 0){
            ?>
            <p style="text-align:center; color:#afafaf;">Sorry, no car has been booked yet!</p>
            <?php
            } else {
            ?>

            <?php
            }
            ?>
        </div>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>