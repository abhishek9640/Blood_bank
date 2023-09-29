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
    <h2>Register as Hospital</h2>
    <!-- Form for receiver registration -->
    <form action="../register_hos_action.php" method="post">
      <div class="form-group">
        <label for="hospitalname">Name</label>
        <input type="text" class="form-control" id="hospitalname" name="hospitalname" placeholder="Enter full name" required>
      </div>
      <div class="form-group">
        <label for="hospitalusername">Username</label>
        <input type="text" class="form-control" id="hospitalusername" name="hospitalusername" placeholder="Enter username" required>
      </div>
      <div class="form-group">
        <label for="hospitalpassword">Password</label>
        <input type="password" class="form-control" id="hospitalpassword" name="hospitalpassword" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-success" name="register">Register</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
