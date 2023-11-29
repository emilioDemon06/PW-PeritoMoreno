                      <input type="hidden" name="id" id="id" value="<?php if(!empty($rol)){echo $rol->ID;}else{echo "";}  ?>">
    
                      <fieldset class="m-3">  
                        <div class="row mb-3 justify-content-center">
                          <div class="col-sm-6 form-group">
                            <label for="inputText" class="col-form-label">Nombre</label>
                            <input type="text" name="nombre" id="name" class="form-control" value="<?php if(!empty($rol)){echo $rol->Nombre;}else{echo "";}  ?>">
                          </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                          <div class='col-sm-12'>
                            <p class="form__input-error"></p>
                          </div>
                        </div>


                        <div class="row mb-3 d-flex justify-content-center">
                          <div class="col-sm-6 form-group">
                            <label class="col-form-label">Estado</label>
                            <select class="form-select" name="is_activo" aria-label="Default select example">
                              <?php if (empty($rol)) : ?>
                                <option selected value="">Seleccione el estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
              
                              <?php elseif ($rol->is_activo == 1) : ?>
                                <option selected value="1">Activo</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                              
                              <?php elseif ($rol->is_activo == 0) : ?>
                                <option selected value="0">Inactivo</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                              <?php endif; ?>

                            </select>
                          </div>
                        </div>
                    </fieldset>  
                    <div id="respuesta">
                          
                    </div>