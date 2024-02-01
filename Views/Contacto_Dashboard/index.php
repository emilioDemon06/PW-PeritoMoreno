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

    <section class="section container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="card-body">
                
               
                



                <div class="container-fluid">
                  <div class="row">
                    
                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Usuarios</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contactos</button>
                      </li>
                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                      
                      <!-- HOME -->
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        
                      <h5 class="card-title">Datos personales de usuarios y contactos</h5>
                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Usuarios
                              </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                              </div>
                            </div>
                          </div>
                          <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Contactos Personales
                              </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                              </div>
                            </div>
                          </div>     
                        </div><!-- End Default Accordion Example --> 
                        
                        
                      </div>
                      
                      <!-- Usuarios -->
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        
                      <div class="container-fluid">
                        <div class="row">

                          <?php foreach($usersInfo as $user) : ?>
                          <!-- Cards -->
                            <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                              <?php if($user->ID == 1): ?>
                              <div class="card border border-primary">
                              <?php else: ?>
                              <div class="card">
                              <?php endif; ?>
                                <div class="card-header profile-card d-flex flex-row align-items-center justify-content-center">
                                  <img src="<?= PERFIL ?>/<?php echo $user->FotoPerfil; ?>" alt="Profile" class="rounded-circle" style="width:30%;">
                                  
                                </div>
            
                                <div class="card-body ">
                                  <ul class="list-group list-group-flush" style="font-size: .8rem;">
                                    <li class="list-group-item"><span class="fw-medium">Nombre y Apellido: </span><?php echo $user->Nombre." ".$user->Apellido; ?></li>
                                    <?php if($user->ID_Rol == 1) :?>
                                      <li class="list-group-item"><span class="fw-medium">Rol: </span> Sistema</li>
                                      <li class="list-group-item"><span class="fw-medium">Email: </span><a href="mailto:carloseb_90@hotmail.com" target="_blank">carloseb_90@hotmail.com</a></li>
                                      <li class="list-group-item"><span class="fw-medium">Celular: </span><a href="https://api.whatsapp.com/send?phone=<?php echo $user->Telefono; ?>" target="_blank"><?php echo $user->Telefono; ?></a></li>
                                      <li class="list-group-item"><span class="fw-medium">Sector de trabajo: </span><?php echo $user->Lugar; ?></li>
                                      <li class="list-group-item"><span class="fw-medium">Dirección de trabajo: </span><?php echo $user->Calle; ?> N° <?php echo $user->Altura; ?></li>
                                      <li class="list-group-item"><span class="fw-medium">Facebook: </span><a href="<?php echo $user->Facebook; ?>" target="_blank" rel="noopener noreferrer"><?php echo $user->Facebook; ?></a></li>
                                      <li class="list-group-item"><span class="fw-medium">Instagram: </span><a href="<?php echo $user->Instagram; ?>" target="_blank" rel="noopener noreferrer"><?php echo $user->Instagram; ?></a></li>
                                    <?php else: ?>
                                      <li class="list-group-item"><span class="fw-medium">Rol: </span>  <?= $user->NombreRol; ?></li>  
                                      <li class="list-group-item"><span class="fw-medium">Email: </span><a href="mailto:<?php echo $user->Correo; ?>" target="_blank"><?php echo $user->Correo; ?></a></li>
                                      <li class="list-group-item"><span class="fw-medium">Celular: </span><a href="https://api.whatsapp.com/send?phone=<?php echo $user->Telefono; ?>" target="_blank"><?php echo $user->Telefono; ?></a></li>
                                      <li class="list-group-item"><span class="fw-medium">Sector de trabajo: </span><?php echo $user->Lugar; ?></li>
                                      <li class="list-group-item"><span class="fw-medium">Dirección de trabajo: </span><?php echo $user->Calle; ?> N° <?php echo $user->Altura; ?></li>
                                      <li class="list-group-item"><span class="fw-medium">Facebook: </span><a href="<?php echo $user->Facebook; ?>" target="_blank" rel="noopener noreferrer"><?php echo $user->Facebook; ?></a></li>
                                      <li class="list-group-item"><span class="fw-medium">Instagram: </span><a href="<?php echo $user->Instagram; ?>" target="_blank" rel="noopener noreferrer"><?php echo $user->Instagram; ?></a></li>
                                    <?php endif; ?>
                                  </ul>
                                </div>
            
                                  
            
            
                              </div>
                            </div>

                          <?php endforeach; ?>
                        </div>
                      </div>

                      </div><!-- End Usuarios -->

                      <!-- Contactos -->
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                          
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-xl-12 ">
                                
                                <!--Permisos en Boton Crear-->
                                <?php if(Permisos::create()): ?>
                                  <a class="btn btn-primary" href="<?= base_url ?>/Contacto_Dashboard/nuevo" role="button"><?= SITE_ICON_NEW ?>Nuevo Contacto</a>
                                <?php endif; ?>

                              </div>
                            </div>
                          </div>
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2">
                                <?= Alertas::mostrarAlerta(); ?>
                                  <div id="resp">
            
                                  </div>
                              </div>
                            </div>
                          </div>

                          <!--  card de Contactos -->
                          <div class="container-fluid">
                            <div class="row">
                            
                              <?php foreach($contactos as $contacto) : ?>
                              <!-- Cards -->
                                <div class="col-xl-6 col-md-6 col-sm-12 col-xs-12">
                                  <div class="card">
                
                                    <div class="card-header profile-card d-flex flex-row align-items-center justify-content-center">
                                      <div class="fs-5"><span class="fw-medium">Nombre y Apellido: </span><?php echo $contacto->Nombre; ?></div>
                                    </div>
                                    
                                    

                                    <div class="card-body">
                                      <ul class="list-group list-group-flush" style="font-size: .8rem;">
                                        
                                        <li class="list-group-item"><span class="fw-medium">Sector de trabajo: </span><?php echo $contacto->Lugar; ?></li>
                                        <li class="list-group-item"><span class="fw-medium">Direccion: </span><?php echo $contacto->Direccion; ?></li>
                                        <li class="list-group-item"><span class="fw-medium">Celular: </span><a href="https://api.whatsapp.com/send?phone=<?php echo $contacto->Telefono; ?>" target="_blank"><?php echo $user->Telefono; ?></a></li>
                                        <li class="list-group-item"><span class="fw-medium">Email: </span><a href="mailto:<?php echo $contacto->Correo; ?>" target="_blank"><?php echo $contacto->Correo; ?></a></li>
                                        <li class="list-group-item"><span class="fw-medium">Facebook: </span><a href="<?php echo $contacto->Facebook; ?>" target="_blank" rel="noopener noreferrer"><?php echo $contacto->Facebook; ?></a></li>
                                        <li class="list-group-item"><span class="fw-medium">Instagram: </span><a href="<?php echo $contacto->Instagram; ?>" target="_blank" rel="noopener noreferrer"><?php echo $contacto->Instagram; ?></a></li>
                                        <li class="list-group-item"><span class="fw-medium">Dirección de trabajo: </span><?php echo $contacto->Calle; ?> N° <?php echo $contacto->Altura; ?></li>
                                      </ul>
                                    </div>
                
                
                                    <div class="card-footer d-flex justify-content-center align-items-center">
                
                                      <div class="social-links mt-2">
                                        <a type='button' class='editarfnt btn btn-sm me-1 btn-edit text-light' href="<?= base_url ?>/Contacto_Dashboard/editar/<?php echo $contacto->ID; ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Editar"><?php echo ICON_EDITAR; ?></a>
                                        <button id="ContactoData" data-idcontacto='<?= $contacto->ID; ?>' data-namecontacto='<?= $contacto->Nombre; ?>' type='button' class='btn btn-danger btn-sm' onclick="eliminarFnt(this)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Eliminar"><?php echo ICON_ELIMINAR; ?></button>
                                      </div>
                                    </div>
                
                
                                  </div>
                                </div>

                              <?php endforeach; ?>




                            </div>
                          </div>






                      </div><!-- End Contactos -->
                      
                    </div><!-- End Default Tabs -->



                    


                  </div>
                </div>


          </div>   
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <?php footer_dashboard($data); ?>