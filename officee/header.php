
<!DOCTYPE html>
<html lang="en">
<?php

session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Office Panel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./b.png">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <style>
       body {
    background-color: white;
}

.nav-header, .header {
    background-color: #1382ba;
    color: white;
}

.quixnav {
    background-color: white;
    color: black;
}

.quixnav .metismenu > li > a {
    color: #1382ba;
}

.user-profile a, .profile-notification a {
    color: black;
}

.social-icons a {
    background-color: white;
    color: #1382ba;
}

.icon-circle {
    background-color: white;
    color: #1382ba;
}

.icon-circle:hover {
    background-color: #f0f0f0;
}

.header-content {
    background-color: #1382ba;
    color: white;
}

#list {
    background-color: transparent;
    border: none;
}

.social-icons {
            margin: 20px 0;
        }

        .social-icons a {
            border-radius: 60%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 3px;
            width: 40px;
            height: 40px;
            cursor: pointer;
            color:  #1382ba;
            text-decoration: none;
        }
    </style>
</head>

<body id="bg">
    <!-- Preloader start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!-- Preloader end -->

    <!-- Main wrapper start -->
    <div id="main-wrapper">
        <!-- Nav header start -->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img class="brand-abbr" src="./b.png" alt="" height="40px">
                <img class="logo-compact" src="./b.png" alt="">
                <img class="brand-title" src="./a.png" alt="" width="100px">
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!-- Nav header end -->

        <!-- Header start -->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">           
                            <div class="social-icons">
                                <a href="#" class="icon"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                            </div>
                        </div>
                        <!-- HEADER WORK START -->
                        <div class="header-right">
                            <!-- User profile -->
                            <ul class="nav-right">
                                <li class="user-profile header-notification">
                                    <a href="#!" class="waves-effect waves-light">
                                        <span>
                                            <?php echo '<a style="color: black;">' . htmlspecialchars($_SESSION['office_name']) . '</a>'; ?>
                                        </span>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li class="waves-effect waves-light">
                                            <a href="logout.php">
                                                <i class="fas fa-sign-out-alt"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header end -->

        <!-- Sidebar start -->
        <div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first text-dark"><strong>Main Menu</strong></li>
            <li><a href="./index.php" aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span class="nav-text">Dashboard</span></a></li>
            <li><a href="./add_vacancies.php" aria-expanded="false"><i class="fas fa-briefcase"></i><span class="nav-text">Add Vacancies</span></a></li>
            <li><a href="./inserted_user.php" aria-expanded="false"><i class="fas fa-users"></i><span class="nav-text">Inserted Users</span></a></li>
            <li><a href="./inserted_user_all.php" aria-expanded="false"><i class="fas fa-calendar-check"></i><span class="nav-text">Set Interview</span></a></li>
            <li><a href="./profile.php" aria-expanded="false"><i class="fas fa-user"></i><span class="nav-text">Profile</span></a></li>
            <li><a href="./profile_office.php" aria-expanded="false"><i class="fas fa-building"></i><span class="nav-text">Office Profile</span></a></li>
        </ul>
    </div>
</div>

        <!-- Sidebar end -->
    </div>
    <!-- Main wrapper end -->


</body>

</html>
