<?php
include "../config/connection.php";

session_start();
if (isset($_SESSION['admin_name'])) {
    header('location:../admin_dashboard.php');
} else {
    //Paste login page code here
}

if (!empty($_POST['submit'])) {
    $imgp = mysqli_real_escape_string($con, $_POST['imgp']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = " SELECT * FROM user_form LEFT JOIN user_type USING(idt) WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['type'] == 'admin') {

            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['admin_imgp'] = $row['imgp'];
            header('location:../admin_dashboard.php');

        } else if ($row['type'] == 'user') {

            $_SESSION['user_name'] = $row['name'];
            header('location:../user_page.php');
        }

    } else {
        $error[] = 'Email atau Password yang Anda masukkan salah!';

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
    <title>Form Login</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="assets_auth/css/style2.css">
    <style>

    </style>
</head>

<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Form Login</h3>
            <?php
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' . $error . '</span>';
                }
                ;
            }
            ;
            ?>
            <input type="hidden" name="imgp">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="hidden" name="name" placeholder="enter your password">
            <input type="hidden" name="cpassword" placeholder="enter your password">
            <input type="hidden" name="user_type" placeholder="enter your password">
            <input type="submit" name="submit" value="login" class="form-btn">
        </form>
    </div>
</body>

</html>