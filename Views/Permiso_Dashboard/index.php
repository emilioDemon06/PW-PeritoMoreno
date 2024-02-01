  <?php header_dashboard($data); ?>
  <!-- #main -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url ?>/Dashboard">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $data["page_name"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="card">
            <div class="card-body">
              <!--Boton atras a roles-->
              <a class="btn btn-success" href="<?= base_url ?>/Rol_Dashboard" role="button"><?= SITE_ICON_REPLY ?>Lista Rol</a>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2">
                    <?= Alertas::mostrarAlerta(); ?>
                    <div id="resp"></div>

                  </div>
                </div>
              </div>

              <form class="form-horizontal form-label-left" action="<?php echo base_url; ?>/Permiso_Dashboard/store" method="POST" novalidate>

                <input type="hidden" name="idRol" id="idRol" value="<?php echo $data['id_rol']; ?>">

                <!-- Table with stripped rows -->
                <table class="display table nowrap responsive w-100" >
                  <thead>
                    <tr>
                      <th scope="col"># ID</th>
                      <th scope="col">Pagina</th>
                      <th scope="col">Crear</th>
                      <th scope="col">Leer</th>
                      <th scope="col">Actualizar</th>
                      <th scope="col">Borrar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $n = 1;
                    $paginas = $data['paginas'];
                    //debug($paginas);
                    for ($i = 0; $i <  count($paginas); $i++) :
                      $accesos = $paginas[$i]['accesos'];

                      $cChecke = $accesos['c'] == 1 ? 'checked' : '';
                      $rChecke = $accesos['r'] == 1 ? 'checked' : '';
                      $uChecke = $accesos['u'] == 1 ? 'checked' : '';
                      $dChecke = $accesos['d'] == 1 ? 'checked' : '';
                      $idPage = $paginas[$i]['ID'];
   
                    ?>
                      <tr>
                        <td>
                          <?php echo $n; ?>
                          <input type="hidden" name="paginas[<?php echo $i; ?>][id]" value="<?php echo $idPage; ?>">
                        </td>
                        <td>
                          <?php echo $paginas[$i]['Titulo']; ?>
                        </td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="paginas[<?php echo $i; ?>][c]" <?php echo $cChecke; ?>>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="paginas[<?php echo $i; ?>][r]" <?php echo $rChecke; ?>>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="paginas[<?php echo $i; ?>][u]" <?php echo $uChecke; ?>>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="paginas[<?php echo $i; ?>][d]" <?php echo $dChecke; ?>>
                          </div>
                        </td>
                      </tr>

                    <?php $n++; endfor ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
                <div class="d-grid py-4">
                  <button class="btn btn-info" type="submit">Guardar permisos</button>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php footer_dashboard($data); ?>