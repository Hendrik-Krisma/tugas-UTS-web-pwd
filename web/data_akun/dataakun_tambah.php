<?php

include "./config/connection.php";

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['submit'])) {

    $idt = mysqli_real_escape_string($con, $_POST['idt']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $imgp = "";
    $foto_cek = $_FILES['imgp']['name'];
    if (!empty($foto_cek)) {
        $folder = "./auth/assets_auth/images/inserted_img";
        $tmp_name = $_FILES["imgp"]["tmp_name"];
        $cek = explode(".", $foto_cek);
        $ext = end($cek);
        $names = md5(date("YmdHis")) . ".$ext";
        move_uploaded_file($tmp_name, "$folder/$names");
        $imgp = $names;
    }

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'User sudah terdaftar!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Password tidak sama!';
        } else {
            $insert = "INSERT INTO user_form(idt, imgp, name, email, password) VALUES ('$idt','$imgp','$name','$email','$pass')";
            mysqli_query($con, $insert);
            $url = "./admin_dashboard.php?section=data_akun";
            $pesan = "Data akun berhasil disimpan";

            echo "<script>alert('$pesan'); location='$url';</script>";
        }
    }
}
;
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
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Form Registrasi</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            ?>
            <input type="file" class="form-control" required placeholder="Masukkan Foto Anda" name="imgp">
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <select name="idt">
                <?php
                $qry = mysqli_query($con, "SELECT * FROM user_type ");
                while ($row = mysqli_fetch_array($qry)) {
                    echo "<option value='$row[idt]'>$row[type]</option>";
                }
                ?>
            </select>
            <input type="submit" name="submit" value="daftar" class="form-btn">
            <!-- <p>Sudah punya akun? <a href="login_form.php">Login sekarang</a></p> -->
        </form>
    </div>
</body>

</html>