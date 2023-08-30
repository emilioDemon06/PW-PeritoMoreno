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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Listado de Usuarios</h5>
              <p> Listado de las Usuarios, puedes ingresar un nuevo <strong>usuario</strong> en el boton: 
                <!--<button type="button" class="btn btn-primary"><?= SITE_ICON_NEW ?>Ingresar</button></p>-->

              <!-- Disabled Backdrop Modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><?= SITE_ICON_NEW ?>
                Ingresar
              </button>

            <!--
            ##############################
                  Modal Agregar Usuario
            ##############################
            -->
            <div class="modal fade" id="basicModal" tabindex="-1" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title"><?= $data["page_name"];?></h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    

                  <div class="modal-body">
                    <h5 class="card-title">Agregue un Usuario:</h5>
                    <!-- General Form Elements -->
                      <form  method="POST" id="form_users" class="needs-validation" novalidate>



                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-3 col-form-label">Nombre</label>
                          <div class="col-sm-9">
                            <input type="text" name="nombre" id="name" class="form-control">
                          </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                          <div class='col-sm-12'>
                            <p class="form__input-error"></p>
                          </div>
                        </div>




                        <div class="row mb-3">
                          <label for="inputEmail" class="col-sm-3 col-form-label">Correo</label>
                          <div class="col-sm-9">
                            <input type="email" name="correo" id="email" class="form-control">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
                          <div class="col-sm-9">
                            <input type="password" name="password" id="password" class="form-control">
                          </div>
                        </div>

                        <div id="respuesta">
                          
                        </div>


                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button onclick="agregarUsers();" type="button" class="btn btn-primary">Guardar</button>
                        </div>
                      
                      </form><!-- End General Form Elements -->
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
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>28</td>
                    <td>2016-05-25</td>
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
                    <td>Developer</td>
                    <td>35</td>
                    <td>2014-12-05</td>
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
                    <td>Finance</td>
                    <td>45</td>
                    <td>2011-08-12</td>
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
                    <td>HR</td>
                    <td>34</td>
                    <td>2012-06-11</td>
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
                    <td>Dynamic Division Officer</td>
                    <td>47</td>
                    <td>2011-04-19</td>
                    <td>
                          <button type="button" class="btn btn-success"><i class="bi bi-check-circle"></i></button>
                    </td>
                    <td>
                          <button type="button" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                    </td>
                  </tr>
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