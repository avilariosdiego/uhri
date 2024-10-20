<?php
// Replace with your actual email settings
$sender_email = 'your_email@example.com';
$sender_name = 'Your Name';
$recipient_email = 'recipient_email@example.com';

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Create email subject and body
$subject = 'New Contact Form Submission';
$body = "Name: $name\nEmail: $email\nMessage:\n$message";

// Send email using PHPMailer (or your preferred method)
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'your_smtp_host'; // Replace with your SMTP host
$mail->Port = 587; // Replace with your SMTP port
$mail->Username = 'your_email@example.com'; // Replace with your email address
$mail->Password = 'your_email_password'; // Replace with your email password
$mail->setFrom($sender_email, $sender_name);
$mail->addAddress($recipient_email);
$mail->Subject = $subject;
$mail->Body = $body;

if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent successfully.';
}
?>