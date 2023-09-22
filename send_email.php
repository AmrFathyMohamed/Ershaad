<?php
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$to = $_POST['email']; // Get the email address from the request
$subject = "Password Reset";
$randomPassword = $_POST['randomPassword']; // Generate a random password
$message = "Your new password is: " . $randomPassword;
$senderEmail = "e0802676@gmail.com"; // Set the sender's email address

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output for testing (set to 2 for more details)
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to Gmail's server
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'e0802676@gmail.com'; // Your Gmail username
    $mail->Password = 'Ershad2023@@'; // Your Gmail password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption; 'ssl' also accepted
    $mail->Port = 587; // TCP port to connect to, use 465 for 'ssl', 587 for 'tls'

    //Recipients
    $mail->setFrom($senderEmail);
    $mail->addAddress($to); // Add recipient

    //Content
    $mail->isHTML(false); // Set email format to plain text
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    $mail->send();
    echo "Email sent successfully";
} catch (Exception $e) {
    echo "Email sending failed. Error: {$e->getMessage()}"; // Changed to get the error message
}

?>
