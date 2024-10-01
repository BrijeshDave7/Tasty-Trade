<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set up template parameters
    $templateParams = array(
        "subject_html" => $subject,
        "from_name" => $name,
        "message_html" => $message,
        "reply_to" => $email
    );

    // Send email using EmailJS
    $emailJS_response = emailjs_send("service_5ygef8h", "template_8wwggog", $templateParams);

    if ($emailJS_response["status"] == 200) {
        // Email sent successfully
        echo json_encode(array("status" => "success", "message" => "Email sent successfully!"));
    } else {
        // Failed to send email
        echo json_encode(array("status" => "error", "message" => "Failed to send email. Please try again."));
    }
}
?>
