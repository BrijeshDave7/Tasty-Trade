<?php

// Database credentials (replace with your actual credentials)
$servername = "localhost";
$username = "abc";
$password = "abc";
$db_name = "tastytrade";

// Create connection (using mysqli_connect with error handling)
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check for connection errors and provide informative feedback
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted and email is provided
if (isset($_POST['email']) && !empty(trim($_POST['email']))) {

    // Escape user input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));

    // Prepare the INSERT statement using PDO (more secure)
    $sql = "INSERT INTO email_store (sr_no, user_email) VALUES (NULL,?)";
    $stmt = $conn->prepare($sql);

    // Bind the email parameter
    $stmt->bind_param("s", $email);

    // Execute the prepared statement with error handling
    if ($stmt->execute()) {
        echo "Email address submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();

} else {
    // Handle missing email or form submission error (optional)
    echo "Please enter an email address.";
}

// Close the connection (optional, but recommended for resource management)
mysqli_close($conn);

?>
