<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= base_url?>/Dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <?php if (!empty($_SESSION['permisos'][1]['r'])) :?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-newspaper"></i><span>Noticias</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url?>/Noticia_Dashboard">
              <i class="bi bi-circle"></i><span>Noticias</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    <?php endif?>






    <?php if (!empty($_SESSION['permisos'][2]['r']))  :?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url?>/Gobierno_Dashboard">
          <i class="bi bi-bar-chart-steps"></i>
          <span>Gobierno</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    <?php endif ?>



    <?php if (!empty($_SESSION['permisos'][3]['r']))  :?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url?>/Contacto_Dashboard">
          <i class="bi bi-journals"></i>
          <span>Contactos</span>
        </a>
      </li><!-- End Contact Page Nav -->
    <?php endif ?>




    <?php if (!empty($_SESSION['permisos'][4]['r']))  :?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url?>/Usuario_Dashboard">
          <i class="bi bi-people-fill"></i>
          <span>Usuarios</span>
        </a>
      </li><!-- End Register Page Nav -->
    <?php endif ?>


    <?php if (!empty($_SESSION['permisos'][5]['r']))  :?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url?>/Categoria_Dashboard">
          <i class="bi bi-bar-chart-steps"></i>
          <span>Categoria</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->
    <?php endif ?>

    
    <?php if (!empty($_SESSION['permisos'][6]['r']))  :?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url?>/Historia_Dashboard">
          <i class="bi bi-book"></i>
          <span>Historia Perito Moreno</span>
        </a>
      </li><!-- End Error 404 Page Nav -->
    <?php endif ?>

    <?php if (!empty($_SESSION['permisos'][7]['r']))  :?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url?>/Permisos_Dashboard">
          <i class="bi bi-people-fill"></i>
          <span>Permisos Y Roles</span>
        </a>
      </li><!-- End Register Page Nav -->
    <?php endif ?>

    

    </ul>

  </aside><!-- End Sidebar-->