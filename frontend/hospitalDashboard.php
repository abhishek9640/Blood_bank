<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .navbar-brand {
            font-size: 24px;
        }
        .content {
            margin-top: 50px;
            text-align: center;
        }
        .content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        .btn {
            margin: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Blood Bank System</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="../logoutAsHosAction.php" method="POST">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <h1>Welcome to the Hospital's Blood Bank System</h1>
        <a href="addBloodSample.php" class="btn btn-primary">Add Blood Sample</a>
        <a href="viewRequestHos.php" class="btn btn-primary">View Request</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
