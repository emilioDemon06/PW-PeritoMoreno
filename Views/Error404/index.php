<!DOCTYPE html>
<html lang="<?= SITE_LANG ?>">

<head>
  <meta charset="<?= SITE_CHARSET ?>">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $data["page_title"];?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <?= get_favicon() ?>
  <link href="<?= IMAGE ?>/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= CSS ?>/bootstrap.min.css" rel="stylesheet">
  <link href="<?= CSS ?>/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= CSS ?>/boxicons/boxicons.min.css" rel="stylesheet">
  <link href="<?= CSS ?>/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= CSS ?>/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= CSS ?>/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= CSS ?>/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= ASSETS ?>/app/css/style-error404.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main class="error404-fondo">
    <div class="container">

      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1 class="error-name"><?php echo $data["page_name"];?></h1>
        <h2>La página que buscas no existe.</h2>
        <a class="btn" href="<?= base_url?>">Regresar a Inicio</a>
        <img src="<?= IMAGE ?>/not-found.svg" class="img-fluid" alt="Page Not Found">
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
          Designed by <a href="<?= base_url ?>/Home">Municipalidad Perito Moreno</a>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= JS ?>/apexcharts/apexcharts.min.js"></script>
  <script src="<?= JS ?>/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?= JS ?>/chart.js/chart.umd.js"></script>
  <script src="<?= JS ?>/echarts/echarts.min.js"></script>
  <script src="<?= JS ?>/quill/quill.min.js"></script>
  <script src="<?= JS ?>/simple-datatables/simple-datatables.js"></script>
  <!--<script src="<?php echo media(); ?>/js/tinymce/tinymce.min.js"></script>-->
  <script src="<?= JS ?>/php-email-form/validate.js"></script>

  

</body>

</html>