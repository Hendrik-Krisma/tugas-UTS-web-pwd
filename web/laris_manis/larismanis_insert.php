<?php
include "../../config/connection.php";
$judulpl = mysqli_real_escape_string($con, $_POST['judulpl']);
$hargapl =mysqli_real_escape_string($con,$_POST['hargapl']);                                                                 

$gambarpl = "";
$foto_cek = $_FILES['gambarpl']['name'];
if (!empty($foto_cek)) {
    $folder = "../../assets/images/inserted_img";
    $tmp_name = $_FILES["gambarpl"]["tmp_name"];
    $cek = explode(".", $foto_cek);
    $ext = end($cek);
    $name = md5(date("YmdHis")) . ".$ext";
    move_uploaded_file($tmp_name, "$folder/$name");
    $gambarpl = $name;
}

$sql = "INSERT INTO `produk_laris` ( `gambar_pl`, `judul_pl`, `harga_pl`) VALUES ('$gambarpl', '$judulpl', '$hargapl');";
$query = mysqli_query($con, $sql);

$url = "../../admin_dashboard.php?section=produk_laris";
$pesan = "Data berhasil disimpan";

echo "<script>alert('$pesan'); location='$url';</script>";

?>