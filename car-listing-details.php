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
        <script>
        // JavaScript code to handle button click event
        document.querySelector('.reservation-button').addEventListener('click', function() {
            // Retrieve the car ID from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const carId = urlParams.get('id');
            // Redirect to reservation1.php with the car ID as a parameter
            window.location.href = `reservation1.php?id=${carId}`;
        });
        </script>

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
                            <li class="menu-item   current-menu-parent menu-item-has-children">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item current-menu-parent menu-item-has-children  active-color">
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
        <!-- //////////////////////////////// -->

       
        <!-- ///////////// -->
<?php
        // Include database connection
include 'connection.php';

// Retrieve the car ID from the URL and convert it to an integer
$car_id = intval($_GET['id']);

// Check if a valid ID was provided
if ($car_id > 0) {
    // Prepare the query to fetch car details using the ID
    $stmt = $conn->prepare("SELECT image3, title, description, seats, baby_seat, doors, ac, airbags, power_steering, transmission, central_locking, co2_emission, stereo_radio, abs_brakes, mileage_per_tank FROM cars WHERE id = ?");

    if ($stmt) {
        // Bind the ID parameter and execute the statement
        $stmt->bind_param("i", $car_id);
        
        if ($stmt->execute()) {
            // Bind the result variables
            $stmt->bind_result($image3, $title, $description, $seats, $baby_seat, $doors, $ac, $airbags, $power_steering, $transmission, $central_locking, $co2_emission, $stereo_radio, $abs_brakes, $mileage_per_tank);
            
            // Fetch the data
            if ($stmt->fetch()) {
                 // Add the provided <div> structure here
                echo '<div class="wheel-start3 style-5">
                    <img src="images/z-bg-11.jpg" alt="" class="wheel-img">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 padd-lr0">
                                <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                                    <h3>Listing Details</h3>
                                    <ol class="breadcrumb">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#"> Listing </a></li>
                                        <li class="active">Listing details</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="imgOnBanner-wrap">
                        <img src="images/'. $image3 .'" alt="" class="imgOnBanner img-responsive">
                    </div>
                </div>';
                // Display the details dynamically in your HTML structure
                echo '<div class="container-fluid padd-lr0">
                        <div class="row padd-lr0">
                            <div class="col-xs-12 padd-lr0">
                                <div class="container padd-lr0 xs-padd">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="listing-headlines text-center">
                                                <h5 class="title">' . htmlspecialchars($title) . '</h5>
                                                <div class="subtitle">Exotic Car Collection</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 padd-lr0 xs-padd sm-addpadd">
                                            <div class="wheel-collection style-2">
                                                <div class="tabs">
                                                    <div class="tabs-header">
                                                        <ul>
                                                            <li class="active"><a href="#">Features</a></li>
                                                            <li><a href="#">Description</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="tabs-content marg-lg-b30">
                                                        <div class="tabs-item text-item active">
                                                            <ul class="tabslist">
                                                                <li class="item">' . $seats . ' Adult Passenger Seats</li>
                                                                <li class="item">' . $baby_seat . ' Baby Seat</li>
                                                                <li class="item">' . $doors . ' Doors</li>
                                                                <li class="item">' . ($ac ? 'Air Conditioning' : 'No Air Conditioning') . '</li>
                                                            </ul>
                                                            <ul class="tabslist">
                                                                <li class="item">' . ($airbags ? 'Airbags' : 'No Airbags') . '</li>
                                                                <li class="item">' . ($power_steering ? 'Power Steering' : 'No Power Steering') . '</li>
                                                                <li class="item">' . htmlspecialchars($transmission) . '</li>
                                                                <li class="item">' . htmlspecialchars($central_locking) . '</li>
                                                            </ul>
                                                            <ul class="tabslist">
                                                                <li class="item">CO2 ' . htmlspecialchars($co2_emission) . 'g/km</li>
                                                                <li class="item">' . htmlspecialchars($stereo_radio) . '</li>
                                                                <li class="item">ABS Brakes</li>
                                                                <li class="item">' . htmlspecialchars($mileage_per_tank) . ' km Mileage Per Tank</li>
                                                            </ul>
                                                        </div>
                                                        <div class="tabs-item text-item">
                                                            <p>' . htmlspecialchars($description) . '</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="align-items: center;display: flex;justify-content: center;">
                            <button class="wheel-btn reservation-button">Reserve Now</button>
                        </div>
                    </div>';
            } else {
                echo "No car details found.";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error executing query: " . $stmt->error;
        }
    } else {
        echo "Error preparing query: " . $conn->error;
    }
} else {
    echo "Invalid car ID.";
}

// Close the connection
$conn->close();

?>
<script>
    // JavaScript code to handle button click event
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.reservation-button').addEventListener('click', function() {
            // Retrieve the car ID from the URL
            const urlParams = new URLSearchParams(window.location.search);
            const carId = urlParams.get('id');
            // Redirect to reservation1.php with the car ID as a parameter
            window.location.href = `reservation1.php?id=${carId}`;
        });
    });
</script>

        <div class="car-swiper-wrap">
            <!-- /////////////////////////////////// -->
            <div class="swiper-container" data-autoplay="5000" data-loop="1" data-speed="1000" data-slides-per-view="responsive" data-add-slides="3" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lg-slides="3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <!-- swiper slide -->
                        <div class="car-item-wrap">
                            <div class="title">2016 Marcedes-Benz SLK</div>
                            <div class="price"><span>$79<sup>00</sup></span>/Day</div>
                            <div class="img-wrap">
                                <img src="images/z-car-1.png" alt="img" class="img-responsive">
                            </div>
                            <ul class="metadata">
                                <li>2 seats</li>
                                <li>2 bags</li>
                                <li>150 mpg</li>
                                <li>airbags</li>
                                <li>manual/auto</li>
                                <li>ac</li>
                                <li>v8 engine</li>
                            </ul>
                            <a href="#" class="link">view details</a>
                        </div>
                    </div>
                    <!-- .swiper slide -->
                    <div class="swiper-slide">
                        <!-- swiper slide -->
                        <div class="car-item-wrap">
                            <div class="title">2016 Chevrolet Malibu</div>
                            <div class="price"><span>$81<sup>00</sup></span>/Day</div>
                            <div class="img-wrap">
                                <img src="images/z-car-2.png" alt="img" class="img-responsive">
                            </div>
                            <ul class="metadata">
                                <li>2 seats</li>
                                <li>2 bags</li>
                                <li>150 mpg</li>
                                <li>airbags</li>
                                <li>manual/auto</li>
                                <li>ac</li>
                                <li>v8 engine</li>
                            </ul>
                            <a href="#" class="link">view details</a>
                        </div>
                    </div>
                    <!-- .swiper slide -->
                    <div class="swiper-slide">
                        <!-- swiper slide -->
                        <div class="car-item-wrap">
                            <div class="title">Bugatti Veyron</div>
                            <div class="price"><span>$79<sup>00</sup></span>/Day</div>
                            <div class="img-wrap">
                                <img src="images/z-car-3.png" alt="img" class="img-responsive">
                            </div>
                            <ul class="metadata">
                                <li>2 seats</li>
                                <li>2 bags</li>
                                <li>150 mpg</li>
                                <li>airbags</li>
                                <li>manual/auto</li>
                                <li>ac</li>
                                <li>v8 engine</li>
                            </ul>
                            <a href="#" class="link">view details</a>
                        </div>
                    </div>
                    <!-- .swiper slide -->
                </div>
                <div class="pagination"></div>
            </div>
            <div class="swiper-outer-left"></div>
            <div class="swiper-outer-right"></div>
            <!-- /////////////////////////////// -->
        </div>
        <!-- /////////////////////////////// -->
        <!-- FOOTER -->
        <!-- ///////////////// -->
              <footer class="wheel-footer">
            <img src="images/bg4.jpg" alt="" class="wheel-img">
            <div class="container">
                <div class="row">
                    <div class="col-md-3  col-sm-6  padd-lr0">
                        <div class="wheel-address">
                            <div class="wheel-footer-logo"><a href="#"><img src="images/logo3.png" alt=""></a></div>
                            <ul>
                                <li><span><i class="fa fa-map-marker"></i>121 King Street, Melbourne <br>
                                    VIC 3000, Australia  </span>
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
                    <div class="col-lg-8 col-sm-6  padd-lr0"><span>&#169; WHEEL 2024 | <a href="#">Templates Point</a> </span></div>
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