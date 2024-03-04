<?php
  session_start();
  if (!isset($_SESSION["id"])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include "components/head_tags.php";
        ?>
        <title>Signin | CarRento</title>
    </head>
    <body class="cred-body">
        <?php
            include "components/navbar.php";
        ?>
        <div class="cred-container">
        <form data-bs-theme="dark" method="post" action="api/login_controller.php">
            <span>Signin to your account</span>
            <div id="cred-mail" class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
            </form>
        </div>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
} else {
    header("location: ../CarRento/dashboard.php");
}
?>

