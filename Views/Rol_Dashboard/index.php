  <?php header_dashboard($data); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url ?>/Rol_Dashboard">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $data["page_name"]; ?></li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="card">
            <div class="card-body">
              <!--Permisos en Boton Crear-->
              <?php if (Permisos::create()) : ?>
                <a class="btn btn-primary" href="<?= base_url ?>/Rol_Dashboard/nuevo" role="button"><?= SITE_ICON_NEW ?>Nuevo Rol</a>
              <?php endif; ?>

              <?php if($_SESSION["login"]): ?>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2">
                    <?= Alertas::mostrarAlerta(); ?>
                    <div id="resp"></div>

                  </div>
                </div>
              </div>
              <?php endif; ?>
              
              <!-- Table with stripped rows -->
              <table id="table" class="display table nowrap responsive">
                <thead>
                  <tr>
                    <th scope="col"># ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($roles as $r) : ?>
                    <tr>
                      <td></td>
                      <td><?php echo $r->Nombre; ?></td>
                      <!--Estado-->
                      <?php if ($r->is_activo == 1) : ?>
                        <td><span class='badge bg-success text-wrap'>Activo</span></td>
                      <?php else : ?>
                        <td><span class='badge bg-danger text-wrap'>Inactivo</span></td>
                      <?php endif; ?>
                      <!--Acciones-->
                      <td>
                        <a type='button' class='btn btn-info btn-sm me-1' href="<?= base_url ?>/Permiso_Dashboard/index/<?= $r->ID; ?>">Permiso</a>
                        <a type='button' class='editarfnt btn btn-sm me-1 btn-edit text-light' href="<?= base_url ?>/Rol_Dashboard/editar/<?= $r->ID; ?>" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Editar"><?php echo ICON_EDITAR; ?></a>
                        <button id="rolData" data-idrol='<?= $r->ID; ?>' data-namerol='<?= $r->Nombre; ?>' type='button' class='btn btn-danger btn-sm' onclick="eliminarFnt(this)" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Eliminar"><?php echo ICON_ELIMINAR; ?></button>
                        
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php footer_dashboard($data); ?>