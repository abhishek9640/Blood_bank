<?php
session_start();

// Check if the user is logged in as a receiver
if (!isset($_SESSION['ReceiverID'])) {
    header("Location: frontend/receiverHome.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected blood sample ID
    $sampleID = $_POST['sampleID'];

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

    // Retrieve the receiver ID from the session
    $receiverID = $_SESSION['ReceiverID'];

    // Retrieve the SampleID from the BloodSample table based on the selected blood sample
    $retrieveSampleIDQuery = "SELECT SampleID FROM BloodSample WHERE SampleID = '$sampleID'";
    $result = $conn->query($retrieveSampleIDQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $sampleID = $row['SampleID'];

        // SQL query to insert the request into the Requests table
        $sql = "INSERT INTO Requests (ReceiverID, SampleID, RequestDate, Status)
                VALUES ('$receiverID', '$sampleID', NOW(), 'Pending')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Blood sample request sent successfully.'); window.history.back();</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid blood sample ID.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
