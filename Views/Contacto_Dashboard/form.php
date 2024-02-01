                    <input type="hidden" name="id" id="id" value="<?php if(!empty($contacto)){echo $contacto->ID;}else{echo "";}  ?>">
                    
                    <div class="row mb-3">
                      <label for="nombre" class="col-sm-3 col-form-label">Nombre y Apellido</label>
                      <div class="col-sm-9">
                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php if(!empty($contacto)){echo $contacto->Nombre;}else{echo "";}  ?>">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Sector de Trabajo:</label>
                      <div class="col-sm-10">
                            <select class="form-select" name="sector" aria-label="Default select example">
                                <?php if (empty($contacto)) :?>
                                    <option selected value="">Ninguno</option>
                                    <?php foreach ($sectores as $sector) : ?>
                                        <option value="<?= $sector->ID; ?>"><?= $sector->Lugar; ?></option>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <option selected value="<?php if(isset($contacto->ID_Sector)){ echo $contacto->ID_Sector;}else{ echo "";} ?>"><?php if(isset($contacto->ID_Sector)){ echo $contacto->ID_Sector;}else{ echo "Ninguno";} ?></option>
                                    <?php foreach ($sectores as $sector) : ?>
                                        <option value="<?= $sector->ID; ?>"><?= $sector->Lugar; ?></option>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" name="email" id="email" class="form-control" value="<?php if(!empty($contacto)){echo $contacto->Correo;}else{echo "";}  ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="facebook" class="col-sm-3 col-form-label">Facebook</label>
                      <div class="col-sm-9">
                        <input type="text" name="facebook" id="pfacebook" class="form-control" value="<?php if(!empty($contacto)){echo $contacto->Facebook;}else{echo "";}  ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="instagram" class="col-sm-3 col-form-label">Instagram</label>
                      <div class="col-sm-9">
                        <input type="text" name="instagram" id="instagram" class="form-control" value="<?php if(!empty($contacto)){echo $contacto->Facebook;}else{echo "";}  ?>">
                      </div>
                    </div>


                    <div id="respuesta">
                      
                    </div>