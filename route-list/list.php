<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data!</title>

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body class="login">
    <div class="container">
        <div class="card">
            <div class="text-center">
                <tr>
                    <td><a href="index.php">Home</a></td>
                    <td><a href="form.php">Form</td>
                    <td><a href="list.php">List</td>
                </tr>
            </div>
            <div class="tab-content">
                <div class="tab-pane active">
                    <br>
                    <h4 class="text-center">List Data!</h4>
                    <br>
                    <table border="1" align="center">
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Ip Address</th>
                            <th>As number</th>
                            <th>Community</th>
                            <!-- <th>OPSI</th> -->
                        </tr>
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
                                <td><?php echo $d['as_number']; ?></td>
                                <td><?php echo $d['community']; ?></td>
                                <!-- <td>
                                    <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
                                    <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
                                </td> -->
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>