<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= base_url?>/Dashboard">
          <i class="bi bi-person-bounding-box"></i>
          <span>Perfil</span>
        </a>
      </li><!-- End Dashboard Nav -->

    <?php echo Permisos::nav(); ?>    

    </ul>

  </aside><!-- End Sidebar-->