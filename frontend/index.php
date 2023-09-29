<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Bank Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      padding-top: 100px;
    }
    .btn-container {
      display: flex;
      justify-content: center;
    }
    .btn-container .btn {
      margin: 10px;
    }
  </style>
</head>

<body>
  <div class="container text-center">
    <h1 class="mb-4">Welcome to the Blood Bank</h1>
    <div class="btn-container">
      <a href="loginAsReciever.php" class="btn btn-primary btn-lg">Login As Reciever</a>
      <a href="loginAsHospital.php" class="btn btn-primary btn-lg">Login As Hospital</a>
    </div>
    <div class="btn-container">
      <a href="register_hospital.php" class="btn btn-success btn-lg">Register as Hospital</a>
      <a href="register_receiver.php" class="btn btn-success btn-lg">Register as Receiver</a>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
