
                    <input type="hidden" name="id" id="id" value="<?php if(!empty($usuario)){echo $usuario->ID;}else{echo "";}  ?>">
                      
                      	<div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Roles</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="rol" aria-label="Default select example">
                                    <?php if (empty($usuario)) :?>
                                      <option selected value="">Seleccione el rol</option>
                                    	<?php foreach ($roles as $rol): ?>
                                      <option value="<?= $rol->ID; ?>"><?= $rol->Nombre; ?></option>
                                    	<?php endforeach ?>
                                    <?php else :?>
                                      <option selected value="<?php echo $usuario->ID_Rol?>"><?php echo $usuario->NombreRol ?></option>
                                      <?php foreach ($roles as $rol): ?>
                                      <option value="<?= $rol->ID; ?>"><?= $rol->Nombre; ?></option>
                                      <?php endforeach ?>
                                    <?php endif; ?>  
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                          <label for="inputEmail" class="col-sm-3 col-form-label">Correo</label>
                          <div class="col-sm-9">
                            <input type="email" name="correo" id="email" class="form-control" value="<?php if(!empty($usuario)){echo $usuario->Correo;}else{echo "";}  ?>">
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
                          <div class="col-sm-9">
                            <input type="password" name="password" id="password" class="form-control" value="<?php if(!empty($usuario)){echo $usuario->Password;}else{echo "";}  ?>">
                          </div>
                        </div>
                        
                        <?php if (empty($usuario)) : ?>
                            <div class="row mb-3">
                              <label for="inputPassword" class="col-sm-3 col-form-label">Re ingrese Contraseña</label>
                              <div class="col-sm-9">
                                <input type="password" name="re-password" id="re-password" class="form-control">
                              </div>
                            </div>
                        <?php endif; ?>

                        <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="is_activo" aria-label="Default select example">
                              <?php if(empty($usuario)) : ?>
                                <option selected value="">Seleccione el estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                              <?php elseif ($usuario->is_activo == 1) : ?>
                                <option selected value="1">Activo</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                              <?php elseif ($usuario->is_activo == 0) : ?>
                                <option selected value="0">Inactivo</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                              <?php endif; ?>

                            </select>
                        </div>
                      </div>

                        <div id="respuesta">
                          
                        </div>


                                              
  