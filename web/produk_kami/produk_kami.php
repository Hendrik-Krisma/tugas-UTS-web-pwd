<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") {
    include "produkkami_tambah.php";
} else if ($aksi == "edit") {
    include "produkkami_edit.php";
} else {
?>
    <style>
        .zoom-hover {
            transition: .2s;
        }

        .zoom-hover:hover {
            transform: scale(4);
            width: 100%;
            height: 100%;
        }
    </style>


    <div class="container-fluid">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h3 class="fw-semibold mb-4">Manajemen&nbsp; Section&nbsp; Kategori&nbsp; Produk</h3>
                    <div class="row">
                        <div class="mb-3 col-sm-3">
                            <a href="admin_dashboard.php?section=produk_kami&aksi=tambah" class="btn btn-info">
                                <span style="margin-right:10px;"><i class="ti ti-pencil-plus"></i></span>
                                <span>&nbsp;Tambah &nbsp;Data</span>
                            </a>
                        </div>
                        <div class="form-group mb-4 d-flex col-sm-9">
                            <input type="text" id="myInput" class="form-control" name="" placeholder="&#128269; &nbsp; &nbsp; Cari data yang dibutuhkan">
                        </div>
                    </div>

                    <div class="table-responsive-sm">
                        <table class="table text-nowrap mb-0 align-middle" width="100%" cellspacing="0">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0" style="width: 5%">
                                        <h6 class="fw-semibold mb-0">ID</h6>
                                    </th>
                                    <th class="border-bottom-0" style="width: 15%">
                                        <h6 class="fw-semibold mb-0">Gambar</h6>
                                    </th>
                                    <th class="border-bottom-0" style="width: 15">
                                        <h6 class="fw-semibold mb-0">Judul</h6>
                                    </th>
                                    <th class="border-bottom-0" style="width: 25%">
                                        <h6 class="fw-semibold mb-0">Deskripsi</h6>
                                    </th>
                                    <th class="border-bottom-0" style="width:  15%">
                                        <h6 class="fw-semibold mb-0">Kustomisasi</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center" style="width: 25%">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                $no = 1;
                                $sql = "SELECT * FROM produk_kami";
                                $query = mysqli_query($con, $sql);
                                
                                while ($row = mysqli_fetch_array($query)) {
                                    $link_edit = "admin_dashboard.php?section=produk_kami&aksi=edit&id=$row[id_produkkami]";
                                    $link_hapus = "./web/produk_kami/produkkami_delete.php?id=$row[id_produkkami]";

                                    $gambar = "default.jpg";
                                    if (!empty($row['gambar_pk'])) {
                                        $gambar = $row['gambar_pk'];
                                    }

                                    $link_gambar = "./assets/images/inserted_img/$row[gambar_pk]";
                                ?>
                                    <tr>
                                        <td>
                                            <?= $no; ?>
                                        </td>
                                        <td>
                                            <img src="<?= $link_gambar; ?>" class="zoom-hover" style='height: 70px; width: 70px; object-fit: cover'>
                                        </td>
                                        <td>
                                            <?= $row['judul_pk']; ?>
                                        </td>
                                        <td w>
                                            <?php $text = $row['deskripsi_pk'];
                                            $deskripsi = wordwrap($text, 40, "<br/>\n");
                                            echo $deskripsi;
                                            ?>
                                        </td>
                                        <td>
                                            <?= $row['kustomisasi'];
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success">
                                                <a class="text-light" href="<?= $link_edit; ?>">
                                                    <i class="ti ti-edit"></i>&nbsp; EDIT
                                                </a>
                                            </button>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapuskategori<?= $row['id_produkkami']; ?>">

                                                <i class="ti ti-trash"></i>&nbsp; HAPUS

                                            </button>
                                            <div class="modal fade" id="hapuskategori<?= $row['id_produkkami']; ?>" tabindex="-1" aria-labelledby="hapuskategori" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapuskategori">Konfirmasi - Hapus</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="fs-5 fw-semibold">Yakin ingin menghapus data?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">KEMBALI</button>
                                                            <button type="button" class="btn btn-danger">
                                                                <a class="text-light" href="<?= $link_hapus; ?>">
                                                                    HAPUS
                                                                </a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>