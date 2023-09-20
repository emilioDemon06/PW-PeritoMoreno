  <?php header_dashboard($data); ?>
  


 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"><?php  echo $data["page_name"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Listado de Usuarios</h5>
              <p> Listado de las Usuarios, puedes ingresar un nuevo <strong>usuario</strong> en el boton: 
                <!--<button type="button" class="btn btn-primary"><?= SITE_ICON_NEW ?>Ingresar</button></p>-->

              <!-- Disabled Backdrop Modal -->
              <a class="btn btn-primary" href="<?= base_url ?>/Usuario_Dashboard/nuevo" role="button"><?= SITE_ICON_NEW ?>Agregar</a>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <!-- Table with stripped rows -->
                  <table id="tableUser" class="display table nowrap responsive">
                    <thead>
                      <tr>
                        <th scope="col"># ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
              <!-- End Table with stripped rows -->
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