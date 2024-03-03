<?php
  session_start();
    if ($_SESSION["isAgency"] == 0) {
    header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include "components/head_tags.php";
        ?>
        <title>Add new car | CarRento</title>
        <link rel="stylesheet" href="css/new-car-page.css">
    </head>
    <body>
        <?php
            include "components/navbar.php";
        ?>
        <div class="new-car-page">
            <div class="new-car-page-title">
                <span>Add a New Car to Rent</span>
            </div>
            <div class="new-car-form">
            <form data-bs-theme="dark" method="post" action="api/new-car-controller.php">
            <div class="mb-3">
                <label class="form-label">Vehicle model</label>
                <input type="text" name="vehicle_model" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Vehicle number</label>
                <input type="text" name="vehicle_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Seating capacity</label>
                <input type="text" name="seating_capacity" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Rent per day (₹)</label>
                <input type="text" name="rent_per_day" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>