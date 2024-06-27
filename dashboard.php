<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS (optional) -->
    <link href="style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Online Library Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">DASHBOARD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CATEGORIES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">AUTHORS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view_books.php">BOOKS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ISSUE BOOKS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">REG STUDENTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CHANGE PASSWORD</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger text-white" href="#">LOG ME OUT</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Admin Dashboard</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">9</h3>
                    <p class="card-text"><a href="view_books.php" class="text-dark">Books Listed</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">2</h3>
                    <p class="card-text">Books Not Returned Yet</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">6</h3>
                    <p class="card-text">Registered Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">11</h3>
                    <p class="card-text">Authors Listed</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">6</h3>
                    <p class="card-text">Listed Categories</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
