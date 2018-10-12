<header class="main-header">               
<nav class="navbar navbar-static-top">
  <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
      <i class="fa fa-bars"></i>
    </button>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="navbar-collapse">
    <ul class="nav navbar-nav">
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-edit"></i>&nbsp;Mantenimientos <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="tipo_fertilizante.vista.php">Tipo de Fertilizante</a></li>
            <li><a href="tipo_suelo.vista.php">Tipo_suelo</a></li>
            <li><a href="tipo_nutriente.vista.php">Tipo_nutriente</a></li>
            <li class="divider"></li>
            <li><a href="cultivo.vista.php">Cultivo</a></li>
            <li><a href="fertilizante.vista.php">Fertilizante</a></li>
            <li><a href="nutriente.vista.php">Nutriente</a></li>
            <!--<li><a href="suelo.vista.php">Suelo</a></li>-->
            <li class="divider"></li>
            <li><a href="usuario.vista.php">Usuario</a></li>
            <li><a href="agricultor.vista.php">Agricultor</a></li>
            <li class="divider"></li>
            <li><a href="departamento.vista.php">Departamento</a></li>
            <li><a href="provincia.vista.php">Provincia</a></li>
            <li><a href="distrito.vista.php">Distrito</a></li>
            <!--<li class="divider"></li>
            <li><a href="#">Mantenimiento 4</a></li>
	    <li><a href="#">Mantenimiento n</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-laptop"></i>&nbsp;Transacciones <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Registro de Plan de fertilización</a></li>
            <li><a href="suelo.vista.php">Suelo</a></li>
            <!--<li class="divider"></li>
            <li><a href="#">Transacción n</a></li>-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-book"></i>&nbsp;Reportes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Plan de fertilización</a></li>
	    <li><a href="#">Mis cultivos</a></li>
            
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bar-chart-o"></i>&nbsp;Estadísticas <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="grafico.php">Gráfico de prueba</a></li>
            <li><a href="#">Reporte 1</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-gears"></i>&nbsp;Administración <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Administrador</a></li>
            <li><a href="#">Usuarios</a></li>
          </ul>
        </li>
        
    </ul>
    <ul class="nav navbar-nav navbar-right">      
        
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../imagenes/<?php echo $fotoUsuario; ?>" class="user-image" alt="User Image"/>
          <span class="hidden-xs"><?php echo $nombreUsuario; ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <!--<img src="../imagenes/1.png" class="img-circle" alt="User Image" />-->
            <img src="../imagenes/<?php echo $fotoUsuario; ?>" class="img-circle" alt="User Image" />
            <p>
              <?php echo $nombreUsuario; ?>
              <br>
              <small><?php echo $cargoUsuario; ?></small>
            </p>
          </li>

          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Cambiar Contraseña</a>
            </div>
            <div class="pull-right">
                <a href="../controlador/sesion.cerrar.controlador.php" class="btn btn-default btn-flat"><i class="fa fa-power-off"></i> Salir</a>
            </div>
          </li>
        </ul>
      </li>          
    </ul>
  </div><!-- /.navbar-collapse -->

  </div><!-- /.container-fluid -->
</nav>
</header>




