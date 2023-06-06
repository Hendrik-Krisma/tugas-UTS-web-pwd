<style>
    .size-new{
        height:1.6em;
        width:1.6em;
        margin-right:1em;
    }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="fw-semibold mb-1 text-gray-800">Manajemen Data Section Produk laris</h1>
    <p class="mb-4">
        Halaman ini digunakan untuk mengelola data Section Produk laris
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4    ">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Form Tambah Data</h3>
        </div>

        <form action="./web/laris_manis/larismanis_insert.php" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group mb-4">
                    <label>File Gambar:</label>
                    <input type="file" class="form-control" name="gambarpl">
                </div>
                <div class="form-group mb-4">
                    <label>Judul:</label>
                    <input type="text" class="form-control" placeholder="Masukan nama Judul" name="judulpl" required>
                </div>
                <div class="form-group mb-4">
                    <label>Harga:</label>
                    <input type="text" class="form-control" placeholder="Masukan Harga" name="hargapl"
                        required>
                </div>

            </div>

            <div class="card-footer">

                <button type="submit" name="btn" value="Simpan" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="admin_dashboard.php?section=produk_laris" class="btn btn-warning">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>


    </div>
</div>