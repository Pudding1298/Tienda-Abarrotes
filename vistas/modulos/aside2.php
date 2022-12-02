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
                      <a style="cursor: pointer;" class="nav-link"
                          onclick="CargarContenido('dashboard.php', 'content-wrapper')">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Tablero Principal
                              <span class="right badge badge-danger"></span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fa fa-list"></i>
                          <p>
                              Productos
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a style="cursor: pointer;" class="nav-link" href="vista_inventario.php">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Inventario
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a style="cursor: pointer;" class="nav-link"
                                  onclick="CargarContenido('stock.php', 'content-wrapper')">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>
                                      Stock
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a style="cursor: pointer;" class="nav-link" href="vista_compras.php">
                          <i class="nav-icon fa fa-cart-plus"></i>
                          <p>
                              Compras
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a style="cursor: pointer;" class="nav-link"
                          onclick="CargarContenido('ventas.php', 'content-wrapper')">
                          <i class="nav-icon fas fa-coins"></i>
                          <p>
                              Ventas
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a style="cursor: pointer;" class="nav-link active" href="vista_ventas.php">
                          <i class="nav-icon fas fa-cash-register"></i>
                          <p>
                              Realizar venta
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a style="cursor: pointer;" class="nav-link"
                          onclick="CargarContenido('reportes.php', 'content-wrapper')">
                          <i class="nav-icon fas fa-clipboard-list"></i>
                          <p>
                              Reportes
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