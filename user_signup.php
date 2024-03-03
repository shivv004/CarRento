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
        <title>Signup | CarRento</title>
    </head>
    <body class="cred-body">
        <?php
            include "components/navbar.php";
        ?>
        <div class="cred-container">
        <form data-bs-theme="dark" method="post" action="api/user_signup_controller.php">
            <span>Signup for Customer</span>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
            <div id="emailHelp" class="form-text">want to signup as Agency? <a href="agency_signup.php">Click Here!</a></div>
            <button type="submit" class="btn btn-primary mt-3">Signup</button>
            </form>
        </div>
    </body>
</html>
<?php
} else {
    header("location: ../CarRento/dashboard.php");
}
?>