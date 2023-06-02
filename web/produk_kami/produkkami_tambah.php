<style>
    .size-new{
        height:1.6em;
        width:1.6em;
        margin-right:1em;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="fw-semibold mb-1 text-gray-800">Manajemen Data Section Produk Kami</h1>
    <p class="mb-4">
        Halaman ini digunakan untuk mengelola data Section Produk Kami
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4    ">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form Tambah Data</h3>
        </div>

        <form action="./web/produk_kami/produkkami_insert.php" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group mb-4">
                    <label>File Gambar:</label>
                    <input type="file" class="form-control" name="gambarpk">
                </div>
                <div class="form-group mb-4">
                    <label>Judul:</label>
                    <input type="text" class="form-control" placeholder="Masukan nama Judul" name="judulpk" required>
                </div>
                <div class="form-group mb-4">
                    <label>Deksripsi:</label>
                    <input type="text" class="form-control" placeholder="Masukan nama Deksripsi" name="deskripsipk"
                        required>
                </div>
                <label class="mb-2">Kustomisasi:</label>
                <div class="form-group mb-4 col-sm-12 d-flex align-items-stretch">
                    
                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Warna" id="Check1">
                        <label class="form-check-label h4" for="Check1">Warna</label>
                    </div>

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Isian" id="Check2">
                        <label class="form-check-label h4" for="Check2">Isian</label>
                    </div>

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Ukuran" id="Check3">
                        <label class="form-check-label h4" for="Check3">Ukuran</label>
                    </div>

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Rasa" id="Check4">
                        <label class="form-check-label h4" for="Check4">Rasa</label>
                    </div>

                    <div class="form-check col">
                        <input type="checkbox" class="form-check-input size-new" name="kustom[]" value="Tema" id="Check5">
                        <label class="form-check-label h4" for="Check5">Tema</label>
                    </div>
                </div>

            </div>

            <div class="card-footer">

                <button type="submit" name="btn" value="Simpan" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="admin_dashboard.php?section=produk_kami" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>


    </div>
</div>