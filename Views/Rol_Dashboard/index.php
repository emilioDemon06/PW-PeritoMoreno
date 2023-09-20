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
       
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <!-- Table with stripped rows -->
              <table id="tableRol" class="display table nowrap responsive">
                <thead>
                  <tr>
                    <th scope="col"># ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
              <tbody>
                      
              </tbody>
            </table>
              <!-- End Table with stripped rows -->
          </div>


      </div>
    </section>

  </main><!-- End #main -->

<?php footer_dashboard($data); ?>