<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Jewel Theme">
        <meta name="description" content="Wheel - Responsive and Modern Car Rental Website Template">
        <meta name="keywords" content="">
        <title>Wheel - Responsive and Modern Car Rental Website Template</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <!-- reset css -->
        <link rel="stylesheet" type="text/css" href="assets/css/css_reset.css">
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/jquery.datetimepicker.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
        <!-- preload -->
        <link rel="stylesheet" type="text/css" href="assets/css/loaders.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/index.css">
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="">
        <!-- MAIN -->
                <div class="load-wrap">
                    <div class="wheel-load">
                        <img src="images/loader.gif" alt="" class="image">
                    </div>
                </div>
                <?php
    // Start session
    session_start();

    // Include the database connection file
    include 'connection.php';

    // Function to get user ID from username
    function getUserIdByUsername($username) {
        global $conn; // Use the connection from the included file

        // Prepare and bind
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);

        // Execute the statement
        $stmt->execute();

        // Bind the result
        $stmt->bind_result($userId);
        $stmt->fetch();
        $stmt->close();

        return $userId;
    }

    // Check if the session variable 'username' is set and get the user ID
    $userId = null;
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $userId = getUserIdByUsername($username);
    }
?>

<div class="wheel-menu-wrap">
    <div class="container-fluid wheel-bg1">
        <div class="row">
            <div class="col-sm-3">
                <div class="wheel-logo">
                    <a href="index.php" style="width: 300px;"><img src="images/logo3.png" alt=""></a>
                </div>
            </div>
            <div class="col-sm-9 col-xs-12 padd-lr0">
                <div class="wheel-top-menu clearfix">
                    <div class="wheel-top-menu-info">
                        <div class="top-menu-item"><a href="#"><i class="fa fa-phone"></i><span>(+212) 766 314126</span></a></div>
                        <div class="top-menu-item"><a href="#"><i class="fa fa-envelope"></i><span>contact@wheel-rental.com</span></a></div>
                    </div>

                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <!-- Display username and logout button if user is logged in -->
                        <div class="wheel-top-menu-log">
                            <div class="top-menu-item">
                                <span style="color: white">Welcome, <?php echo $_SESSION['username']; ?></span>
                            </div> 
                            <div class="top-menu-item">
                                <form action="logout.php" method="post">
                                    <button type="submit" class="btn btn-default">Logout</button>
                                </form>
                            </div>
                        </div>
                    <?php else : ?>
                        <!-- Display login and register links if user is not logged in -->
                        <div class="wheel-top-menu-log">
                            <div class="top-menu-item">
                                <div class="dropdown wheel-user-ico">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Account
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="register.php">Login</a></li>
                                        <li><a href="register.php">Register</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-9 ">
                <div class="wheel-navigation">
                    <nav id="dl-menu">
                        <!-- class="dl-menu" -->
                        <ul class="main-menu dl-menu">
                            <li class="menu-item   current-menu-parent menu-item-has-children   active-color ">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item current-menu-parent menu-item-has-children  ">
                                <a href="car-list-grid.php"> Listing </a>
                            </li>
                            <li class="menu-item">
                                <a href="reservation1.php"> Reservation</a>
                            </li>
                            <?php if ($userId == 3): ?>
                                <li class="menu-item">
                                    <a href="admin.php">Admin Dashboard</a>
                                </li>
                            <?php endif; ?>
                            <li class="menu-item menu-item-has-children  ">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li class="menu-item "><a href="contact.html">contact</a></li>
                                    <li class="menu-item "><a href="register.php">Register</a></li>
                                    <li class="menu-item "><a href="about.php">About</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="nav-menu-icon"><i></i></div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- ////////////////////////////////////////////////////////////// -->
        <div class="wheel-start3">
            <img src="images/bg7.jpg" alt="" class="wheel-img">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 padd-lr0">
                        <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                            <h3>About Us</h3>
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li><a href="#"> pages </a></li>
                                <li class="active">About</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////////////////// -->
        <div class="container padd-lr0">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="wheel-info-img  marg-lg-t150 marg-lg-b150 marg-md-t100 marg-md-b100">
                        <img src="images/i7.png" alt="" class="wheel-img">
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="wheel-info-text  marg-lg-t150 marg-lg-b150 marg-md-t100 marg-md-b100 marg-sm-t50 marg-sm-b50">
                        <div class="wheel-header">
                            <h5>Who we are  </h5>
                            <h3>We Love Our <span>Customers</span></h3>
                        </div>
                        <span>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. </span>
                        <p>Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam </p>
                        <a href="#" class="wheel-btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////////////////////////////// -->
        <div class="wheel-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wheel-header wheel-testi-header text-center marg-lg-t145 marg-lg-b65 marg-md-t100 marg-sm-t50 marg-md-b50">
                            <h3>Our Mission is <span>Client’s</span> Satisfaction</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wheel-testimonial text-center">
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                            <div class="wheel-testimonial-info">
                                <span>Anthony Marshal</span>
                                <img src="images/l1.png" alt="">
                                <p> C.E.O. & Co-Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 padd-lr0 ">
                        <div class="wheel-testimonial-item marg-lg-b150 marg-md-b100 marg-sm-b50 ">
                            <i class="fa fa-users"></i>
                            <span data-to="753" data-speed="10000"></span><b>+</b>
                            <p>Dedicated Employees</p>
                        </div>
                        <div class="wheel-testimonial-item marg-lg-b150 marg-md-b100 marg-sm-b50">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span data-to="9053" data-speed="5000"></span><b>+</b>
                            <p>Satisfied Customers</p>
                        </div>
                        <div class="wheel-testimonial-item marg-lg-b150 marg-md-b100 marg-sm-b50">
                            <i class="fa  fa-car"></i>
                            <span data-to="529" data-speed="6000"></span><b>+</b>
                            <p>100% Fit Veihicles</p>
                        </div>
                        <div class="wheel-testimonial-item marg-lg-b150 marg-md-b100 marg-sm-b50">
                            <i class="fa fa-trophy"></i>
                            <span data-to="111" data-speed="1000"></span><b>+</b>
                            <p>Int. Awards Achieved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //////////////////////////////////////////// -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 padd-lr0">
                    <div class="wheel-skills marg-lg-b150 marg-sm-b50">
                        <div class="wheel-header marg-lg-t140 marg-lg-b55 marg-sm-t50">
                            <h5>Our Capibilities </h5>
                            <h3>We have great<span> Skills</span></h3>
                        </div>
                        <div class="wheel-skills-info">
                            <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                            <ul>
                                <li class="clearfix">
                                    <span>Management<i>83%</i></span>
                                    <div class="wheel-interest-body">
                                        <div class="wheel-interest" data-size='83'></div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span>Efficiencyy<i>76%</i></span>
                                    <div class="wheel-interest-body">
                                        <div class="wheel-interest" data-size='76'></div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span>Men Power<i>90%</i></span>
                                    <div class="wheel-interest-body">
                                        <div class="wheel-interest" data-size='90'></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 padd-lr0">
                    <div class="wheel-skills-accordion marg-lg-t150 marg-lg-b135 marg-sm-t50 marg-sm-b50">
                        <div class="wpc-accordion">
                            <div class="panel-wrap active">
                                <h5 class="panel-title">We are Passionate <span></span></h5>
                                <div class="panel-content">
                                    Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit 
                                </div>
                            </div>
                            <div class="panel-wrap">
                                <h5 class="panel-title">We are Dedicated <span></span></h5>
                                <div class="panel-content">
                                    Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit 
                                </div>
                            </div>
                            <div class="panel-wrap">
                                <h5 class="panel-title">We ensure the best <span></span></h5>
                                <div class="panel-content">
                                    Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////// -->
        <div class="wheel-bg2">
            <div class="container padd-lr0">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="wheel-header text-center marg-lg-t145 marg-sm-t50 marg-lg-b90">
                            <h5>Memebers </h5>
                            <h3>Our Excellent <span>Team</span></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="wheel-team text-center marg-lg-b150 marg-sm-b50">
                            <div class="wheel-team-logo"><img src="images/i20.jpg" alt=""></div>
                            <div class="wheel-team-info ">
                                <h5>Edward Ljumbarge</h5>
                                <span> Founder</span>
                                <ul>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="wheel-team text-center marg-lg-b150 marg-sm-b50">
                            <div class="wheel-team-logo"><img src="images/i21.jpg" alt=""></div>
                            <div class="wheel-team-info ">
                                <h5>Russel Crow </h5>
                                <span>C.E.O & Co-Founder</span>
                                <ul>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="wheel-team text-center marg-lg-b150 marg-sm-b50">
                            <div class="wheel-team-logo"><img src="images/i22.jpg" alt=""></div>
                            <div class="wheel-team-info ">
                                <h5>Julia Robarts</h5>
                                <span>Director</span>
                                <ul>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="wheel-team text-center marg-lg-b150 marg-sm-b50">
                            <div class="wheel-team-logo"><img src="images/i23.jpg" alt=""></div>
                            <div class="wheel-team-info ">
                                <h5>Angelina Jolly</h5>
                                <span> Manager</span>
                                <ul>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////// -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-partners text-center marg-lg-b150 marg-sm-b50 marg-lg-t150 marg-sm-t50">
                        <a href="#"><img src="images/p7.png" alt=""></a>
                        <a href="#"><img src="images/p8.png" alt=""></a>
                        <a href="#"><img src="images/p9.png" alt=""></a>
                        <a href="#"><img src="images/p10.png" alt=""></a>
                        <a href="#"><img src="images/p11.png" alt=""></a>
                        <a href="#"><img src="images/p12.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////// -->
        <div class="wheel-subscribe wheel-bg2">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6 padd-lr0">
                        <div class="wheel-header">
                            <h5>Newsletter Signup </h5>
                            <h3>Subscribe & get<span> 20% </span> Off</h3>
                        </div>
                    </div>
                    <div class="col-md-6 padd-lr0">
                        <form action="#">
                            <input type="text" placeholder="Your Email Adddress">
                            <button class="wheel-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <!-- ///////////////// -->
        <footer class="wheel-footer">
            <img src="images/bg4.jpg" alt="" class="wheel-img">
            <div class="container">
                <div class="row">
                    <div class="col-md-3  col-sm-6  padd-lr0">
                        <div class="wheel-address">
                            <div class="wheel-footer-logo"><a href="#"><img src="images/logo2.png" alt=""></a></div>
                            <ul>
                                <li><span><i class="fa fa-map-marker"></i>121 King Street, Melbourne <br>
                                        VIC 3000, Australia </span>
                                </li>
                                <li><a href="#"><span><i class="fa fa-phone"></i> +61 3 8376 6284</span></a></li>
                                <li><a href="#"><span><i class="fa fa-envelope"></i>contact@wheel-rental.com</span></a></li>
                            </ul>
                            <div class="wheel-soc">
                                <a href="#" class="fa fa-twitter"></a>
                                <a href="#" class="fa fa-facebook"></a>
                                <a href="#" class="fa fa-linkedin"></a>
                                <a href="#" class="fa fa-instagram"></a>
                                <a href="#" class="fa fa-share-alt"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6  padd-lr0">
                        <div class="wheel-footer-item">
                            <h3>Useful Links</h3>
                            <ul>
                                <li><a href="about.html" class="">About us</a></li>
                                <li><a href="contact.html" class="">Contact Us</a></li>
                                <li><a href="#" class="">Privacy policy</a></li>
                                <li><a href="#" class="">Site Map</a></li>
                                <li><a href="#" class="">Terms & condition</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6  padd-lr0">
                        <div class="wheel-footer-item ">
                            <h3>Vehicles</h3>
                            <ul>
                                <li><a href="#" class="">Exotic Cars</a></li>
                                <li><a href="#" class="">SUVs</a></li>
                                <li><a href="#" class="">Trucks</a></li>
                                <li><a href="#" class="">Mini Vans</a></li>
                                <li><a href="#" class="">Moving Trucks</a></li>
                                <li><a href="#" class="">Vans</a></li>
                                <li><a href="#" class="">RVs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 padd-lr0">
                        <div class="wheel-footer-gallery">
                            <h3>Photo Gallery</h3>
                            <div class="  clearfix">
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i11.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i12.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i13.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i14.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i15.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i16.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i17.jpg" alt=""></a></div>
                                <div class="wheel-footer-galery-item"><a href="#"><img src="images/i18.jpg" alt=""></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="wheel-footer-info wheel-bg6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-sm-6  padd-lr0"><span>&#169; WHEEL 2024 | <a href="#">Templates Point</a> </span>
                    </div>
                    <div class="col-lg-4 col-sm-6 padd-lr0">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="car-list-3col2.html"> Listings</a></li>
                            <li><a href="reservation1.html"> Reservation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts project -->
        <script type="text/javascript" src="assets/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <!-- count -->
        <script type="text/javascript" src='assets/js/jquery.countTo.js'></script>
        <!-- google maps -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt5tJTim4lOO3ojbGARhPd1Z3O3CnE-C8" type="text/javascript"></script>
        <!-- swiper -->
        <script type="text/javascript" src="assets/js/idangerous.swiper.min.js"></script>
        <script type="text/javascript" src="assets/js/equalHeightsPlugin.js"></script>
        <script type="text/javascript" src="assets/js/jquery.datetimepicker.full.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="assets/js/index.js"></script>
        <!-- sixth block end -->
    </body>


</html>