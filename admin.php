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
                            <li class="menu-item current-menu-parent menu-item-has-children  ">
                                <a href="car-list-grid.php"> Listing </a>
                            </li>
                            <li class="menu-item">
                                <a href="reservation1.php"> Reservation</a>
                            </li>
                            <?php if ($userId == 3): ?>
                                <li class="menu-item active-color">
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
        <div class="wheel-start3">
            <img src="images/bg7.jpg" alt="" class="wheel-img">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 padd-lr0">
                        <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                            <h3>Admin Dashboard</h3>
                            <ol class="breadcrumb">
                                <li><a href="#">Home</a></li>
                                <li class="active">Admin-Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /////////////////////////////////// -->
                <div class="admin-dashboard">
        <div class="reservations">
            <h2>All Reservations</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>username</th>
                        <th>pickup_location</th>
                        <th>droppingof_location</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>pickup time</th>
                        <th>return time</th>
                        <th>driver_age</th>
                        <th>car_selected</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';
                    // Assuming you have a function get_all_reservations() that returns all reservations from the database
                    $reservations = get_all_reservations();
                    foreach ($reservations as $reservation) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($reservation['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['first_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['last_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['username']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['picking_up_location']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['dropping_off_location']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['pickup_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['return_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['pickup_time']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['return_time']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['driver_age']) . "</td>";
                        echo "<td>" . htmlspecialchars($reservation['car_selected']) . "</td>";
                        echo "</tr>";
                    }
                    function get_all_reservations() {
    // Assuming $conn is your database connection variable
    global $conn;

    // Prepare the SQL query to select all necessary columns from the reservations table
    $query = "SELECT id, first_name, last_name, username, dropping_off_location, picking_up_location, pickup_date, pickup_time, return_date, return_time, driver_age, car_selected FROM reservations";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check for errors
    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }

    // Fetch all reservation records as an associative array
    $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result set
    mysqli_free_result($result);

    return $reservations;
}

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- User Information Section -->
<div class="user-information">
    <h2>All Users</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Assuming you have a function get_all_users() that returns all users from the database
            $users = get_all_users();
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                echo "<td>" . htmlspecialchars($user['first_name']) . "</td>";
                echo "<td>" . htmlspecialchars($user['last_name']) . "</td>";
                echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                echo "</tr>";
            }
            function get_all_users() {
    // Assuming $conn is your database connection variable
    global $conn;

    // Prepare the SQL query to select all users
    $query = "SELECT id, first_name, last_name, email, username FROM users";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check for errors
    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }

    // Fetch all user records as an associative array
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result set
    mysqli_free_result($result);

    return $users;
}
            ?>
        </tbody>
    </table>
</div>
<div class="cars">
    <h2>All Cars</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cars = get_all_cars();
            foreach ($cars as $car) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($car['id']) . "</td>";
                echo "<td>" . htmlspecialchars($car['title']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php

function get_all_cars() {
    global $conn;
    $query = "SELECT id, title FROM cars";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }
    $cars = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    return $cars;
}
?>
        <!-- ////////////////////////////////////////// -->
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