<div class="tab-pane fade pt-3" id="profile-change-password">
    <!-- Change Password Form -->
    <form action="<?php echo base_url ?>/Dashboard/edit_pass" method="POST" id="edit-pass">

        <input type="hidden" id="idUser" name="idUser" value="<?php echo $usersInfo->ID; ?>">
        <div class="row mb-3">
            <label for="Password" class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
            <div class="col-md-8 col-lg-9 form-input">
                <input name="password" type="text" class="form-control border-primary-subtle" id="Password">
                <div id="msgPass-actual" class="col-md-8 col-lg-9"></div>
                <p class="text-wrap text-success" style="font-size: .8em;">
                    * La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
                </p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva contraseña</label>
            <div class="col-md-8 col-lg-9 form-input">
                <input name="newpassword" type="password" class="form-control border-primary-subtle" id="newPassword">
                <div id="msgPass-nuevo" class="col-md-8 col-lg-9"></div>
                <p class="text-wrap text-success" style="font-size: .8em;">
                    * La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
                </p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-ingrese nueva contraseña</label>
            <div class="col-md-8 col-lg-9 form-input">
                <input name="renewpassword" type="password" class="form-control border-primary-subtle" id="renewPassword">
                <div id="msgPass-reNuevo" class="col-md-8 col-lg-9"></div>
                <p class="text-wrap text-success" style="font-size: .8em;">
                    * La contraseña debe coincidir, tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.
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
            <button id="btn-edit-pass" type="submit" class="btn btn-primary">Cambiar contraseña</button>
        </div>
    </form><!-- End Change Password Form -->

</div>