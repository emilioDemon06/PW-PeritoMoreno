  <?php header_dashboard($data); ?>
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url ?>/Dashboard">Home</a></li>
          <li class="breadcrumb-item active"><?php  echo $data["page_name"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
       

        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-2 d-flex flex-column align-items-center">

              <img src="<?= PERFIL ?>/<?php echo $usersInfo->FotoPerfil; ?>" alt="Profile" class="rounded-circle" style="width:50%; height:50%; objetc-fit:cover;">
              <h5><?= $usersInfo->Nombre; ?> <?= $usersInfo->Apellido; ?></h5>
              <h3><?= $usersInfo->NombreRol ;?></h3>
              <div class="social-links mt-2">
                <a href="<?php if (empty($usersInfo->Facebook)){ echo "https://www.facebook.com/?locale=es_LA";}else{echo $usersInfo->Facebook;}?>" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                <a href="<?php if (empty($usersInfo->Instagram)){ echo "https://www.instagram.com/";}else{echo $usersInfo->Instagram;}?>" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>



        <!--=============================================
        =            Comfiguracion de perfil            =
        ==============================================-->
        


         <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Descripción general</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar perfil</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Cambiar la contraseña</button>
                </li>

              </ul>
              <div class="tab-content pt-2">
                
                <!-- Descripción general -->
                <?php require "descripcion-gral.php"; ?>

                <!-- Editar Perfil -->
                <?php require "editar-perfil.php"; ?>

                <!-- Cambiar la Contraseña -->
                <?php require "cambiar-password.php"; ?>
                
                <div id="resp">
                  <?php echo Alertas::mostrarAlerta(); ?>
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>



        
        
        <!--====  End of Comfiguracion de perfil  ====-->
        


      </div>
    </section>

  </main><!-- End #main -->

<?php footer_dashboard($data); ?>
 