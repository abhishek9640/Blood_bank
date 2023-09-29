<?php
session_start();

// Check if the user is logged in as a hospital
if (!isset($_SESSION['HospitalID'])) {
    header("Location: frontend/hospitalDashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the submitted blood group and quantity
    $bloodGroup = $_POST['bloodGroup'];
    $quantity = $_POST['quantity'];

    // Retrieve the hospital ID from the session
    $HospitalID = $_SESSION['HospitalID'];

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

    // Check if the blood group already exists
    $checkQuery = "SELECT * FROM bloodsample WHERE HospitalID = '$HospitalID' AND bloodGroup = '$bloodGroup'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Blood group already exists, update the quantity
        $row = $checkResult->fetch_assoc();
        $newQuantity = $row['Quantity'] + $quantity;

        // Update the quantity
        $updateQuery = "UPDATE bloodsample SET Quantity = '$newQuantity' WHERE HospitalID = '$HospitalID' AND bloodGroup = '$bloodGroup'";
        if ($conn->query($updateQuery) === TRUE) {
            echo "<script>alert('Quantity updated for blood group: $bloodGroup.'); window.history.back();</script>";
        } else {
            echo "Error updating quantity: " . $conn->error;
        }
    } else {
        // Blood group doesn't exist, insert a new record
        $insertQuery = "INSERT INTO bloodsample (HospitalID, bloodGroup, Quantity) VALUES ('$HospitalID', '$bloodGroup', '$quantity')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Blood sample details added successfully.'); window.history.back();</script>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>
