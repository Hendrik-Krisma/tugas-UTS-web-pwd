<?php

include "./config/connection.php";

$id_produkkami = isset($_GET['id']) ? $_GET['id'] : "";
$id_produkkami = mysqli_real_escape_string($con, $id_produkkami);
$sql = "SELECT * FROM produk_kami WHERE id_produkkami ='$id_produkkami'";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
$kustomisasi = $data['kustomisasi'];
$kustom = explode(", ",$kustomisasi); 

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="fw-semibold mb-2 text-gray-800">Manajemen Data Section Produk Kami</h1>
    <p class="mb-4">
        Halaman ini digunakan untuk mengelola data Section Produk Kami
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form Tambah Data</h3>
        </div>
        <form action="./web/produk_kami/produkkami_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_produkkami" value="<?= $data['id_produkkami']; ?>">
            <div class=" card-body">
                <input type="hidden" name="idprodukkami" value="<?= $data['id_produkkami']; ?>">
                <div class="form-group mb-4">
                    <label>Foto: <sup class="text-danger">Abaikan bila tidak mengubah</sup></label>
                    <input type="file" class="form-control" name="gambarpk">
                </div>
                <div class="form-group mb-4">
                    <label>Judul:</label>
                    <input type="text" class="form-control" value="<?= $data['judul_pk']; ?>" name="judulpk" required>
                </div>
                <div class="form-group mb-4">
                    <label>Deksripsi:</label>
                    <input type="text" class="form-control" value="<?= $data['deskripsi_pk']; ?>" name="deskripsipk"
                        required>
                </div>
                <label class="mb-2">Kustomisasi:</label>
                <div class="form-group mb-4 col-sm-12 d-flex align-items-stretch">

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Warna"
                            id="Check1"<?= in_array('Warna', $kustom) ? 'checked="checked"' : '' ?> >
                        <label class="form-check-label h4" for="Check1">Warna</label>
                    </div>

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Isian"
                            id="Check2" <?= in_array('Isian', $kustom) ? 'checked="checked"' : '' ?> >
                        <label class="form-check-label h4" for="Check2">Isian</label>
                    </div>

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Ukuran"
                            id="Check3" <?= in_array('Ukuran', $kustom) ? 'checked="checked"' : '' ?> >
                        <label class="form-check-label h4" for="Check3">Ukuran</label>
                    </div>

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Rasa"
                            id="Check4" <?= in_array('Rasa', $kustom) ? 'checked="checked"' : '' ?>>
                        <label class="form-check-label h4" for="Check4">Rasa</label>
                    </div>

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Tema"
                            id="Check5" <?= in_array('Tema', $kustom) ? 'checked="checked"' : '' ?>>
                        <label class="form-check-label h4" for="Check5">Tema</label>
                    </div>
                </div>

            </div>

    </div>

    <div class="card-footer">

        <button type="submit" name="edit" value="Edit" class="btn btn-primary">
            <i class="fas fa-save"></i> Edit
        </button>
        <a href="admin_dashboard.php?section=produk_kami" class="btn btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
    </form>


</div>
</div>