<?php 
include "../../config/connection.php";
session_start();
$id_produkkami = mysqli_real_escape_string($con, $_POST['id_produkkami']);
$idproduklaris = mysqli_real_escape_string($con, $_POST['idproduklaris']);
$judulpl = mysqli_real_escape_string($con, $_POST['judulpl']);
$hargapl = mysqli_real_escape_string($con, $_POST['hargapl']);

$sql = "UPDATE produk_laris SET id_produkkami='$id_produkkami', judul_pl='$judulpl', harga_pl='$hargapl' where id_produklaris='$idproduklaris'";

mysqli_query($con, $sql);
// print_r($sql);


$foto_cek = $_FILES['gambarpl']['name'];
if (!empty($foto_cek)) {
    $folder = "../../assets/images/inserted_img";
    $tmp_name = $_FILES["gambarpl"]["tmp_name"];
    $cek = explode(".", $foto_cek);
    $ext = end($cek);
    $name = md5(date("YmdHis")) . ".$ext";
    move_uploaded_file($tmp_name, "$folder/$name");
    $gambarpl = $name;

    $qry = mysqli_query($con, "SELECT * FROM produk_laris where id_produklaris = '$idproduklaris'");
    $row = mysqli_fetch_array($qry);

    if (!empty($row['gambar_pl'])) {
        unlink("../../assets/images/inserted_img/$row[gambar_pl]"); //function untuk menghapus file
    }
    //mengupdate gambarpl baru
    $sql = "UPDATE produk_laris SET gambar_pl='$gambarpl' WHERE id_produklaris='$idproduklaris'";
    mysqli_query($con, $sql);
}


$url = "../../admin_dashboard.php?section=laris_manis";
$pesan = "Data berhasil disimpan";

echo "<script>alert('$pesan'); location='$url';</script>";
?>