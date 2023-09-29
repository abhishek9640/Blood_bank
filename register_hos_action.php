<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['register'])) {
    $receiverName = $_POST['hospitalname'];
    $receiverUsername = $_POST['hospitalusername'];
    $receiverPassword = $_POST['hospitalpassword'];

    $sql = "INSERT INTO hospital (name, username, password) VALUES ('$receiverName', '$receiverUsername', '$receiverPassword')";


    if ($conn->query($sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
