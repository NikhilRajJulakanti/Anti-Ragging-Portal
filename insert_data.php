<?php
function insertData($name, $email, $college, $complaint) {
    $host = "localhost";
    $dbname = "form_data";
    $username = "root";
    $password = "";
    
    // Create a new database connection
    $conn = new mysqli($host, $username, $password, $dbname);
    
    // Check for connection errors
    if ($conn->connect_error) {
        return false; // Connection failed
    }
    
    // Prepare the SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO submissions (name, email, college, complaint) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $college, $complaint);
    
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
