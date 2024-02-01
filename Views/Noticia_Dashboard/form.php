                    <input type="hidden" name="id" id="id" value="<?php if(empty($noticia)){echo "";}else{echo $noticia->ID;}  ?>">
                    
                    <div class="row mb-3">
                        <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                        <div class="col-sm-10 form-input-not">
                          <textarea name="titulo" id="titulo" class="form-control form-text" style="height: 100px"><?php if(empty($noticia)){echo "";}else{echo $noticia->Titulo;} ?></textarea>
                          <div id="msgTitulo" class=""></div>
                        </div>
                    </div>

                      <div class="row mb-3">
                        <label for="copete" class="col-sm-2 col-form-label">Copete</label>
                        <div class="col-sm-10 form-input-not">
                          <textarea name="copete" id="copete" class="form-control form-text" style="height: 100px"><?php if(empty($noticia)){echo "";}else{ echo $noticia->Copete;} ?></textarea>
                          <div id="msgCopete" class=""></div>
                        </div>
                      </div>

                      <!--enviando imagen de perfil del usuario a javascript-->
                      <script>
                         var imgDefault = "<?php echo IMAGE_NOTICIA ?>/<?php echo SITE_PLACEHOLDER; ?>";
                      </script>

                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Imagen Principal</label>
                        <div class="col-md-8 col-xs-8 col-lg-9 form-input-not">
                            <img class="img-thumbnail" id="img-not" src="<?php if(empty($noticia->Imagen)){echo IMAGE_NOTICIA."/".SITE_PLACEHOLDER;}else{echo IMAGE_NOTICIA . "/" . $noticia->Imagen;}  ?>" style="width:230px; height:170px; object-fit:cover;" alt="Profile">
                            <div class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 pt-2">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                  <label for="img-noticia" class="btn btn-primary btn-md" title="Subir una nueva imagen"><i class="bi bi-upload"></i></label>
                                </div>
                                <input class="d-none form-text" type="file" name="img-noticia" id="img-noticia">
                                <div id="msgFile" class=""></div>
                                <p class="text-wrap text-success" style="font-size: .8em;">
                                    * La extensión del archivo debe ser .jpeg/.jpg/.png/.gif.
                                </p>
                            </div>
                        </div>
                      </div>


                      <div class="row mb-3">
                        <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                        <div class="col-sm-10">
                          <input name="fecha" id="fecha" type="date" class="form-control form-text" value="<?php if(empty($noticia)){echo "";}else{ echo $noticia->Fecha;} ?>">
                          <div id="msgFecha" class=""></div>
                        </div>
                      </div>

                     


                      <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Categorias</label>
                            <div class="col-sm-10 ">
                                <select class="form-select " name="categoria" id="categoria" aria-label="Default select example">
                                    <?php if (empty($noticia)) :?>
                                      <option selected disabled value="">Seleccione categoria</option>
                                    	<?php foreach ($categorias as $categoria): ?>
                                      <option value="<?= $categoria->ID; ?>"><?= $categoria->Nombre; ?></option>
                                    	<?php endforeach ?>
                                    <?php else :?>
                                      <option selected value="<?php echo $noticia->ID_Categoria?>"><?php echo $noticia->Categoria ?></option>
                                      <?php foreach ($categorias as $categoria): ?>
                                      <option value="<?= $categoria->ID; ?>"><?= $categoria->Nombre; ?></option>
                                      <?php endforeach ?>
                                    <?php endif; ?>  
                                </select>
                                <div id="msgCategoria" class=""></div>
                            </div>
                        </div>


                      <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Autores</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="autor" id="autor" aria-label="Default select example">
                                    <?php if (empty($noticia)) :?>
                                      <option selected disabled value="">Seleccione autor</option>
                                    	<?php foreach ($autores as $autor): ?>
                                      <option value="<?= $autor->ID; ?>"><?= $autor->Nombre; ?></option>
                                    	<?php endforeach ?>
                                    <?php else :?>
                                      <option selected value="<?php echo $noticia->ID_Autor?>"><?php echo $noticia->Autor ?></option>
                                      <?php foreach ($autores as $autor): ?>
                                      <option value="<?= $autor->ID; ?>"><?= $autor->Nombre; ?></option>
                                      <?php endforeach ?>
                                    <?php endif; ?>  
                                </select>
                                <div id="msgAutor" class=""></div>
                            </div>
                        </div>



                      <div class="row mb-3">
                        <label for="noticia" class="col-sm-2 col-form-label">Noticia</label>
                        <div class="col-sm-10 form-input-not">
                          <textarea class="form-control form-text" name="noticia" id="noticia"><?php if(empty($noticia)){echo "";}else{echo $noticia->Contenido;} ?></textarea>
                          <div id="msgNoticia" class=""></div>
                        </div>
                      </div>

