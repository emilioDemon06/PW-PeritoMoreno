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
            
            <?php echo Alertas::mostrarAlerta(); ?>  

            <h5 class="card-title">Agregue un Usuario:</h5>
            <!-- General Form Elements -->
            <form  method="POST" id="form_nuevo" class="needs-validation" novalidate>


                  	<div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Roles</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="rol" aria-label="Default select example">
                              	<?php for($i = 0; $i < count($data["roles"]);$i++) : ?>
                                <option value="<?= $data["roles"][$i]["ID"]; ?>"><?= $data["roles"][$i]["Nombre"]; ?></option>
                              	<?php endfor ?>
                            </select>
                        </div>
                    </div>



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
                          <button onclick="nuevo();" type="button" class="btn btn-primary">Guardar</button>
                        </div>
                      
            </form><!-- End General Form Elements -->                    
        </div>
      </div>
    </section>

  </main><!-- End #main -->

 <?php footer_dashboard($data); ?>