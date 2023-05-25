<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    ini_set('SMTP', "server.com");
    ini_set('smtp_port', "25");
    ini_set('sendmail_from', "email@domain.com");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Configure the email settings
    $to = 'tuffy2113@gmail.com'; // Replace with your email address
    $subject = 'New Message from Contact Form';
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $content = "Name: $name Email: $email Message: $message";

    var_dump($content);
    // Send the email
    $success = mail($to, $subject, $content, $headers);

    if ($success) {
        // Return a success response
        echo json_encode(['status' => 'success', 'message' => 'Message sent successfully']);
    } else {
        // Return an error response
        echo json_encode(['status' => 'error', 'message' => 'Failed to send message']);
    }
}
