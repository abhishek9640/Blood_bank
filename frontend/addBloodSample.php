<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Blood Info</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
<a href="hospitalDashboard.php"><button type="submit" class="btn btn-primary">Back</button></a>
  <div class="container mt-5">
    <h2>Add Blood Info</h2>
    <!-- Form to add blood sample details -->
    <form action="../process_blood_info.php" method="POST">
      <div class="form-group">
        <label for="bloodGroup">Blood Group</label>
        <input type="text" class="form-control" id="bloodGroup" name="bloodGroup" placeholder="Enter blood group"
          required>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" required>
      </div>
      <button type="submit" class="btn btn-primary">Add Blood Info</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>