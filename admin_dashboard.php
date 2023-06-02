<?php
@include "./config/connection.php";


session_start();

if (!isset($_SESSION['admin_name'])) {
  header('location:auth/login_akun.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VVL Cake Admin Panel</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logo/vvlcake2.png" />
  <link rel="stylesheet" href="./src/assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <?php include './index/left_side_bar.php'; ?>
      
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <?php include './index/navigation_bar.php' ?>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        <?php
        $section = isset($_GET['section']) ? $_GET['section'] : "";
        if ($section == "") {
          include "index.php";
          error_reporting();
        } else if ($section == "homepage") {
          include "index.php";
        } else if ($section == "produk_kami") {
          include "./web/produk_kami/produk_kami.php";
        } else if ($section == "laris_manis") {
          include "./web/laris_manis/laris_manis.php";
        } else if ($section == "data_akun") {
          include "./web/data_akun/data_akun.php";
        }
        // else if($section == "produk") {include "produk.php";}
        else {
          include "blank_page.php";
        }
        ?>
      </div>
    </div>
  </div>

  <script src="./src/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="./src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./src/assets/js/sidebarmenu.js"></script>
  <script src="./src/assets/js/app.min.js"></script>
  <script src="./src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="./src/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="./src/assets/js/dashboard.js"></script>

  <script>
    // window.onload = function () {
    //     if (window.jQuery) {
    //         // jQuery is loaded  
    //         alert("Yeah!");
    //     } else {
    //         // jQuery is not loaded
    //         alert("Doesn't Work");
    //     }
    // }
    $(document).ready(function () {

      $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function () {

          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
      })
      
    })
  </script>
</body>

</html>