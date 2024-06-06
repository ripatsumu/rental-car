<?php
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for registration
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    // Add any other form fields as needed

    // Insert user registration data into the database
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)");

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $username, $password);

        if ($stmt->execute()) {
            // Registration successful
            echo "User registered successfully.";
        } else {
            echo "Error registering user: " . $stmt->error;
        }
    } else {
        echo "Error preparing registration statement: " . $conn->error;
    }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
} else {
    // Redirect or handle the case where the form is not submitted
    echo "Form not submitted.";
}
?>
