<?php header_dashboard($data); ?>
  
        <main id="main" class="main">

          <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url ?>/Contacto_Dashboard">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url ?>/Contacto_Dashboard"><?php  echo $data["page_principal"]; ?></a></li>
                <li class="breadcrumb-item active"><?= $data["page_name"]; ?></li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section">
            <div class="row">
              <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                  <a class="btn btn-success" href="<?= base_url ?>/Contacto_Dashboard"  role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Volver" title="volver"><?= SITE_ICON_REPLY ?></a>
            
                  <?php if($_SESSION["login"]): ?>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2">
                        <?= Alertas::mostrarAlerta(); ?>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>

                    <h5 class="card-title">Puede editar el contacto</h5>
                    <!-- General Form Elements -->
                    <form action="<?= base_url ?>/Contacto_Dashboard/store" method="POST">  
                      <?php include_once 'form.php'; ?>
                      <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                      </div>
                    </form><!-- End General Form Elements -->

                  </div>
                </div>

              </div>

                  </div>
                </div>

              </div>
            </div>
          </section>

        </main><!-- End #main -->

      

<?php footer_dashboard($data); ?>