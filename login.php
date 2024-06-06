<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Include database connection
include 'connection.php';

// Function to generate a random session token
function generateSessionToken($length = 32) {
    return bin2hex(random_bytes($length));
}

// Function to get the current timestamp plus a specified number of seconds
function getExpiryTimestamp($seconds = 3600) {
    return date('Y-m-d H:i:s', strtotime("+$seconds seconds"));
}

// Check if the form is submitted
if (isset($_POST["login_submit"])) {
    // Retrieve username or email and password from the form
    $username_or_email = isset($_POST['username_or_email']) ? $_POST['username_or_email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    // Validate input (you may want to add more validation)
    if (empty($username_or_email) || empty($password)) {
        echo "Please enter username/email and password.";
    } else {
        // Prepare SQL statement to retrieve user from database
        $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username_or_email, $username_or_email);
        
        // Execute SQL statement
        $stmt->execute();
        
        // Bind result variables
        $stmt->bind_result($user_id, $db_username, $db_email, $db_password);
        
        // Fetch the result
        if ($stmt->fetch()) {
            // Verify password
            if (password_verify($password, $db_password)) {
                // Authentication successful
                // Set session variables
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $db_username;
                $_SESSION['email'] = $db_email;

                // Close the statement for fetching user data
                $stmt->close();

                // Generate session token and expiry timestamp
                $session_token = generateSessionToken();
                $expiry_timestamp = getExpiryTimestamp();

                // Insert session data into the database
                $insert_stmt = $conn->prepare("INSERT INTO user_sessions (user_id, session_token, expiry_timestamp) VALUES (?, ?, ?)");
                $insert_stmt->bind_param("iss", $user_id, $session_token, $expiry_timestamp);
                if ($insert_stmt->execute()) {
                    // Session created successfully
                    // Redirect to dashboard or home page
                    header("Location: http://localhost/Wheel-Car-Rental-Booking-HTML5-Website-Template-master/index.php");
                    exit();
                } else {
                    echo "Error creating session: " . $insert_stmt->error;
                }
            } else {
                echo "Incorrect password.";
            }
        } else {
            echo "User not found.";
        }

        // Close statement
        $stmt->close();
    }
}

// Close database connection
$conn->close();
?>
