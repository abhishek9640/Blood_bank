<?php
session_start();

// Database connection details
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "Blood_bank";

// Function to check if a receiver is eligible to request a blood sample
function isReceiverEligible($conn, $receiverID)
{
    // Retrieve the receiver's registered blood group
    $receiverBloodGroupQuery = "SELECT BloodGroup FROM Receivers WHERE ReceiverID = '$receiverID'";
    $receiverBloodGroupResult = $conn->query($receiverBloodGroupQuery);

    if ($receiverBloodGroupResult && $receiverBloodGroupResult->num_rows === 1) {
        $receiverBloodGroupRow = $receiverBloodGroupResult->fetch_assoc();
        $receiverBloodGroup = $receiverBloodGroupRow['BloodGroup'];

        // Check if the receiver's registered blood group matches the available blood group
        $availableBloodGroupQuery = "SELECT BloodGroup FROM BloodSample WHERE BloodGroup = '$receiverBloodGroup'";
        $availableBloodGroupResult = $conn->query($availableBloodGroupQuery);

        if ($availableBloodGroupResult && $availableBloodGroupResult->num_rows === 1) {
            $availableBloodGroupRow = $availableBloodGroupResult->fetch_assoc();
            $availableBloodGroup = $availableBloodGroupRow['BloodGroup'];

            // Check if the receiver is eligible based on the blood group
            return ($receiverBloodGroup === $availableBloodGroup);
        }
    }

    return false; // If any error or blood group doesn't match
}

// Check if the user is logged in as a receiver
if (isset($_SESSION['ReceiverID'])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // $sampleID = 4;
        $receiverID = $_SESSION['ReceiverID'];
        // Create a connection
        $conn = new mysqli($servername, $db_username, $db_password, $database);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // SQL query to retrieve the blood group
        $sql = "SELECT BloodSample.SampleID
            FROM BloodSample
            INNER JOIN Receivers
            ON BloodSample.BloodGroup = Receivers.BloodGroup
            WHERE Receivers.ReceiverID = '$receiverID'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $sampleID = $row["SampleID"];
            // echo "Blood Group for Receiver ID $receiverID: $bloodGroup";
        }

        // Check if the receiver is eligible to request a blood sample
        if (isReceiverEligible($conn, $_SESSION['ReceiverID'])) {
            // Insert the request into the Requests table
            $sql = "INSERT INTO Requests (ReceiverID, SampleID, RequestDate, Status)
                    VALUES ('{$_SESSION['ReceiverID']}', '$sampleID', NOW(), 'Pending')";

            if ($conn->query($sql) === TRUE) {
                echo "Blood sample request sent successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "You are not eligible to request this blood group.";
        }

        // Close the database connection
        $conn->close();
    }
} else {
    // Redirect if the user is not logged in
    header("Location: frontend/loginAsReciever.php");
    exit();
}
?>