<?php
  session_start();
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
                <span>All Booked Cars</span>
            </div>
        </div>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>