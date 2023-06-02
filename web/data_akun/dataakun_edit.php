<?php

include "./config/connection.php";

$id = isset($_GET['id']) ? $_GET['id'] : "";
$id = mysqli_real_escape_string($con, $id);
$sql = "SELECT * FROM user_form WHERE id ='$id'";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="./auth/assets_auth/css/style2.css">
</head>

<body>
    <div class="form-container">
        <form action="./web/data_akun/dataakun_update.php" method="post" enctype="multipart/form-data">
            <h3>Form Registrasi</h3>
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            ?>
            <input type="file" class="form-control" name="imgp">
            <input type="text" value="<?= $data['name']; ?>" name="name" placeholder="enter your name">
            <input type="email" value="<?= $data['email']; ?>" name="email" placeholder="enter your email">
            <input type="password" value="" name="password">
            <select name="idt">
                <label>Nama Kategori:</label>
                <?php
                $qry = mysqli_query($con, "SELECT * FROM user_type");
                while ($row = mysqli_fetch_array($qry)) {
                    $check = "";
                    if ($data['idt'] == $row['idt']) {
                        $check = "selected";
                    }
                    echo "<option $check value='$row[idt]'>$row[type]</option>";
                }
                ?>
            </select>
            
            <input type="submit" name="edit" value="EDIT" class="form-btn">
        </form>
    </div>
</body>

</html>