<?php 
include "../../config/connection.php";
session_start();
$idprodukkami = mysqli_real_escape_string($con, $_POST['idprodukkami']);
$judulpk = mysqli_real_escape_string($con, $_POST['judulpk']);
$deskripsipk = mysqli_real_escape_string($con, $_POST['deskripsipk']);
$data = $_POST['kustom'];
$kustomisasi = implode(", ",$data); 
$_SESSION['kustom'] = $kustomisasi;

$sql = "UPDATE produk_kami SET judul_pk='$judulpk', deskripsi_pk='$deskripsipk',  kustomisasi= '$kustomisasi' where id_produkkami='$idprodukkami'";

mysqli_query($con, $sql);

$foto_cek = $_FILES['gambarpk']['name'];
if (!empty($foto_cek)) {
    $folder = "../../assets/images/inserted_img";
    $tmp_name = $_FILES["gambarpk"]["tmp_name"];
    $cek = explode(".", $foto_cek);
    $ext = end($cek);
    $name = md5(date("YmdHis")) . ".$ext";
    move_uploaded_file($tmp_name, "$folder/$name");
    $gambarpk = $name;

    $qry = mysqli_query($con, "SELECT * FROM produk_kami where id_produkkami = '$idprodukkami'");
    $row = mysqli_fetch_array($qry);

    if (!empty($row['gambar_pk'])) {
        unlink("../../assets/images/inserted_img/$row[gambar_pk]"); //function untuk menghapus file
    }
    //mengupdate gambarpk baru
    $sql = "UPDATE produk_kami SET gambar_pk='$gambarpk' WHERE id_produkkami='$idprodukkami'";
    mysqli_query($con, $sql);
}


$url = "../../admin_dashboard.php?section=produk_kami";
$pesan = "Data berhasil disimpan";

echo "<script>alert('$pesan'); location='$url';</script>";
?>