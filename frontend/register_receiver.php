<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register as Receiver</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div>
    <a href="index.php"><button type="submit" class="btn btn-primary">Back</button></a>
    </div>
  <div class="container mt-5">
    <h2>Register as Receiver</h2>
    <!-- Form for receiver registration -->
    <form action="../register_rec_action.php" method="post">
      <div class="form-group">
        <label for="receiverName">Name</label>
        <input type="text" class="form-control" id="receiverName" name="receiverName" placeholder="Enter full name" required>
      </div>
      <div class="form-group">
        <label for="receiverBloodGroup">Blood Group</label>
        <input type="text" class="form-control" id="receiverBloodGroup" name="receiverBloodGroup" placeholder="Enter blood group" required>
      </div>
      <div class="form-group">
        <label for="receiverUsername">Username</label>
        <input type="text" class="form-control" id="receiverUsername" name="receiverUsername" placeholder="Enter username" required>
      </div>
      <div class="form-group">
        <label for="receiverPassword">Password</label>
        <input type="password" class="form-control" id="receiverPassword" name="receiverPassword" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-success" name="register">Register</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
