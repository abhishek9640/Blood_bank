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
    $receiverName = $_POST['receiverName'];
    $receiverBloodGroup = $_POST['receiverBloodGroup'];
    $receiverUsername = $_POST['receiverUsername'];
    $receiverPassword = $_POST['receiverPassword'];

    $sql = "INSERT INTO receivers (name, BloodGroup, username, password) VALUES ('$receiverName', '$receiverBloodGroup', '$receiverUsername', '$receiverPassword')";

    //  `Name`, `BloodGroup`, `Username`, `Password`

    if ($conn->query($sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
