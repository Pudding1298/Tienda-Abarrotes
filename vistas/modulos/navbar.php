  <!-- Navbar  Menu de Navegacion superior-->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
      <li class="nav-item d-none d-sm-inline-block">
      <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('dashboard.php', 'content-wrapper')">
          Tablero</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a style="cursor: pointer;" class="nav-link" href="vista_inventario.php">
          Inventario</a>
      </li>    
      <li class="nav-item d-none d-sm-inline-block">
      <a style="cursor: pointer;" class="nav-link" href="vista_compras.php">
          Compras</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('ventas.php', 'content-wrapper')">
          Ventas</a>
      </li> 
      <li class="nav-item d-none d-sm-inline-block">
      <a style="cursor: pointer;" class="nav-link" href="vista_ventas.php">
          Realizar venta</a>
      </li> 
      <li class="nav-item d-none d-sm-inline-block">
      <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('reportes.php', 'content-wrapper')">
          Reportes</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('acerca_nosotros.php', 'content-wrapper')">
          Acerca de nosotros</a>
      </li>        
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../php/cerrar_sesion.php" class="nav-link">Cerrar Sesion</a>
      </li>      
    </ul>

  </nav>
  <!-- /.navbar -->
