<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") {
    include "larismanis_tambah.php";
} else if ($aksi == "edit") {
    include "larismanis_edit.php";
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
                    <h3 class="fw-semibold mb-4">Manajemen&nbsp; Section&nbsp; Produk&nbsp; Laris</h3>
                    <div class="row">
                        <div class="mb-3 col-sm-3">
                            <a href="admin_dashboard.php?section=laris_manis&aksi=tambah" class="btn btn-info">
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
                                        <h6 class="fw-semibold mb-0">Harga</h6>
                                    </th>
                                    <!-- <th class="border-bottom-0" style="width:  15%">
                                        <h6 class="fw-semibold mb-0">Kustomisasi</h6>
                                    </th> -->
                                    <th class="border-bottom-0 text-center" style="width: 25%">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>