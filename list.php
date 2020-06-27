<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data</title>

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
                        <li class="nav-item active">
                            <a class="nav-link" href="list.php">List</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="card-header">
                <br>
                <h5 class="text-center">Form Input</h5>
            </div>
            <br>
            <div class="search-box">
                <?php
                include 'conn/connection.php';
                $sql = "SELECT * FROM ix_list";
                $res = mysqli_query($koneksi,$sql);
                $rows = array();
                while($row = mysqli_fetch_array($res, MYSQLI_ASSOC))
                $rows[] = $row;
                {
                ?>
                <form action="" method="post">
                    <select name="ix" id="exChange">
                        <option value="" selected="selected"> Select Internet Exchange </option>
                        <?php
                        if (isset($rows)) {
                            foreach ($rows as $key => $value) {
                                # code...
                                echo "<option value='" . $value['ix_name'] . "'>" . $value["ix_desc"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <button type="submit" id="Filter">Search</button>
                </form>
                <?php } ?>
            </div>
            <br>
            <div class=" card-body table-responsive">
                <?php
                if (isset($_POST['ix'])) {
                ?>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">IP Address 1</th>
                            <th scope="col">IP Address 2</th>
                            <th scope="col">IPv6 Address</th>
                            <th scope="col">As Number</th>
                            <th scope="col">Community</th>
                            <th scope="col">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $selectOption = $_POST['ix'];
                    if ($selectOption == 'ams_ix') {
                        $query = "SELECT * FROM ams_ix";
                    } elseif ($selectOption == 'paix') {
                        $query = "SELECT * FROM paix";
                    } elseif ($selectOption == 'equinix sydney') {
                        $query = "SELECT * FROM equinix";
                    } elseif ($selectOption == 'myix') {
                        $query = "SELECT * FROM myix";
                    }
                    $no = 1;
                    $data = mysqli_query($koneksi,$query);
                    while($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo $d['ip_peering']; ?></td>
                            <td><?php echo $d['ip_peering_2']; ?></td>
                            <td><?php echo $d['ipv6_peering']; ?></td>
                            <td><?php echo $d['as_number']; ?></td>
                            <td><?php echo $d['community']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                                <a href="actions/download.php?id=<?php echo $d['id']; ?>">DOWNLOAD</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <?php } mysqli_close($koneksi); ?>
            </div>
            <!-- <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">IP Address 1</th>
                            <th scope="col">IP Address 2</th>
                            <th scope="col">IPv6 Address</th>
                            <th scope="col">As Number</th>
                            <th scope="col">Community</th>
                            <th scope="col">OPSI</th>
                        </tr>
                    </thead>
                    <?php
                    include 'conn/connection.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from ams_ix");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['name']; ?></td>
                            <td><?php echo $d['ip_peering']; ?></td>
                            <td><?php echo $d['ip_peering_2']; ?></td>
                            <td><?php echo $d['ipv6_peering']; ?></td>
                            <td><?php echo $d['as_number']; ?></td>
                            <td><?php echo $d['community']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                                <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div> -->
        </div>
    </div>
</body>
</html>