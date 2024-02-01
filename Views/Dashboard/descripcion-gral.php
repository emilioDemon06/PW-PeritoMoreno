<div class="tab-pane fade show active profile-overview" id="profile-overview">
    

    <h5 class="card-title">detalles del perfil</h5>
    
    <div class="row">
        <div class="col-lg-4 col-md-5 label ">Nombre Completo</div>
        <div class="col-lg-8 col-md-7"><?= $usersInfo->Nombre . ", " . $usersInfo->Apellido; ?></div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 label">Lugar de Trabajo</div>
        <div class="col-lg-8 col-md-8"><?= $usersInfo->Lugar; ?></div>
    </div>


    <div class="row">
        <div class="col-lg-4 col-md-4 label">Dirección de trabajo</div>
        <div class="col-lg-8 col-md-8"><?= $usersInfo->Calle; ?> N° <?= $usersInfo->Altura; ?></div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 label">Telefono</div>
        <div class="col-lg-8 col-md-8"><?= $usersInfo->Telefono; ?></div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-4 label">Email</div>
        <div class="col-lg-8 col-md-8"><?= $usersInfo->Correo; ?></div>
    </div>

</div>