<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available Blood Samples</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
      body {
      background-color: #f8f9fa;
    }

    .container {
      padding: 50px;
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .card-title {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .card-text {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .btn-request {
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 5px;
    }

    .btn-request:hover {
      background-color: #218838;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="text-center mb-5">Available Blood Samples</h1>

    <?php
    // Database connection details
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "blood_bank";

    // Create a connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check the connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch blood sample information
    $sql = "SELECT `SampleID`, `HospitalID`, `BloodGroup`, `Quantity` FROM `bloodsample`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output data of each row
      while ($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Blood Group: ' . $row["BloodGroup"] . '</h5>';
        echo '<p class="card-text">Hospital ID: ' . $row["HospitalID"] . '</p>';
        echo '<p class="card-text">Quantity: ' . $row["Quantity"] . '</p>';
        echo '<button class="btn btn-request">Request Sample <i class="fas fa-arrow-circle-right"></i></button>';
        echo '</div>';
        echo '</div>';
      }
    } else {
      echo "No available blood samples.";
    }

    // Close the database connection
    $conn->close();
    ?>

  </div>

  <!-- Add Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
