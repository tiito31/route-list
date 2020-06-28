<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <div class="card text-center">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="navbar-collapse justify-content-md-center collapse show" id="navbar01">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown08">
                                <a href="./ams_ix.php" class="dropdown-item">AMS-IX</a>
                                <a href="./paix.php" class="dropdown-item">PAIX</a>
                                <a href="./equinix.php" class="dropdown-item">EQUINIX</a>
                                <a href="./myix.php" class="dropdown-item">MyIX</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../list.php">List</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="card-header">
                <br>
                <h5 class="text-center">Form Input</h5>
            </div>
            <div class="card-body">
                <?php
                include '../conn/connection.php';
                $data = mysqli_query($koneksi,'select community from myix order by community DESC limit 1');
                while($d = mysqli_fetch_array($data)){
                ?>
                <form action="../actions/myix.php" method="POST" style="text-align: center;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <!-- Input Name -->
                                <label for=""> Name </label>
                                <input type="text" name="nm" class="form-control" placeholder="Masukkan Nama" required="required">
                            </div>
                            <div class="col">
                                <!-- Input as_number -->
                                <label for=""> As number </label>
                                <input type="text" name="as_nm" class="form-control" placeholder="Masukkan Nomor" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <!-- Input Ip address 1 -->
                                <label for=""> IP Address 1</label>
                                <input type="text" name="ipaddr1" class="form-control" placeholder="Masukkan Ip address" class="for-control" required="required">
                            </div>
                            <div class="col">
                                <!-- Input Ip address 2 -->
                                <!-- <label for=""> IP Address 2</label> -->
                                <!-- <input type="text" name="ipaddr2" class="form-control" placeholder="Masukkan Ip address" class="for-control" required="required"> -->

                                <!-- Checkbox for IPv6; -->
                                <input type="checkbox" class="" name="ipv" id="yourBox">
                                <label for="yourBox" class=""> Add IPv6 </label>
                                <!-- Input IPv6; -->
                                <input type="text" name="ipaddrv6" class="form-control" id="yourText" placeholder="Masukkan IPv6 Address" class="for-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Input community -->
                        <label for="" > Community </label>
                            <!--Convert string to number  -->
                        <input type="text" name="com" class="form-control" value="<?php echo substr($d['community'],0,5).':'.strval((int)(substr($d['community'],6))+1); ?>" readonly>
                    </div>
                    <!-- Button submit -->
                    <button type="submit" name="submit" class="btn btn-sm btn-primary btn-btn-block"> Submit! </button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
    <script>
        document.getElementById('yourBox').onchange = function() {
            document.getElementById('yourText').disabled = !this.checked;
        };
    </script>
</body>
</html>