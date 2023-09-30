<?php
session_start();

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

// Check if the user is logged in as a hospital
if (!isset($_SESSION['HospitalID'])) {
    header("Location: frontend/hospitalDashboard.php");
    exit();
}

// Retrieve hospital ID from session
$hospitalID = $_SESSION['HospitalID'];

// SQL query to fetch request data
$sql = "SELECT * FROM Requests WHERE SampleID IN (SELECT SampleID FROM bloodsample WHERE HospitalID = '$hospitalID')";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Requests</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">View Requests</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Receiver ID</th>
                    <th>Sample ID</th>
                    <th>Request Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['RequestID'] . "</td>";
                        echo "<td>" . $row['ReceiverID'] . "</td>";
                        echo "<td>" . $row['SampleID'] . "</td>";
                        echo "<td>" . $row['RequestDate'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No requests found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
