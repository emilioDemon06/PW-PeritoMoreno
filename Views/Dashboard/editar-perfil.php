<div class="tab-pane fade profile-edit pt-3" id="profile-edit">



    <!-- Profile Edit Form -->
    <form action="<?php echo base_url; ?>/Dashboard/edit_user" method="POST" id="edit-perfil" enctype="multipart/form-data">

        <!--enviando imagen de perfil del usuario a javascript-->
        <script>
            var defaultImg = "<?php echo PERFIL ?>/<?php echo $usersInfo->FotoPerfil; ?>";
        </script>
        <input type="hidden" name="iduser" id="iduser" value="<?php echo $usersInfo->ID; ?>">

        <div class="row mb-3">
            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Perfil de Imagen</label>
            <div class="col-md-8 col-lg-9 form-input-edit">
                <img class="img-thumbnail rounded-circle" id="image" src="<?= PERFIL ?>/<?php echo $usersInfo->FotoPerfil; ?>" style="width:80px; height:80px; object-fit:cover;" alt="Profile">
                <div class="pt-2">
                    <label for="img-perfil" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></label>
                    <button id="borrar" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></button>
                    <input class="d-none" type="file" name="img-perfil" id="img-perfil">
                    <div id="msgFile" class=""></div>
                    <p class="text-wrap text-success" style="font-size: .8em;">
                        * La extensión del archivo debe ser .jpeg/.jpg/.png/.gif.
                    </p>
                </div>
            </div>
        </div>



        <div class="row mb-3">
            <div class="col-md-12 col-lg-12 form-input-edit">
                <label for="name" class="col-form-label">Nombre:</label>
                <input name="nombre" type="text" class="form-control border-primary-subtle" id="name" value="<?= $usersInfo->Nombre; ?>">
                <div id="msgNombre" class="col-md-8 col-lg-9"></div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 col-lg-12 form-input-edit">
                <label for="apellido" class="col-form-label">Apellido:</label>
                <input name="apellido" type="text" class="form-control border-primary-subtle" id="apellido" value="<?= $usersInfo->Apellido; ?>">
                <div id="msgApellido" class="col-md-8 col-lg-9"></div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 col-lg-12">
                <label class="col-form-label">Sector de Trabajo:</label>
                <select class="form-select" name="rol" aria-label="Default select example">
                    <?php if (empty($usersInfo->Lugar)) : ?>
                        <option selected value="">Seleccione el Sector</option>
                        <?php foreach ($infoSector as $sector) : ?>
                            <option value="<?= $sector->ID; ?>"><?= $sector->Lugar; ?></option>
                        <?php endforeach ?>
                    <?php else : ?>
                        <option selected value="<?php echo $usersInfo->Lugar; ?>"><?php echo $usersInfo->Lugar; ?></option>
                        <?php foreach ($infoSector as $sector) : ?>
                            <option value="<?= $sector->Lugar; ?>"><?= $sector->Lugar; ?></option>
                        <?php endforeach ?>
                    <?php endif; ?>
                </select>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12 col-lg-12 form-input-edit">
                <label for="Phone" class="col-form-label">Telefono:</label>
                <input name="phone" type="text" class="form-control border-primary-subtle" id="phone" value="<?= $usersInfo->Telefono; ?>">
                <div id="msgTel" class="col-md-8 col-lg-9"></div>
                <p class="text-wrap text-success" style="font-size: .8em;">
                    * El Telefono(celular) solamente debe contener digitos.
                </p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 col-lg-12 form-input-edit">
                <label for="Email" class="col-form-label">Email:</label>
                <input name="email" type="email" class="form-control border-primary-subtle" id="Email" value="<?= $usersInfo->Correo; ?>">
                <div id="msgEmail" class="col-md-8 col-lg-9"></div>
                <p class="text-wrap text-success" style="font-size: .8em;">
                    * ejemplo@email.com
                </p>
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-12 col-lg-12 form-input-edit">
                <label for="Facebook" class="col-form-label">Facebook:</label>
                <input name="facebook" type="text" class="form-control border-primary-subtle" id="Facebook" value="<?= $usersInfo->Facebook; ?>">
                <div id="msgFace" class="col-md-8 col-lg-9"></div>
                <p class="text-wrap text-success" style="font-size: .8em;">
                    * URL.
                </p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12 col-lg-12 form-input-edit">
                <label for="Instagram" class="col-form-label">Instagram:</label>
                <input name="instagram" type="text" class="form-control border-primary-subtle" id="Instagram" value="<?= $usersInfo->Instagram; ?>">
                <div id="msgInsta" class="col-md-8 col-lg-9"></div>
                <p class="text-wrap text-success" style="font-size: .8em;">
                    * URL.
                </p>
            </div>
        </div>


        <!-- Errores de servidor -->
        <div class="col-12">
            <div id="userErr"></div>
            <div id="passErr"></div>
            <div id="resp">
                <?php echo Alertas::mostrarAlerta(); ?>
            </div>
        </div>



        <div class="text-center">
            <button id="save-user" type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form><!-- End Profile Edit Form -->

</div>