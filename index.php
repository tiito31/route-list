<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <div class="card text-center">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="navbar-collapse justify-content-md-center collapse show" id="navbar01">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown08">
                                <a href="forms/form_ams_ix.php" class="dropdown-item">AMS-IX</a>
                                <a href="forms/form_paix.php" class="dropdown-item">PAIX</a>
                                <a href="forms/form_equinix.php" class="dropdown-item">EQUINIX</a>
                                <a href="forms/form_myix.php" class="dropdown-item">MyIX</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list.php">List</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="card-header">
                <br>
                <h4 class="text-center">Welcome</h4>
            </div>
            <!-- <div class="card-body"></div> -->
        </div>
    </div>
</body>
</html>