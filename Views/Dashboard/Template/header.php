<!DOCTYPE html>
<html lang="<?= SITE_LANG ?>">

<head>
  <meta charset="<?= SITE_CHARSET ?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $data["page_title"]; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?= get_favicon()  ?>
  <link href="<?= IMAGE ?>/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= ASSETS ?>/app/css/style-dashboard.css" rel="stylesheet">
  <link href="<?= CSS ?>/bootstrap-icons.css" rel="stylesheet">
  
  
  
  <!-- Plugins-->
  <link href="<?= CSS ?>/bootstrap.min.css" rel="stylesheet">
  <link href="<?= PLUGINS ?>/DataTable/datatables.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= PLUGINS ?>/sweetalert2/sweetalert2.min.css">
  <script src="<?= PLUGINS ?>/tinymce/tinymce.min.js" referrerpolicy="origin"></script>


  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <div id="contenedor_carga">
    <div id="carga"></div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between logo">
        <img src="<?= get_logo() ?>" alt="">
        <span class="d-none d-lg-block">MPM</span>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center p-4" href="#" data-bs-toggle="dropdown">
            <img style="width:41px; height:43px; object-fit:cover;" class="rounded-circle" src="<?= PERFIL; ?>/<?php echo $_SESSION['fotoPerfil']; ?>" alt="Profile">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION["nombre"]; ?> <?= $_SESSION["apellido"]; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $_SESSION["nombre"] ?> <?= $_SESSION["apellido"] ?></h6>
              <span><?= $_SESSION["correo"]  ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url ?>/Dashboard">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url ?>/Logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Salir</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <?php require_once "nav.php"; ?>