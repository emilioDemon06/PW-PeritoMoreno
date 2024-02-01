  <?php header_dashboard($data); ?>
  


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url ?>/Categoria_Dashboard">Home</a></li>
          <li class="breadcrumb-item active"><?php  echo $data["page_name"]; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section container-fluid">
       <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
 
           <div class="card">
             <div class="card-body">
               <!--Permisos en Boton Crear-->
               <?php if(Permisos::create()): ?>
                 <a class="btn btn-primary" href="<?= base_url ?>/Categoria_Dashboard/nuevo" role="button"><?= SITE_ICON_NEW ?>Nueva categoria</a>
               <?php endif; ?>
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2">
                     <?= Alertas::mostrarAlerta(); ?>
                      <div id="resp">
 
                      </div>
                   </div>
                 </div>
               </div>
 
 
               <h5 class="card-title">Listado de Categorias</h5>
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <!-- Table with stripped rows -->
                   <table id="table" class="display table nowrap responsive">
                     <thead>
                       <tr>
                         <th scope="col"># ID</th>
                         <th scope="col">Nombre</th>
                         <th scope="col">Descripción</th>
                         <th scope="col">Acciones</th>
                       </tr>
                     </thead>
                     <tbody>
                     <?php foreach ($categorias as $categoria) : ?>
                        <tr>
                          <td><?php echo $categoria->ID; ?></td>
                          <td><?php echo $categoria->Nombre; ?></td>
                          <td><?php echo $categoria->Descripcion; ?></td>
                          <!--Acciones-->
                          <td>
                            <a type='button' class='editarfnt btn btn-edit btn-sm me-1 ' href="<?= base_url ?>/Categoria_Dashboard/editar/<?= $categoria->ID; ?>" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="Editar"><?php echo ICON_EDITAR; ?></a>
                            <button id="rolData" data-idcategoria='<?= $categoria->ID; ?>' data-namecategoria='<?= $categoria->Nombre; ?>' type='button' class='btn btn-danger btn-sm' onclick="eliminarFnt(this)" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Eliminar"><?php echo ICON_ELIMINAR; ?></button>
                            
                          </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
                </div>
              </div>
            </div>
 
 
 
 
          </div>
        </div>
 
      </div>      
    </div>
  </section>

</main><!-- End #main -->

<?php footer_dashboard($data); ?>
