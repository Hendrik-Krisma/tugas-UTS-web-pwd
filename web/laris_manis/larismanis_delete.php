<?php
include "../../config/connection.php";
$id_produklaris = $_GET['id'];

$qry = mysqli_query($con, "SELECT * FROM produk_laris where id_produklaris = '$id_produklaris'");
$row = mysqli_fetch_array($qry);

if (!empty($row['gambar_pl'])) {
    unlink("../../assets/images/inserted_img/$row[gambar_pl]"); //function untuk menghapus file
}
$sql = "DELETE FROM produk_laris WHERE id_produklaris='$id_produklaris'";
$query = mysqli_query($con, $sql);

$url = "../../admin_dashboard.php?section=laris_manis";
$pesan = "Data berhasil dihapus";

echo "<script>alert('$pesan'); location='$url' </script>";


?>