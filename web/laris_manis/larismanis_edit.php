<?php

include "./config/connection.php";

$id_produklaris = isset($_GET['id']) ? $_GET['id'] : "";
$id_produklaris = mysqli_real_escape_string($con, $id_produklaris);
$sql = "SELECT * FROM produk_laris WHERE id_produklaris ='$id_produklaris'";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="fw-semibold mb-2 text-gray-800">Manajemen Data Section Produk Laris Manis</h1>
    <p class="mb-4">
        Halaman ini digunakan untuk mengelola data Section Produk Laris Manis
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form Tambah Data</h3>
        </div>
        <form action="./web/laris_manis/produklaris_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_produklaris" value="<?= $data['id_produklaris']; ?>">
            <div class=" card-body">
                <input type="hidden" name="idproduklaris" value="<?= $data['id_produklaris']; ?>">
                <div class="form-group mb-4">
                    <label>Foto: <sup class="text-danger">Abaikan bila tidak mengubah</sup></label>
                    <input type="file" class="form-control" name="gambarpl">
                </div>
                <div class="form-group mb-4">
                    <label>Judul:</label>
                    <input type="text" class="form-control" value="<?= $data['judul_pl']; ?>" name="judulpl" required>
                </div>
                <div class="form-group mb-4">
                    <label>Harga:</label>
                    <input type="text" class="form-control" value="<?= $data['harga_pl']; ?>" name="deskripsipl"
                        required>
                </div>
                
            </div>

    </div>

    <div class="card-footer">

        <button type="submit" name="edit" value="Edit" class="btn btn-primary">
            <i class="fas fa-save"></i> Edit
        </button>
        <a href="admin_dashboard.php?section=produk_laris" class="btn btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    </form>


</div>
</div>