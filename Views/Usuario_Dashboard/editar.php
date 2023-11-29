<?php header_dashboard($data); ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url ?>/Dashboard">Home</a></li>
          <li class="breadcrumb-item active"><a href="<?= base_url ?>/Usuario_Dashboard"><?php  echo $data["page_principal"]; ?></a></li>
          <li class="breadcrumb-item active"><?php  echo $data["page_name"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          
          <div class="card">
            <div class="card-body">
              <a class="btn btn-success" href="<?= base_url ?>/Usuario_Dashboard" role="button"><?= SITE_ICON_REPLY ?>Lista Usuario</a>
              
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2">
                  <?= Alertas::mostrarAlerta(); ?>
                 
                </div>
              </div>
            </div>


                <h5 class="card-title">Edite el Usuario:</h5>

                  <!-- General Form Elements -->
                  <form action="<?= base_url ?>/Usuario_Dashboard/store" method="POST" class="needs-validation" novalidate>


                    <?php include_once 'form.php'; ?>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </form><!-- End General Form Elements -->
            </div>
          </div>

         

          

        </div>      
      </div>
    </section>

  </main><!-- End #main -->

 <?php footer_dashboard($data); ?>