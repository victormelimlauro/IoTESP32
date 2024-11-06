<?php
$servername = "localhost";
$username = "door_user";
$password = "password";
$dbname = "door_status";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle ESP32 requests
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $door_status = $_POST["door_status"];
    $user_id = $_POST["user_id"];

    // Insert data into MySQL database
    $sql = "INSERT INTO door_status (door_status, user_id) VALUES ('$door_status', '$user_id')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>