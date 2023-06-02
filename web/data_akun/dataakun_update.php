<?php

include "../../config/connection.php";

$id = mysqli_real_escape_string($con, $_POST['id']);
$idt = mysqli_real_escape_string($con, $_POST['idt']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
// $pass = md5($_POST['password']);

if (empty($_POST['password'])) {
    $sql = "UPDATE user_form SET idt= '$idt', name = '$name', email = '$email'  WHERE user_form.id = '$id' ";
    
} else {
    $pass = md5($_POST['password']);
    $sql = "UPDATE user_form SET idt= '$idt', name = '$name', email = '$email', password= '$pass' WHERE user_form.id = '$id' ";
}
mysqli_query($con, $sql);

// $sql = "UPDATE user_form SET idt= '$idt', name = '$name', email = '$email', password= '$pass' WHERE user_form.id = '$id' ";
// mysqli_query($con, $sql);

$foto_cek = $_FILES['imgp']['name'];
if (!empty($foto_cek)) {
    $folder = "../../auth/assets_auth/images/inserted_img";
    $tmp_name = $_FILES["imgp"]["tmp_name"];
    $cek = explode(".", $foto_cek);
    $ext = end($cek);
    $names = md5(date("YmdHis")) . ".$ext";
    move_uploaded_file($tmp_name, "$folder/$names");
    $imgp = $names;

    $qry = mysqli_query($con, "SELECT * FROM user_form where id = '$id'");
    $row = mysqli_fetch_array($qry);

    if (!empty($row['imgp'])) {
        unlink("../../auth/assets_auth/images/inserted_img/$row[imgp]"); //function untuk menghapus file
    }
    //mengupdate imgp baru
    $sql = "UPDATE user_form SET imgp ='$imgp' WHERE id='$id'";
    mysqli_query($con, $sql);
}

$url = "../../admin_dashboard.php?section=data_akun";
$pesan = "Data berhasil diubah";

echo "<script>alert('$pesan'); location='$url';</script>";
