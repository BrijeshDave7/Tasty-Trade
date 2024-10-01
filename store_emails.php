<?php
$servername = "localhost";
$username = "mamp@localhost";
$password = "mamp";
$dbname = "Website";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$email = "test@example.com"; // Replace with a test email

// Prepare SQL statement for insert (without specifying created_at)
$stmt = mysqli_prepare($conn, "INSERT INTO emails (email) VALUES (?)");
mysqli_stmt_bind_param($stmt, "s", $email);

if (mysqli_stmt_execute($stmt)) {
  echo "Email inserted successfully!";

  // Retrieve the inserted record
  $sql = "SELECT * FROM emails WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<br>Created at: " . $row['created_at']; // Check the value here
  } else {
    echo "<br>Error: Could not retrieve inserted record.";
  }
} else {
  echo "Error: Could not insert email.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
