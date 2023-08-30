  <?php header_dashboard($data); ?>
  


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active"><?php  echo $data["page_name"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">



           <!--
            ##############################
                  Modal Agregar Categoria
            ##############################
            -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Listado de Categorias</h5>
              <p> Listado de las categorias que se enuncian en una 
                <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Noticia</a>, Puedes ingresar una categoria nueva en el boton: 
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><?= SITE_ICON_NEW ?>
                Ingresar
              </button>
              </p>

              <!-- Basic Modal -->
              
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><?= $data["page_name"]; ?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  <div class="modal-body">
                    <h5 class="card-title">Ingrese una Categoria:</h5>


                    <form  method="POST" id="form_categoria" class="needs-validation" novalidate>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Categoria</label>
                        <div class="col-sm-9">
                          <input type="text" id="categ_name" name="categ_name" class="form-control" required>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button onclick="agregar();" type="button" class="btn btn-primary">Agregar</button>
                       <!-- End General Form Elements -->
                      </div>
              
                  </form>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

           <!--
            ##############################
                End  Modal Usuario
            ##############################
            -->








              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"># ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                    </td>
                  </tr>
                  

                  <tr>
                    <th scope="row">2</th>
                    <td>Bridie Kessler</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                    </td>
                  </tr>
                  

                  <tr>
                    <th scope="row">3</th>
                    <td>Ashleigh Langosh</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                    </td>
                  </tr>
                  

                  <tr>
                    <th scope="row">4</th>
                    <td>Angus Grady</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                    </td>
                  </tr>


                  <tr>
                    <th scope="row">5</th>
                    <td>Raheem Lehner</td>
                    <td>
                        <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                    </td>
                  </tr>


                </tbody>
              </table>
              

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php footer_dashboard($data); ?>
