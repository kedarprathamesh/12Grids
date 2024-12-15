<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $contact = htmlspecialchars($_POST['contact']);
    $city = htmlspecialchars($_POST['city']);
    $message = htmlspecialchars($_POST['message']);
    if (!isset($_POST['notRobot'])) {
        echo "Please confirm that you are not a robot.";
        exit;
    }
    $to = "your-email@example.com"; 
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nContact: $contact\nCity: $city\nMessage:\n$message";
    $headers = "From: no-reply@example.com";
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you, $name! Your message has been sent successfully.";
    } else {
        echo "Sorry, there was an issue sending your message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
