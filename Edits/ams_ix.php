<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>

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
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#"" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown08">
                                <a href="forms/ams_ix.php" class="dropdown-item">AMS-IX</a>
                                <a href="forms/paix.php" class="dropdown-item">PAIX</a>
                                <a href="forms/equinix.php" class="dropdown-item">EQUINIX</a>
                                <a href="forms/myix.php" class="dropdown-item">MyIX</a>
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
                <h5 class="text-center">Form Input</h5>
            </div>
            <div class="card-body">
                <?php
                include 'conn/connection.php';
                $id = $_GET['id'];
                $table = $_GET['ix_name'];
                $data = mysqli_query($koneksi,"select * from ".$table." where id ='$id' ");
                while($d = mysqli_fetch_array($data)){
                ?>
                <form action="actions/update.php" method="POST" style="text-align: center;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <!-- Input Name -->
                                <label for=""> Name </label>
                                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                                <input type="text" name="nm" class="form-control" value="<?php echo $d['name']; ?>">
                            </div>
                            <div class="col">
                                <!-- Input as_number -->
                                <label for=""> As number </label>
                                <input type="text" name="as_nm" class="form-control" value="<?php echo $d['as_number']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <!-- Input Ip address 1 -->
                                <label for=""> IP Address 1</label>
                                <input type="text" name="ipaddr1" class="form-control" value="<?php echo $d['ip_peering']; ?>">
                            </div>
                            <div class="col">
                                <!-- Input Ip address 2 -->
                                <label for=""> IP Address 2</label>
                                <input type="text" name="ipaddr2" class="form-control" value="<?php echo $d['ip_peering_2']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <!-- Checkbox for IPv6; -->
                            <input type="checkbox" class="form-check-input" name="ipv" id="yourBox">
                            <label for="yourBox" class="form-check-label"> Add IPv6 </label>
                            <!-- Input IPv6; -->
                            <input type="text" name="ipaddrv6" id="yourText" class="form-control" value="<?php echo $d['ipv6_peering']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Input community -->
                        <label for="" > Community </label>
                            <!--Convert string to number  -->
                            <input type="hidden" name="ix" value="<?php echo $d['ix_name']; ?>">
                            <input type="text" name="com" class="form-control" value="<?php echo $d['community']; ?>" readonly>
                    </div>
                        <!-- Button submit -->
                        <button type="submit" name="submit" class="btn btn-sm btn-primary btn-btn-block"> Simpan </button>
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