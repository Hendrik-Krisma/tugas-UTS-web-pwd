<?php
include "../../config/connection.php";


$id = mysqli_real_escape_string($con, $_GET['id']);

$qry = mysqli_query($con, "SELECT * FROM user_form where id = '$id'");
$row = mysqli_fetch_array($qry);

if (!empty($row['imgp'])) {
    unlink("../../auth/assets_auth/images/inserted_img/$row[imgp]"); //function untuk menghapus file
}
$url = "../../admin_dashboard.php?section=data_akun";
$pesan = "Data berhasil dihapus";

$sql = "DELETE FROM user_form WHERE id='$id'";
$query = mysqli_query($con, $sql);

echo "<script>alert('$pesan'); location='$url' </script>";
?>