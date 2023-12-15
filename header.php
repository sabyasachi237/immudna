<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>Medic - Hospital, Diagnostic, Clinic, Health and Medical Lab HTML Website Template</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <link rel="stylesheet" href="assets/css/odometer.min.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
<div include-html="header-menu.php"></div>

<header class="header-area">
    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="heading-left-part">
                        <li>
                            <i class="bx bx-phone-call"></i>
                            <span>Call Us:</span>
                            <a href="tel:+123-456-789">+123-456-789</a>
                        </li>
                        <li>
                            <i class="bx bx-envelope"></i>
                            <span>Email:</span>
                            <a href="mailto:hello@example.com">hello@example.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="heading-right-part">
                        <li><a href="#"><i class="bx bxl-facebook"></i></a></li>
                        <li><a href="#"><i class="bx bxl-twitter"></i></a></li>
                        <li><a href="#"><i class="bx bxl-linkedin"></i></a></li>
                        <li><a href="#"><i class="bx bxl-instagram"></i></a></li>
                        <li><a href="#"><i class="bx bxl-skype"></i></a></li>
                        <li><a href="#"><i class="bx bxl-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-area">
        <div class="navbar-area">
            <div class="main-nav">
                <nav class="navbar navbar-expand-md">
                    <div class="container">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/img/logo.png" alt="Logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav m-auto">
                                <?php
                                $menuItems = array(
                                    array(
                                        'title' => 'Home',
                                        'link' => 'index.php',
                                    ),
                                    array(
                                        'title' => 'Services',
                                        'link' => '#',
                                        'submenu' => array(
                                            // ... Services submenu items
                                        ),
                                    ),
                                    array(
                                        'title' => 'Process',
                                        'link' => 'process.php',
                                    ),
                                    array(
                                        'title' => 'About Us',
                                        'link' => '#',
                                        'submenu' => array(
                                            // ... About Us submenu items
                                        ),
                                    ),
                                    array(
                                        'title' => 'Shop',
                                        'link' => '#',
                                        'submenu' => array(
                                            array(
                                                'title' => 'Shop List',
                                                'link' => 'shop-list.php',
                                            ),
                                            array(
                                                'title' => 'Cart',
                                                'link' => 'cartlist.php',
                                            ),
                                            // array(
                                            //     'title' => 'Checkout',
                                            //     'link' => 'checkout.php',
                                            // ),
                                        ),
                                    ),
                                    array(
                                        'title' => 'Contact',
                                        'link' => 'contact-style-two.php',
                                    ),
                                );


                                foreach ($menuItems as $menuItem) {
                                    echo '<li class="nav-item">';
                                    echo '<a href="' . $menuItem['link'] . '" class="nav-link">';
                                    echo $menuItem['title'];
                                    if (isset($menuItem['submenu'])) {
                                        echo '<i class="bx bx-plus"></i>';
                                        echo '</a>';
                                        echo '<ul class="dropdown-menu">';
                                        foreach ($menuItem['submenu'] as $subItem) {
                                            echo '<li class="nav-item">';
                                            echo '<a href="' . $subItem['link'] . '" class="nav-link">' . $subItem['title'] . '</a>';
                                            echo '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        echo '</a>';
                                    }
                                    echo '</li>';

                                    if ($menuItem['title'] === 'Contact' && !isset($_SESSION['user_id'])) {
                                        echo '<li class="nav-item">';
                                        echo '<a href="log-in.php" class="nav-link">Log In</a>';
                                        echo '</li>';
                                        echo '<li class="nav-item">';
                                        echo '<a href="sign-up.php" class="nav-link">Sign Up</a>';
                                        echo '</li>';
                                    }
                                }

                                if (isset($_SESSION['user_id'])) {
                                    echo '<li class="nav-item">';
                                    echo '<a href="profile.php" class="nav-link">Profile</a>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                            <div class="others-option">
                                <div class="get-quote">
                                    <a href="appointment.php" class="default-btn">
                                        Get An Appointment
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="mobile-nav">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" alt="Logo">
                </a>
            </div>
        </div>
    </div>
</header>
</body>
</html>
