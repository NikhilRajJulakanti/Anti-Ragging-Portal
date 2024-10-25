<?php
// Include the necessary files
require 'contact_data.php';
require 'contact_email.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert data into the database
    $dataInserted = insertData($name, $email, $subject, $message);

    if ($dataInserted) {
        // Data inserted successfully, now send the email
        $emailSent = sendEmail($name, $email, $message);

        if ($emailSent) {
            echo "<script>alert('Data saved and email sent successfully!');</script>";
        } else {
            echo "<script>alert('Data saved, but email sending failed.');</script>";
        }
    } else {
        // Data insertion failed
        echo "<script>alert('Error saving data. Please try again.');</script>";
    }
}
?>
