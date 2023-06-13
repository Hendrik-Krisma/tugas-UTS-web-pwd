<?php
include "./config/connection.php";

session_start();
if (isset($_SESSION['admin_name'])) {
    echo '
    <a class="text-light col pe-auto justify-content-center" href="admin_dashboard.php">
        <div class="bg-primary text-center pe-auto pt-3 pb-3">
            Kembali ke Dashboard Admin
        </div>                       
    </a>
    ';
}
?>

<!doctype html>
<html lang="en">

<!-- <style>
    #background-video {
        width: 100vw;
        height: 100vh;
        object-fit: cover;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        z-index: -1;
        opacity: 0.1;
    }
</style> -->

<!-- <video id="background-video" autoplay loop muted poster="./assets/images/bg_video.mp4">
    <source src="./assets/images/bg_video.mp4" type="video/mp4">
</video> -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VVL Cake Admin Panel</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logo/vvlcake2.png" />
    <link rel="stylesheet" href="./src/assets/css/styles.min.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
</head>

<body>
    <!-- <div class="grid grid-bg ">
        <nav class="col-12 hk">
            <div class="wrapper">
                <img class="logo" >
                <div class="menu">
                    <ul class="hk1">
                        <li class="hk2"><a href='#Produk'>Produk</a></li>
                        <li class="hk2"><a href='#Laris'>Laris Manis</a></li>
                        <li class="hk2"><a href='#Tentang'>Tentang Kami</a></li>
                        <li class="hk2"><a href='#Cara'>Proses Pemesanan</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div> -->

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./assets/images/logo/vvlcake2.png" alt="" width="35" height="35" class="d-inline-block align-text-middle">
                <span class="fw-semibold">VVL Cake</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link pe-5" href="#Produk">Kategori Produk</a>
                    <a class="nav-link pe-5" href="#Laris">Laris Manis</a>
                    <a class="nav-link pe-5" href="#Tentang">Tentang Kami</a>
                    <a class="nav-link pe-5" href="#Cara">Pemesanan</a>
                    <!-- <a class="nav-link pe-5" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="judul_utama">
                    <div class="judul_baris_satu">
                        <span>Happy</span>
                        <span class="judul_wife">Tummy</span>
                    </div>
                    <div class="judul_baris_dua">
                        Feel Yummy!
                    </div>
                </div>
                <div class="teks_judul">Kami menyediakan berbagai macam jenis cake yang bisa membuat Anda merasa sensasi
                    tersendiri saat menyantapnya!</div>
                <a class="tombol_whatsapp" href="http://wa.me/+6285348166286" target="_blank" rel="noopener noreferrer">Whatsapp</a>
                <a class="tombol_instagram" href="https://www.instagram.com/vvl_cake/" target="_blank" rel="noopener noreferrer">Instagram</a>
            </div>
            <div class="col-sm-6">

                <img class="img-fluid" src="assets/images/kue1.png" />
            </div>
        </div>

        <div class="row mt-4" id="Produk">
            <div class="judul_bagan col-12">
                Kategori Produk
            </div>
        </div>

        <div class="row mb-5">
            <?php
            $sql = "SELECT * FROM produk_kami";
            $query = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($query)) {

                $link_gambar = "./assets/images/inserted_img/$row[gambar_pk]";
            ?>

                <div class="col-md-4 gambar_kue"><img class="imgs" src="<?= $link_gambar;  ?>" /></div>
                <div class="col-8 mt-4" style="padding: 0 0 0 2em;">
                    <div class="judul_bagan_1" style="color: #9DD2D8;"><?= $row['judul_pk'] ?></div>
                    <div class="text-break"><?= $row['deskripsi_pk'] ?></div>
                    <div class="daftar_fitur">
                        <ul>
                            <?php foreach (explode(", ", $row['kustomisasi']) as $kustoms) { ?>
                                <li>
                                    <p><?php echo "$kustoms"; ?></p>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <span class="col-12" style="margin-top: 2em;"></span>
            <?php
            }
            ?>
        </div>

        <div class="row mt-5" id="Laris">
            <div class="judul_bagan col-12">
                Laris Manis
            </div>
        </div>

        <div class="row">
            <?php
            $sql = "SELECT * FROM produk_laris";
            $query = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($query)) {

                $link_gambar = "./assets/images/inserted_img/$row[gambar_pl]";
            ?>

                <div class="col-md-4 gambar_baris_satu">
                    <img class="imgs" src="<?= $link_gambar;  ?>" />
                </div>

            <?php
            }
            ?>

            <span class="col-12" style="margin-top: 2em;"></span>
        </div>

        <!-- <div class="row">
            <div class="col-md-4 gambar_baris_satu">
                <img class="imgs" src="assets/images/kue/kue4.jpg" />
            </div>
            <div class="col-md-4 gambar_baris_satu">
                <img class="imgs" src="assets/images/kue/kue5.jpg" />
            </div>
            <div class="col-md-4 gambar_baris_satu">
                <img class="imgs" src="assets/images/kue/kue6.jpg" />
            </div>
        </div> -->

        <!-- <div class="row ">
            <div class="col-md gambar_baris_dua">
                <img class="imgs" src="assets/images/kue/kue7.jpg" />
            </div>
            <div class="col-md gambar_baris_dua">
                <img class="imgs" src="assets/images/kue/kue8.jpg" />
            </div>
            <div class="col-md gambar_baris_dua">
                <img class="imgs" src="assets/images/kue/kue9.jpg" />
            </div>
            <div class="col-md gambar_baris_dua">
                <img class="imgs" src="assets/images/kue/kue10.jpg" />
            </div>
        </div> -->

        <div class="row mt-5" id="Tentang">
            <div class="judul_bagan col-12">
                Tentang Kami
            </div>
        </div>

        <div class="row mb-5 column-gap-4">

            <div class="card col-md gambar_kami" style="height: 28rem; background-color: rgba(255, 223, 211, 0.5);">
                <img class="imgs" src="assets/images/member-assets/bs-hendrik.png" />
            </div>
            <div class="card col-md gambar_kami" style="height: 28rem; background-color: rgba(254, 200, 216, 0.5);">
                <img class="imgs" src="assets/images/member-assets/bs-cristina.png" />
            </div>
            <div class="card col-md gambar_kami" style="height: 28rem; background-color: rgba(149, 125, 173, 0.5);">
                <img class=" imgs" src="assets/images/member-assets/bs-steven.png" />
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-12 judul_bagan">
                Tercipta dari <span class="tangan_ibu">tangan Ibu</span>
            </div>
            <div class="col-md"></div>
            <div class="col-md-6">
                Kue kami selalu terasa sempurna bila dinikmati ketika bersama dengan keluarga, teman, pacar dan menghabiskan <i>quality time</i> dengan mereka. Fluffy Cake membantu Anda menciptakan momen berharga saat menyantapnya.
            </div>
            <div class="col-md"></div>
        </div>

        <div class="row" id="Cara">
            <div class="judul_bagan col">
                Proses Pemesanan
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="d-flex grid_tengah daftar">
                    <span class="col-1" style="text-align: center;">1</span>
                    <div class="col-md-11">Silahkan kunjungi link WhatsApp atau Instagram kami yang tertera di info kontak.
                    </div>
                </div>
                <div class="d-flex grid_tengah daftar">

                    <span class="col-1" style="text-align: center;">2</span>
                    <div class="col-md-11">Awali chat dengan mengisi form pemesanan pelanggan yang berisi nama, alamat,
                        Nomor telepon, nama kue yang ingin di beli, masukkan jumlah yang diinginkan.</div>
                </div>
                <div class="d-flex grid_tengah daftar">

                    <span class="col-1" style="text-align: center;">3</span>
                    <div class="col-md-11">Jika ingin custom bisa sertakan foto cake yang diinginkan.</div>
                </div>
                <div class="d-flex grid_tengah daftar">

                    <span class="col-1" style="text-align: center;">4</span>
                    <div class="col-md-11">Isi pilihan atau tipe pengiriman.</div>
                </div>
                <div class="d-flex grid_tengah daftar">

                    <span class="col-1" style="text-align: center;">5</span>
                    <div class="col-md-11">Cantumkan kata-kata yang diinginkan pada form jika Anda menginginkan ada
                        kata-kata di atas kue.</div>
                </div>
                <div class="d-flex grid_tengah daftar">

                    <span class="col-1" style="text-align: center;">6</span>
                    <div class="col-md-11">Silahkan memilih ingin DP/full payments/pembayaran cod.</div>
                </div>
                <div class="d-flex grid_tengah daftar">

                    <span class="col-1" style="text-align: center;">7</span>
                    <div class="col-md-11">Metode pembayaran akan dikirim saat pengisian form selesai. Tersedia pilihan:
                        Tunai saat pengiriman/ Transfer Bank ke Acc Permata Bank 1230-103-387/melalui QRIS.</div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>

        <div class="row mb-5">
            <div class="col-12 tombol_pemesanan">
                <a class="tombol_whatsapp" href="http://wa.me/+6285348166286" target="_blank" rel="noopener noreferrer">Whatsapp</a>
                <a class="tombol_instagram" href="https://www.instagram.com/vvl_cake/" target="_blank" rel="noopener noreferrer">Instagram</a>
            </div>
        </div>

        <div class="row mt-5 column-gap-3">

            <div class="col-md">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/CRn1nWsL563/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                    <div style="padding:16px;"> <a href="https://www.instagram.com/p/CRn1nWsL563/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                            <div style=" display: flex; flex-direction: row; align-items: center;">
                                <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                </div>
                                <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                    </div>
                                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 19% 0;"></div>
                            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                            <g>
                                                <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg></div>
                            <div style="padding-top: 8px;">
                                <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                    View this post on Instagram</div>
                            </div>
                            <div style="padding: 12.5% 0;"></div>
                            <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                <div>
                                    <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                    </div>
                                    <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                    </div>
                                    <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                    </div>
                                </div>
                                <div style="margin-left: 8px;">
                                    <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                    </div>
                                    <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                    </div>
                                </div>
                                <div style="margin-left: auto;">
                                    <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                    </div>
                                    <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                    </div>
                                    <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                </div>
                                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                </div>
                            </div>
                        </a>
                        <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                            <a href="https://www.instagram.com/p/CRn1nWsL563/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Chui Fong (@vvl_cake)</a>
                        </p>
                    </div>
                </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
            </div>
            <div class="col-md">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Cimf7dFrtFh/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                    <div style="padding:16px;"> <a href="https://www.instagram.com/p/Cimf7dFrtFh/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                            <div style=" display: flex; flex-direction: row; align-items: center;">
                                <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                </div>
                                <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                    </div>
                                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 19% 0;"></div>
                            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                            <g>
                                                <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg></div>
                            <div style="padding-top: 8px;">
                                <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                    View this post on Instagram</div>
                            </div>
                            <div style="padding: 12.5% 0;"></div>
                            <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                <div>
                                    <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                    </div>
                                    <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                    </div>
                                    <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                    </div>
                                </div>
                                <div style="margin-left: 8px;">
                                    <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                    </div>
                                    <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                    </div>
                                </div>
                                <div style="margin-left: auto;">
                                    <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                    </div>
                                    <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                    </div>
                                    <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                </div>
                                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                </div>
                            </div>
                        </a>
                        <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                            <a href="https://www.instagram.com/p/Cimf7dFrtFh/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Chui Fong (@vvl_cake)</a>
                        </p>
                    </div>
                </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
            </div>
            <div class="col-md">
                <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Cimd715vcLQ/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);">
                    <div style="padding:16px;"> <a href="https://www.instagram.com/p/Cimd715vcLQ/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank">
                            <div style=" display: flex; flex-direction: row; align-items: center;">
                                <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;">
                                </div>
                                <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;">
                                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;">
                                    </div>
                                    <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;">
                                    </div>
                                </div>
                            </div>
                            <div style="padding: 19% 0;"></div>
                            <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-511.000000, -20.000000)" fill="#000000">
                                            <g>
                                                <path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg></div>
                            <div style="padding-top: 8px;">
                                <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">
                                    View this post on Instagram</div>
                            </div>
                            <div style="padding: 12.5% 0;"></div>
                            <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;">
                                <div>
                                    <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);">
                                    </div>
                                    <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;">
                                    </div>
                                    <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);">
                                    </div>
                                </div>
                                <div style="margin-left: 8px;">
                                    <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;">
                                    </div>
                                    <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)">
                                    </div>
                                </div>
                                <div style="margin-left: auto;">
                                    <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);">
                                    </div>
                                    <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);">
                                    </div>
                                    <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);">
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;">
                                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;">
                                </div>
                                <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;">
                                </div>
                            </div>
                        </a>
                        <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">
                            <a href="https://www.instagram.com/p/Cimd715vcLQ/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Chui Fong (@vvl_cake)</a>
                        </p>
                    </div>
                </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
            </div>
        </div>

    </div>

    <footer class="footer grid_tengah">
        <div class="container">
            <div class="row">
                <div class="col-md text-center">
                    <div class="footer1_logo"><img class="imgs" src="assets/images/logo/vvlcake1.png" /></div>
                    <div class="footer2_teks text-break">Kue Ulang tahun, Pudding Hias, Lapis Legit, dan Kue Kering khas Pontianak.
                    </div>
                </div>

                <div class="col-md mt-5 footer_kontak">
                    <div class="footer_wa">
                        <div class="footer_judul">Ada Pertanyaan?</div>
                        <div class="overlay">
                            <div class="footer_waa">
                                <span style="padding-right: 0.5em;">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 128 128" width="1.5em" height="1.5em" xml:space="preserve">
                                        <path d="M64,17C38.1,17,17,38,17,64c0,8.3,2.2,16.4,6.3,23.5c1.6,2.8,2,6.1,1.2,9.2l-2.9,10.5l11.2-2.9c1-0.3,2-0.4,3-0.4
                                        c2,0,4,0.5,5.7,1.5C48.4,109,56.1,111,64,111h0c25.9,0,47-21.1,47-47c0-12.6-4.9-24.4-13.8-33.3C88.4,21.9,76.6,17,64,17z
                                        M92.9,85.1c-1.2,3.4-7.2,6.8-10,7c-2.7,0.2-5.2,1.2-17.7-3.7c-15-5.9-24.5-21.3-25.2-22.3c-0.7-1-6-8-6-15.3
                                        c0-7.3,3.8-10.8,5.2-12.3c1.4-1.5,2.9-1.8,3.9-1.8c1,0,2,0,2.8,0c1.1,0,2.2,0.1,3.3,2.5c1.3,2.9,4.2,10.2,4.5,10.9
                                        c0.4,0.7,0.6,1.6,0.1,2.6c-0.5,1-0.7,1.6-1.5,2.5c-0.7,0.9-1.6,1.9-2.2,2.6c-0.7,0.7-1.5,1.5-0.6,3c0.9,1.5,3.8,6.3,8.2,10.2
                                        c5.6,5,10.4,6.6,11.9,7.3c1.5,0.7,2.3,0.6,3.2-0.4c0.9-1,3.7-4.3,4.7-5.8c1-1.5,2-1.2,3.3-0.7c1.4,0.5,8.6,4.1,10.1,4.8
                                        c1.5,0.7,2.5,1.1,2.8,1.7C94.1,78.7,94.1,81.6,92.9,85.1z" />
                                        <path d="M64,2C29.8,2,2,29.8,2,64c0,10.5,2.6,20.8,7.7,29.9l-5.3,19.4c-0.9,3.1,0,6.3,2.3,8.6c2.3,2.3,5.5,3.2,8.6,2.4l20.2-5.3
                                        c8.8,4.6,18.6,7,28.6,7c34.2,0,62-27.8,62-62c0-16.6-6.4-32.1-18.1-43.8C96.2,8.5,80.6,2,64,2z M64,120c-9.3,0-18.6-2.4-26.8-6.8
                                        c-0.4-0.2-0.9-0.4-1.4-0.4c-0.3,0-0.5,0-0.8,0.1l-21.3,5.6c-1.5,0.4-2.5-0.4-2.9-0.8c-0.4-0.4-1.2-1.4-0.8-2.9l5.6-20.6
                                        c0.2-0.8,0.1-1.6-0.3-2.3C10.5,83.5,8,73.8,8,64C8,33.1,33.1,8,64,8c15,0,29.1,5.8,39.6,16.4C114.2,35,120.1,49.1,120,64
                                        C120,94.9,94.9,120,64,120z" />
                                    </svg>
                                </span>
                                <span><a class="" href="http://wa.me/+6285348166286" target="_blank" rel="noopener noreferrer">Kontak Kami</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md mt-5 footer_kontak">
                    <div class="footer_wa">
                        <div class="footer_judul">Ingin lihat-lihat?</div>
                        <div class="overlay">
                            <div class="text">
                                <div class="footer_iga">
                                    <span style="padding-right: 0.5em;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" width="1.5em" height="1.5em">
                                            <path d="M 21.580078 7 C 13.541078 7 7 13.544938 7 21.585938 L 7 42.417969 C 7 50.457969 13.544938 57 21.585938 57 L 42.417969 57 C 50.457969 57 57 50.455062 57 42.414062 L 57 21.580078 C 57 13.541078 50.455062 7 42.414062 7 L 21.580078 7 z M 47 15 C 48.104 15 49 15.896 49 17 C 49 18.104 48.104 19 47 19 C 45.896 19 45 18.104 45 17 C 45 15.896 45.896 15 47 15 z M 32 19 C 39.17 19 45 24.83 45 32 C 45 39.17 39.169 45 32 45 C 24.83 45 19 39.169 19 32 C 19 24.831 24.83 19 32 19 z M 32 23 C 27.029 23 23 27.029 23 32 C 23 36.971 27.029 41 32 41 C 36.971 41 41 36.971 41 32 C 41 27.029 36.971 23 32 23 z" />
                                        </svg></span>
                                    <span><a class="" href="https://www.instagram.com/vvl_cake/" target="_blank" rel="noopener noreferrer">Kunjungi Kami</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md mt-5 footer_link">
                    <div><a href="#Produk">Produk</a></div>
                    <div><a href="#Laris">Laris Manis</a></div>
                    <div><a href="#Tentang">Tentang Kami</a></div>
                    <div><a href="#Cara">Cara Pemesanan</a></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <hr style="border:1px solid white; margin: 3em 0">
                    </hr>
                </div>
                <p class="col-12" style="text-align: center; margin-bottom: -1em; font-family:pelight;">@Copyright 2023. All rights reserved.</p>
            </div>
        </div>



    </footer>


    </div>


    <script src="./src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./src/assets/js/sidebarmenu.js"></script>
    <script src="./src/assets/js/app.min.js"></script>
    <script src="./src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./src/assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="./src/assets/js/dashboard.js"></script>

</body>

</html>