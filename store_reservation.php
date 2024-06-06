<?php
// Start session
session_start();

// Log the current URL and form data
error_log("Current URL: " . $_SERVER['REQUEST_URI']);
error_log("Form data: " . json_encode($_POST));

// Check if all form fields are set
if (
    isset($_POST['pickup_location']) &&
    isset($_POST['dropping_off_location']) &&
    isset($_POST['pickup_date']) &&
    isset($_POST['pickup_time']) &&
    isset($_POST['return_date']) &&
    isset($_POST['return_time']) &&
    isset($_POST['driver_age']) &&
    isset($_POST['car_selected'])
) {
    // Include database connection
    include 'connection.php';

    // Retrieve session variable for username
    if (!isset($_SESSION['username'])) {
        error_log("Redirecting to login.php");
        header("Location: login.php");
        exit();
    }
    $username = $_SESSION['username'];

    // Retrieve first_name and last_name from the users table using the username
    $stmt = $conn->prepare("SELECT first_name, last_name FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name);
    $stmt->fetch();
    $stmt->close();

    // Retrieve form data
    $pickup_location = $_POST['pickup_location'];
    $dropping_off_location = $_POST['dropping_off_location'];
    $pickup_date = $_POST['pickup_date'];
    $pickup_time = $_POST['pickup_time'];
    $return_date = $_POST['return_date'];
    $return_time = $_POST['return_time'];
    $driver_age = $_POST['driver_age'];
    $car_selected = $_POST['car_selected'];

    // Print the form data
    echo "pickup_location: $pickup_location<br>";
    echo "dropping_off_location: $dropping_off_location<br>";
    echo "pickup_date: $pickup_date<br>";
    echo "pickup_time: $pickup_time<br>";
    echo "return_date: $return_date<br>";
    echo "return_time: $return_time<br>";
    echo "driver_age: $driver_age<br>";
    echo "car_selected: $car_selected<br>";

    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO reservations (first_name, last_name, username, dropping_off_location, picking_up_location, pickup_date, pickup_time, return_date, return_time, driver_age, car_selected) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssi", $first_name, $last_name, $username, $dropping_off_location, $pickup_location, $pickup_date, $pickup_time, $return_date, $return_time, $driver_age, $car_selected);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to a success page or display a success message
        error_log("Reservation successful, redirecting to success.php");
        header("Location: success.php");
        exit();
    } else {
        // If there's an error, display it
        error_log("Error: " . $stmt->error);
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If some form fields are not set, redirect back to the reservation page with an error message
    error_log("Fields not set, redirecting to reservation.php?error=fields_not_set");
    header("Location: reservation1.php?error=fields_not_set");
    exit();
}
?>
