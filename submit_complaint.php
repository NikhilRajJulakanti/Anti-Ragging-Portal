<?php
// Include the necessary files
require 'insert_data.php';
require 'send_email.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $college = $_POST['college'];
    $complaint = $_POST['complaint'];

    // Insert data into the database
    $dataInserted = insertData($name, $email, $college, $complaint);

    if ($dataInserted) {
        // Data inserted successfully, now send the email
        $emailSent = sendEmail($name, $email, $complaint);

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
