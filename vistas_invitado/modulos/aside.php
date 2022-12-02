  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="../vistas/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Tienda Abarrotes</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a style="cursor: pointer;" class="nav-link active"
                          onclick="CargarContenido('dashboard.php', 'content-wrapper')">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Tablero Principal
                              <span class="right badge badge-danger"></span>
                          </p>
                      </a>
                  </li> 
                  <li class="nav-item">
                      <a style="cursor:  pointer;" class="nav-link"
                          onclick="CargarContenido('acerca_nosotros.php', 'content-wrapper')">
                          <i class="nav-icon fas fa-coins"></i>
                          <p>
                              Acerca de nosotros
                          </p>
                      </a>
                  </li>                                
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>

  <script>
$(".nav-link").on('click', function() {
    $(".nav-link").removeClass('active');
    $(this).addClass('active');
})
  </script>