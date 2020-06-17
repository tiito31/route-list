<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>

    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
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
                <div class="tab-pane active center-block">
                    <h6 class="text-center">Form Input</h6>
                    <form action="conn/action.php" method="POST" style="text-align: center;">
                        <div class="form-group input-field-border-bottom">
                            <!-- Input Name -->
                            <label for=""> Name </label>
                            <input type="text" name="nm" placeholder="Masukkan Nama">
                            <!-- Input as_number -->
                            <label for=""> As number </label>
                            <input type="text" name="as-nm" placeholder="Masukkan Nomor">
                            <!-- Input Ip address -->
                            <label for=""> IP Address </label>
                            <input type="text" name="ipaddr" placeholder="Masukkan Ip address" class="for-control" required="required">
                            <!-- Input Description -->
                            <label for="" > Description </label>
                            <textarea name="desc" id="" cols="30" rows="5" placeholder="Masukkan deskripsi"></textarea>
                            <!-- Input community -->
                            <label for="" > Community </label>
                            <input type="text" name="com" class="form-control" disabled>
                            <!-- Button submit -->
                            <button type="submit" name="submit" class="btn btn-sm btn-primary btn-btn-block"> Submit! </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>