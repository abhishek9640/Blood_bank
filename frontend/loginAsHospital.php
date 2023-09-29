<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
  <div>
    <a href="index.php"><button type="submit" class="btn btn-primary">Back</button></a>
  </div>
  <div class="container mt-5">
    <h2>Login As Hospital</h2>
    <!-- Form for login -->
    <form action="../loginAsHosAction.php" method="POST">
      <div class="form-group">
        <label for="loginEmail">Username</label>
        <input type="text" class="form-control" id="loginUsername" name="username" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="loginPassword">Password</label>
        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
