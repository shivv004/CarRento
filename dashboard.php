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
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["isAgency"] == 1) {
                    ?>
                        <span>Agency Name:&nbsp;<?= $user['agencyName'] ?></span>
                    <?php
                        }
                    }
                    ?>
                    <span>Email Address:&nbsp;<?= $user['email'] ?></span>
                </div>
                <div class="dash-logout">
                <a class="dash-logout-link" href="api/logout.php">Logout</a>
                </div>
            </div>
        </div>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>