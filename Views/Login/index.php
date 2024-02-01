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


  <!-- Template Main CSS File -->
  <link href="<?= ASSETS ?>/app/css/style-login.css" rel="stylesheet">



</head>

<body>

  <main class="login">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center ">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-2">
                <a href="<?= base_url ?>/Home" class="logo d-flex align-items-center w-auto link-underline-light">
                  <img  class="logo-img pe-2" src="<?= get_logo() ?>" alt="">
                  <span class="d-none d-lg-block"><?php echo $data["page_name"];  ?></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"><?php echo $data["page_sesion"];  ?></h5>
                    <p class="text-center small">Ingrese su email y contraseña para iniciar sesión</p>
                  </div>

                  <form  method="POST" id="form_login" class="row g-3 needs-validation" novalidate>

                    <div class="col-12 form-input">
                      <label for="yourUsername" class="form-label">Email:</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="emailname" class="form-box form-control" id="yourEmail" placeholder="ejemplo@email.com">
                        <div id="msgEmail" class="invalid-feedback"></div>
                        <!--<div id="msgEmail" class="valid-feedback">Excelente! Por favor ingrese su email!</div>-->   
                      </div>
                    </div>

                    <div class="col-12 form-input" >
                      <label for="yourPassword" class="form-label">Contraseña:</label>
                      <input type="password" name="password" class="form-box form-control" id="yourPassword" >
                      <div id="msgpass" class="was-validated invalid-feedback"></div>
                    </div>

                    
                    <div class="col-12">
                      <p class="text-center small">Si olvido su contraseña o se bloqueo su cuenta, diríjase al área informática.</p>
                      <p class="text-center small">Recuerde que solamente tiene 3 intentos fallidos.</p>
                    </div>
                    
                    
                    <div class="col-12">
                      <div id="userErr"></div>
                      <div id="passErr"></div>
                      <div id="respSuccess">
                      <?php echo Alertas::mostrarAlerta(); ?> 
                      </div>
                      <div id="respDanger">
                        <?php echo Alertas::mostrarAlerta(); ?> 
                      </div>
                    </div>
                    

                    <div class="col-12">
                      <button id="submit-btn" class="btn btn-primary w-100" type="submit">Entrar</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                Designed by <a id="credit" href="<?= base_url ?>/Home">Municipalidad Perito Moreno</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= JS ?>/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="<?= JS ?>/bootstrap/bootstrap.min.js"></script>
  
  <script src="<?= JS ?>/php-email-form/validate.js"></script>
  
  <!-- constante js -->
    <script>
      const base_url = "<?= base_url; ?>";
  </script>
  <script src="<?= ASSETS ?>/app/js/<?= $data['function_js'];?>"></script>


</body>

</html>