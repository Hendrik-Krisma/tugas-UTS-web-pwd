<?php
@include "./config/connection.php";

@session_start();
if (isset($_SESSION['admin_name'])) {
  // echo "
  // <button type='button' class='btn btn-outline-primary m-1'>
  // <a href='admin_dashboard.php'>Kembali ke Dashboard Admin</a>
  // </button>
  // ";
?>
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="./admin_dashboard.php" class="text-nowrap logo-img">
        <img src="./assets/images/logo/vvlcake2.png" width="40">
        <span class="card-title fw-semibold mb-4">VVL Cake</span>
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
      <?php
      echo "
      <li class='nav-small-cap'>
        <i class='ti ti-dots nav-small-cap-icon fs-4'></i>
        <span class='hide-menu'>Home</span>
      </li>
      <li class='sidebar-item'>
        <a class='sidebar-link text-info' href='index.php' aria-expanded='false'>
          <span class=''>
            <i class='ti ti-home'></i>
          </span>
          <span class='hide-menu'>Beranda</span>
        </a>
      </li>
    ";
    }
      ?>
      <?php
      /*
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo "./admin_dashboard.php?section=homepage"; ?>" aria-expanded="false">
          <span>
            <i class="ti ti-layout-dashboard"></i>
          </span>
          <span class="hide-menu">Preview</span>
        </a>
      </li>
      */
      ?>
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Manajemen Data</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo "./admin_dashboard.php?section=produk_kami"; ?>" aria-expanded="false">
          <span>
            <i class="ti ti-article"></i>
          </span>
          <span class="hide-menu">Kategori</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo "./admin_dashboard.php?section=laris_manis"; ?>" aria-expanded="false">
          <span>
            <i class="ti ti-alert-circle"></i>
          </span>
          <span class="hide-menu">Produk</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link" href="<?php echo "./admin_dashboard.php?section=data_akun"; ?>" aria-expanded="false">
          <span>
            <i class="ti ti-at"></i>
          </span>
          <span class="hide-menu">Data Akun</span>
        </a>
      </li>
      <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/ui-buttons.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Buttons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/ui-alerts.html" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Alerts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/ui-card.html" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/ui-forms.html" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/ui-typography.html" aria-expanded="false">
                <span>
                  <i class="ti ti-typography"></i>
                </span>
                <span class="hide-menu">Typography</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/authentication-login.html" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Login</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/authentication-register.html" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Register</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">EXTRA</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/icon-tabler.html" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">Icons</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./src/html/sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li> -->
      </ul>
      <!-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
      <div class="d-flex">
        <div class="unlimited-access-title me-3">
          <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
          <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank"
            class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
        </div>
        <div class="unlimited-access-img">
          <img src="./src/html/src/assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
        </div>
      </div>
    </div> -->
    </nav>
    <!-- End Sidebar navigation -->
  </div>