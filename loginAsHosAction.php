<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted username and password
    $username = $_POST['username'];  // Update to the correct form field name
    $password = $_POST['password'];  // Update to the correct form field name

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
    $sql = "SELECT * FROM hospitals WHERE username='$username' AND password='$password'";  // Updated column names
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login
        echo "Login successful. Redirecting to dashboard...";
        // You can redirect to the hospital's dashboard or any other page
        header("Location: frontend/hospitalHome.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }

    // Close the database connection
    $conn->close();
}
?>
