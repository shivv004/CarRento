<div class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CarRento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul id="nav-left" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="booking_page.php">Book a Car</a>
                    </li>
                    <?php
                    if (isset($_SESSION["id"])) {
                        if ($_SESSION["isAgency"] == 1) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="new-car.php">Add new cars</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="booked-cars.php">View booked cars</a>
                        </li>
                    <?php
                        }
                    }
                    ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Links
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://github.com/shivv004" target="_blank" rel="noreferrer">Github</a></li>
                        <li><a class="dropdown-item" href="https://www.linkedin.com/in/shiv-shankar04/" target="_blank" rel="noreferrer">LinkedIn</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="http://www.sedbuzz.com/portfolio" target="_blank" rel="noreferrer">My Portfolio</a></li>
                    </ul>
                    </li>
                </ul>
                <?php
                if (!isset($_SESSION["id"])) {
                ?>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="signin.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="user_signup.php">Signup</a>
                    </li>
                </ul>
                <?php
                } else {
                ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person mb-1 mx-1" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                    </svg>
                        <?php echo $_SESSION["name"] ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="api/logout.php">Logout</a></li>
                    </ul>
                    </li>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</div>
