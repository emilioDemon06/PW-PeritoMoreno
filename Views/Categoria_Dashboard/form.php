                    <input type="hidden" name="id" id="id" value="<?php if(!empty($categoria)){echo $categoria->ID;}else{echo "";}  ?>">
    
                      <fieldset class="m-3">  
                        <div class="row mb-3 justify-content-center">
                          <div class="col-sm-6 form-group">
                            <label for="inputText" class="col-form-label">Nombre</label>
                            <input type="text" name="nombre" id="name" class="form-control" value="<?php if(!empty($categoria)){echo $categoria->Nombre;}else{echo "";}  ?>">
                          </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                          <div class='col-sm-12'>
                            <p class="form__input-error"></p>
                          </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                          <div class="col-sm-6 form-group">
                            <label for="inputText" class="col-form-label">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="<?php if(!empty($categoria)){echo $categoria->Descripcion;}else{echo "";}  ?>">
                          </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                          <div class='col-sm-12'>
                            <p class="form__input-error"></p>
                          </div>
                        </div>
                    </fieldset>  
                    <div id="respuesta">
                          
                    </div>