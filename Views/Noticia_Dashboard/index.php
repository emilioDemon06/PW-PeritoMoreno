<?php header_dashboard($data); ?>
  


  <main id="main" class="main">
 
     <div class="pagetitle">
       <h1>Dashboard</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item"><a href="<?php echo base_url ?>/Noticia_Dashboard">Home</a></li>
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
                 <a class="btn btn-primary" href="<?= base_url ?>/Noticia_Dashboard/nuevo" role="button"><?= SITE_ICON_NEW ?>Nueva Noticia</a>
               <?php endif; ?>
               
               <?php if($_SESSION["login"]): ?>
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-2">
                     <?= Alertas::mostrarAlerta(); ?>
                      <div id="resp">
 
                      </div>
                   </div>
                 </div>
               </div>
              <?php endif; ?>
 
               <h5 class="card-title">Listado de Noticias</h5>
               <div class="container-fluid">
                 <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                   <!-- Table with stripped rows -->
                   <table id="tableNoticia" class="display table responsive">
                     <thead>
                       <tr>
                         <th scope="col"># ID</th>
                         <th scope="col">Titulo</th>
                         <th scope="col">Copete</th>
                         <th scope="col">Contenido</th>
                         <th scope="col">Fecha</th>
                         <th scope="col">Categoria</th>
                         <th scope="col">Autor</th>
                         <th scope="col">Acciones</th>
                       </tr>
                     </thead>
                     <tbody>
                       
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