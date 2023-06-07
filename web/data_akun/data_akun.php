<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";
if ($aksi == "tambah") {
    include "dataakun_tambah.php";
} else if ($aksi == "edit") {
    include "dataakun_edit.php";
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
                    <h5 class="card-title fw-semibold mb-4">Manajemen Akun</h5>
                    <div class="row">
                        <div class="mb-3 col-sm-3">
                            <a href="admin_dashboard.php?section=data_akun&aksi=tambah" class="btn btn-info">
                                <span style="margin-right:10px;"><i class="ti ti-user-plus"></i></span>
                                <span>Registrasi &nbsp;/ &nbsp;Tambah &nbsp;Akun</span>
                            </a>
                        </div>
                        <div class="form-group mb-4 d-flex col-sm-9">
                            <input type="text" id="myInput" class="form-control" name="" placeholder="&#128269; &nbsp; &nbsp; Cari data yang dibutuhkan">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle" width="100%" cellspacing="0">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0 text-center" >
                                        <h6 class="fw-semibold mb-0">ID</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Profil</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Email</h6>
                                    </th>
                                    <!-- <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Password</h6>
                                    </th> -->
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tipe User</h6>
                                    </th>
                                    <th class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">Aksi</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                $no = 1;
                                $sql = "SELECT * FROM user_form LEFT JOIN user_type USING(idt)";
                                $query = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    $link_edit = "admin_dashboard.php?section=data_akun&aksi=edit&id=$row[id]";

                                    $link_hapus = "./web/data_akun/dataakun_delete.php?id=$row[id]";
                                    $gambar = "default.jpg";
                                    if (!empty($row['imgp'])) {
                                        $gambar = $row['imgp'];
                                    }

                                    $link_gambar = "./auth/assets_auth/images/inserted_img/$row[imgp]";
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no; ?>
                                        </td>
                                        <td>
                                            <img class="rounded-circle zoom-hover" style='height: 35px; width: 35px; object-fit: cover' src="<?= $link_gambar; ?>">
                                        </td>
                                        <td>
                                            <?= $row['name']; ?>
                                        </td>
                                        <td w>
                                            <?= $row['email']; ?>
                                        </td>
                                        <?php  
                                        /*  <td>
                                            <input type="password" class="form-control" disabled value="<?= $row['password']; ?>">
                                        </td> */
                                        ?>
                                        <td>
                                            <?= $row['type']; ?>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-success">
                                                <a class="text-light" href="<?= $link_edit; ?>">
                                                    <i class="ti ti-edit"></i>&nbsp; EDIT
                                                </a>
                                            </button>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapuskategori<?= $row['id']; ?>">

                                                <i class="ti ti-trash"></i>&nbsp; HAPUS

                                            </button>
                                            <div class="modal fade" id="hapuskategori<?= $row['id']; ?>" tabindex="-1" aria-labelledby="hapuskategori" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapuskategori">Konfirmasi - Hapus</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="fs-5 fw-semibold">Yakin ingin menghapus akun?</p>
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