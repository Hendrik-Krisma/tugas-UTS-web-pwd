<?php
include "../../config/connection.php";
$id_produkkami = $_GET['id'];

$qry = mysqli_query($con, "SELECT * FROM produk_kami where id_produkkami = '$id_produkkami'");
$row = mysqli_fetch_array($qry);

if (!empty($row['gambar_pk'])) {
    unlink("../../assets/images/inserted_img/$row[gambar_pk]"); //function untuk menghapus file
}
$sql = "DELETE FROM produk_kami WHERE id_produkkami='$id_produkkami'";
$query = mysqli_query($con, $sql);

$url = "../../admin_dashboard.php?section=produk_kami";
$pesan = "Data berhasil dihapus";

echo "<script>alert('$pesan'); location='$url' </script>";


?>