<?php header_dashboard($data); ?>
  
        <main id="main" class="main">

          <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active"><?= $data["page_name"]; ?></li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section">
            <div class="row">
              <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Ingresa Nueva Noticia</h5>

                    <!-- General Form Elements -->
                    <form>
                      <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Titulo</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" style="height: 100px"></textarea>
                        </div>
                      </div>




                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Imagen Principal</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="file" id="formFile">
                        </div>
                      </div>


                      <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Fecha</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control">
                        </div>
                      </div>

                     


                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Categoria</label>
                        <div class="col-sm-10">
                          <select class="form-select" aria-label="Default select example">
                            <option selected>Eligue Categoria</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                      </div>


                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Autor</label>
                        <div class="col-sm-10">
                          <select class="form-select" aria-label="Default select example">
                            <option selected>Eligue Autor</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                      </div>



                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">Contenido de la Noticia</h5>
                          <div class="quill-editor-full">
                            <p>Ingresa aquí el <strong>contenido</strong> de la noticia!</p>
                          </div>
                          <!-- End Quill Editor Full -->

                        </div>
                      </div>




                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Agregar Noticia</label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
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