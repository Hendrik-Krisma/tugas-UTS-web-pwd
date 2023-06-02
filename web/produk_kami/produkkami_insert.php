<?php
include "../../config/connection.php";
$judulpk = mysqli_real_escape_string($con, $_POST['judulpk']);
$deskripsipk = mysqli_real_escape_string($con, $_POST['deskripsipk']);
$data = $_POST['kustom'];
$kustomisasi = implode(", ",$data);                                                                     

$gambarpk = "";
$foto_cek = $_FILES['gambarpk']['name'];
if (!empty($foto_cek)) {
    $folder = "../../assets/images/inserted_img";
    $tmp_name = $_FILES["gambarpk"]["tmp_name"];
    $cek = explode(".", $foto_cek);
    $ext = end($cek);
    $name = md5(date("YmdHis")) . ".$ext";
    move_uploaded_file($tmp_name, "$folder/$name");
    $gambarpk = $name;
}

$sql = "INSERT INTO `produk_kami` ( `gambar_pk`, `judul_pk`, `deskripsi_pk`, `kustomisasi`) VALUES ('$gambarpk', '$judulpk', '$deskripsipk', '$kustomisasi');";
$query = mysqli_query($con, $sql);

$url = "../../admin_dashboard.php?section=produk_kami";
$pesan = "Data berhasil disimpan";

echo "<script>alert('$pesan'); location='$url';</script>";

?>