<?php
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
    $sql = "SELECT HospitalID FROM hospital WHERE username='$username' AND password='$password'";  // Assuming HospitalID is the column to retrieve
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Successful login
        $row = $result->fetch_assoc();
        $hospitalID = $row['HospitalID'];
        
        // Set HospitalID in the session
        session_start();
        $_SESSION['HospitalID'] = $hospitalID;

        // Redirect to the hospital's dashboard or any other page
        header("Location: frontend/hospitalDashboard.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }

    // Close the database connection
    $conn->close();
}
?>
