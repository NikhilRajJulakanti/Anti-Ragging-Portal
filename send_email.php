<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

function sendEmail($name, $email, $complaint) {
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'antiragging59@gmail.com';  // Your Gmail address
        $mail->Password = 'runo bkbq plve hnqt';  // App password from Gmail
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;  // SMTP port

        // Sender and recipient settings
        $mail->setFrom('antiragging59@gmail.com', 'Anti-Ragging Support');
        $mail->addAddress($email);  // Recipient's email address

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Complaint Submitted Successfully';
        $mail->Body = "Dear $name,<br><br>Your complaint has been successfully submitted.<br><br>Complaint Details:<br>$complaint";

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        // Return false if email fails
        return false;
    }
}
?>