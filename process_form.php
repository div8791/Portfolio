<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace 'your_email@example.com' with your actual email address.
    $to = "div8791@gmail.com";
    $subject = "New Message from Contact Form";
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $message = $_POST["Message"];

    // Email headers
    $headers = "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Compose the email body
    $email_body = "
    <html>
    <body>
        <h2>New Message from Contact Form</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
    </body>
    </html>";

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        // Redirect the user back to the form after successful submission
        header("Location: contact_form.html?status=success");
    } else {
        // Redirect the user back to the form if there was an error
        header("Location: contact_form.html?status=error");
    }
} else {
    // Redirect the user back to the form if accessed directly without form submission
    header("Location: contact_form.html");
}
?>
