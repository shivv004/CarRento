<div class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CarRento</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="booking_page.php">Rental Cars</a>
                    </li>
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
                //Check if user is loging or not
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
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item" id="nav-user-name">
                        <span><?php echo $_SESSION["name"] ?></span>
                    </li>
                    <div class="nav-vl"></div>
                    <li class="nav-item">
                        <a class="nav-link active" href="api/logout.php">Logout</a>
                    </li>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</div>
