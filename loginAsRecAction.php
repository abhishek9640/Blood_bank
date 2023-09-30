<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted username and password
    $username = $_POST['username'];  
    $password = $_POST['password'];  

    // Database connection details
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "Blood_bank";

    // Create a connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM receivers WHERE username='$username' AND password='$password'"; 
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $ReceiverID = $row['ReceiverID'];
        // Successful login
        $_SESSION['ReceiverID'] = $ReceiverID;
        $_SESSION['role'] = 'receiver';
        echo "Login successful. Redirecting to dashboard...";
        // You can redirect to the reciever's dashboard or any other page
        header("Location: frontend/recieverHome.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }

    // Close the database connection
    $conn->close();
}
?>
