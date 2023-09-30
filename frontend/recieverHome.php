<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
            text-align: center;
        }
        .btn-request-sample {
            background-color: #dc3545;
            color: white;
            font-weight: bold;
            padding: 15px 30px;
            font-size: 1.5rem;
            border-radius: 10px;
            margin-top: 20px;
        }
        .btn-request-sample:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <form action="../logoutAsRecAction.php" method="POST">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    <h1>Welcome to Blood Bank</h1>
    <form action="../requestSampleAction.php" method='post'>
        <button class="btn btn-request-sample">Request Blood Sample</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
