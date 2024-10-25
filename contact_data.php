<?php
function insertData($name, $email, $subject, $message) {
    $host = "localhost";
    $dbname = "form_contacts";
    $username = "root";
    $password = "";
    
    // Create a new database connection
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Check for connection errors
    if ($conn->connect_error) {
        return false; // Connection failed
    }
    
    // Prepare the SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO contacted (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    
    // Execute the statement and check for errors
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true; // Data inserted successfully
    } else {
        $stmt->close();
        $conn->close();
        return false; // Data insertion failed
    }
}
?>
