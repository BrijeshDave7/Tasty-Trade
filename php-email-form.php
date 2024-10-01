<?php
// Define recipient email address
$recipient_email = "your_email@example.com";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate data (optional, add your own validation logic)
  if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo "Error: All fields are required.";
    return;
  }

  // Prepare email content
  $body = "Name: $name\n";
  $body .= "Email: $email\n";
  $body .= "Subject: $subject\n";
  $body .= "Message: $message\n";

  // Send email using PHP mail function (replace with your preferred method)
  if (mail($recipient_email, $subject, $body)) {
    echo "Message sent successfully!";
  } else {
    echo "Error: Could not send message.";
  }
} else {
  echo "Invalid request method.";
}
?>
