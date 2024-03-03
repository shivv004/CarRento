<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
      include "components/head_tags.php";
    ?>
    <title>CarRento - Get Rental Car in Seconds</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php
      include "components/navbar.php";
    ?>
    <div class="main">
        <div class="main-sec-1">
          <img src="assets/main.jpg" alt="index-cover-image">
          <div class="main-sec-1-container">
            <span>Get Your Rental Car Today!</span>
            <a style="width:fit-content;align-self: center;" href="booking_page.php"><button type="button" class="btn btn-primary">Book Now</button></a>
          </div>
        </div>
        <div class="main-sec-2">
          <div class="main-sec-2-contact-text">
            <span class="contact-text-1">Contact us</span>
            <span class="contact-text-2">Below is a simple contact form designed for the home page of CarRento. Feel free to reach out to us using this form for any inquiries, feedback, or questions you may have. We look forward to hearing from you!</span>
          </div>
          <div class="main-sec-2-contact-form">
            <form class="my-3" data-bs-theme="dark" method="post" action="api/contact_controller.php">
              <div class="form-floating mb-3">
                <textarea class="form-control" name="question" MaxLength="500" placeholder="Leave a comment here" id="floatingTextarea" required></textarea>
                <label for="floatingTextarea">Ask us!</label>
              </div>
              <div class="mb-3">
                <input type="email" name="email" placeholder="Enter your email" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
    </div>
    <script src="js/sliding-text.js"></script>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>