  <?php header_dashboard($data); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#main">Home</a></li>
          <li class="breadcrumb-item active"><?php echo $data["page_name"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <?php foreach($usersInfo as $user) : ?>
        <!-- Cards -->
        <div class="col-xl-4">
          <div class="card">

            <div class="card-header profile-card d-flex flex-row align-items-center">
              <img src="<?= PERFIL ?>/<?php echo $user->FotoPerfil; ?>" alt="Profile" class="rounded-circle" style="width:18%;">
              <div class=" w-100 px-2 d-flex flex-column align-items-start">
                <h6>Nombre: <?= $user->Nombre; ?></h6>
                <?php if ($user->ID_Rol == 1 ):?>
                  <h6>Rol: Sistema</h6>
                <?php else : ?>
                  <h6>Rol: <?= $user->NombreRol; ?></h6>
                <?php endif; ?>
              </div>
            </div>

            <div class="card-body">
              <ul class="list-group list-group-flush" style="font-size: .8rem;">
                <li class="list-group-item"><span>Nombre y Apellido: </span><?php echo $user->Nombre." ".$user->Apellido; ?></li>
                <?php if($user->ID_Rol == 1) :?>
                  <li class="list-group-item"><span>Email: </span>carloseb_90@hotmail.com</li>
                  <li class="list-group-item"><span>Celular: </span><?php echo $user->Telefono; ?></li>
                  <li class="list-group-item"><span>Sector de trabajo: </span><?php echo $user->Lugar; ?></li>
                  <li class="list-group-item"><span>Dirección de trabajo: </span><?php echo $user->Calle; ?> N° <?php echo $user->Altura; ?></li>
                <?php else: ?>  
                  <li class="list-group-item"><span>Email: </span><?php echo $user->Correo; ?></li>
                  <li class="list-group-item"><span>Celular: </span><?php echo $user->Telefono; ?></li>
                  <li class="list-group-item"><span>Sector de trabajo: </span><?php echo $user->Lugar; ?></li>
                  <li class="list-group-item"><span>Dirección de trabajo: </span><?php echo $user->Calle; ?> N° <?php echo $user->Altura; ?></li>
                <?php endif; ?>
              </ul>
            </div>


            <div class="card-footer d-flex justify-content-center align-items-center">

              <div class="social-links mt-2">
                <?php if (!empty($user->Facebook)) : ?>
                  <a href="<?php echo $user->Facebook;?>" class="facebook m-1" target="_blank"><i class="bi bi-facebook fs-5"></i>
                  </a>
                <?php else : ?>
                  <div class="my-4"></div>
                <?php endif; ?>
                <?php if (!empty($user->Instagram)) : ?>
                  <a href="<?php echo $user->Instagram; ?>" class="instagram m-1" target="_blank"><i class="bi bi-instagram fs-5"></i>
                  </a>
                <?php endif; ?>
              </div>
            </div>


          </div>
        </div>
        
        <?php endforeach; ?>


      </div>
    </section>

  </main><!-- End #main -->

  <?php footer_dashboard($data); ?>