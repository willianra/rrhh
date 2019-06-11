<?php
if (strlen(session_id()) < 1) 
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>www.marcompras.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

  </head>
  <style>

.shop { 
 background: url('../public/images/fondo.png') no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}

.sticky-container{
    padding:0px;
    margin:0px;
    position:fixed;
    right:-130px;
    top:230px;
    width:210px;
    z-index: 1100;
}
.sticky li{
    list-style-type:none;
    background-color:#fff;
    color:#efefef;
    height:43px;
    padding:0px;
    margin:0px 0px 1px 0px;
    -webkit-transition:all 0.25s ease-in-out;
    -moz-transition:all 0.25s ease-in-out;
    -o-transition:all 0.25s ease-in-out;
    transition:all 0.25s ease-in-out;
    cursor:pointer;
}
.sticky li:hover{
    margin-left:-115px;
}
.sticky li img{
    float:left;
    margin:5px 4px;
    margin-right:5px;
}
.sticky li p{
    padding-top:5px;
    margin:0px;
    line-height:16px;
    font-size:11px;
}
.sticky li p a{
    text-decoration:none;
    color:#2C3539;
    float:left;
    margin:5px 4px;
    margin-right:5px;
}
.sticky li p a:hover{
    text-decoration:underline;
}
</style>
<?php 
require_once "../modelos/Consultas.php";
$consultas = new Consultas();

$rspta = $consultas->totalventahoy();

//Table with 20 rows and 4 columns
$total=0;
while($reg= $rspta->fetch_object())
{  
    $total =$total+ $reg->total_venta;
  
 
}
 ?>
<div class="sticky-container">
    <ul class="sticky">
        <!-- <li>
            <img src="https://image.flaticon.com/icons/png/512/44/44766.png" width="32" height="32">

            <p><a style="font-size: 27px; padding-top: 3px;" href="" target="_blank"> <?php print($total);?><br></a></p>
        </li> -->
        <!-- <li>
            <img src="images/twitter-circle.png" width="32" height="32">
            <p><a href="https://twitter.com/noprog" target="_blank">Follow Us on<br>Twitter</a></p>
        </li>
        <li>
            <img src="images/gplus-circle.png" width="32" height="32">
            <p><a href="https://plus.google.com/programacionnet" target="_blank">Follow Us on<br>Google+</a></p>
        </li>
        <li>
            <img src="images/linkedin-circle.png" width="32" height="32">
            <p><a href="https://www.linkedin.com/company/programacionnet" target="_blank">Follow Us on<br>LinkedIn</a></p>
        </li>
        <li>
            <img src="images/youtube-circle.png" width="32" height="32">
            <p><a href="http://www.youtube.com/programacionnet" target="_blank">Subscribe on<br>YouYube</a></p>
        </li>
        <li>
            <img src="images/pin-circle.png" width="32" height="32">
            <p><a href="https://www.pinterest.com/programacionnet" target="_blank">Follow Us on<br>Pinterest</a></p>
        </li> -->
    </ul>
</div>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="escritorio.php" class="shop logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>MarCompras</b>2019</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>MarCompras</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class=" shop navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <!-- <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                </a>
                <ul class="dropdown-menu"> -->
                  <!-- User image -->
                  <!-- <li class="user-header">
                    <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                    <p> -->
                    <!-- CAMBIAR -->
                      <!-- www.marcompras.com - Desarrollo de Software
                      <small>www.marcompras.com</small>
                    </p>
                  </li> -->

                  <!-- Menu Footer-->
                  <!-- <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>
                   
                    </div> -->
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      
 <!-- INICIO AQUI  -->
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <?php 
            //  if ($_SESSION['escritorio']==1)
            //  if (1==1)
            //  {
            //    echo '<li>
            //    <a href="usuario2.php">
            //    <i class="fa fa-home"></i> <span>'.'mis articulos'.'</span>
            //    </a>
            //    </li>';
            //  }
            // //  anuncio
            //  if (1==1)
            //  {
            //    echo '<li>
            //    <a href="usuario2.php">
            //    <li><a href="anuncio.php"><i class="fa fa-circle-thin"></i> Anuncio</a></li>
            //    </a>
            //    </li>';
            //  }
            // MI MENU GENERAL......
            // if (1==1)
            // {
            //    echo '<li class="treeview">
            //    <a href="#">
            //    <i class="fa fa-folder-o"></i>
            //    <span>Gestionar Publicidad</span>
            //    <i class="fa fa-angle-left pull-right"></i>
            //    </a>
            //    <ul class="treeview-menu">
            //    </ul>
            //    </li>';
            //  }
            // MODULO REPORTE 
            // if (1==1)
            // {
            //    echo '<li class="treeview">
            //    <a href="#">
            //    <i class="fa fa-edit"></i>
            //    <span>Gestionar Reporte</span>
            //    <i class="fa fa-angle-left pull-right"></i>
            //    </a>
            //    <ul class="treeview-menu">
            //    // como mostrar la bitacora
            // <li><a href="anuncio.php"><i class="fa fa-circle-thin"></i> Anuncio</a></li>   
            //    </ul>
            //    </li>';
            //  } 
            //  GESTIONAR USUARIO
            // if (1==1)
            // {
            //    echo '<li class="treeview">
            //    <a href="#"><i class="fa fa-user"></i>
            //    <span>Gestionar Usuario</span>
            //    <i class="fa fa-angle-left pull-right"></i>
            //    </a>
            //    <ul class="treeview-menu">
            //    <li><a href="usuario.php"><i class="fa fa-circle-thin"></i>Usuario</a></li>  
            //    <li><a href="rol.php"><i class="fa fa-circle-thin"></i>Roles</a></li>   
            //    <li><a href="categoria.php"><i class="fa fa-circle-thin"></i>Categoria</a></li>  
            //    <li><a href="zona.php"><i class="fa fa-circle-thin"></i>Zona</a></li>  
            //    </ul>
            //    </li>';
            //  } 
              //  LISTA DE FAVORITO
            // if (1==1)
            // {
            //    echo '<li class="treeview">
            //    <a href="#"><i class="fa fa-cart-arrow-down"></i>
            //    <span>Lista de Favoritos</span>
            //    <i class="fa fa-angle-left pull-right"></i>
            //    </a>
            //    <ul class="treeview-menu">
            //    </ul>
            //    </li>';
            //  } 


            //  ESTO VA ARRIBA
            //  <li><a href="convocatoria.php"><i class="fa fa-align-justify"></i> gestionar convocatoria</a></li>
            //  <li><a href="formularioEmpleado.php"><i class="fa fa-list-ul"></i> gestionar formulario para empleados </a></li>
            //  <li><a href="formulario.php"><i class="fa fa-list-ul"></i> gestionar formulario para postulantes</a></li>
            //  <li><a href="notificacion.php"><i class="fa fa-list-ul"></i> gestionar notificacion</a></li>
            
            //  if ($_SESSION['compras']==1)
            //  {
            //    echo '<li class="treeview">
            //    <a href="#">
            //    <i class="fa fa-folder"></i>
            //    <span>MODULO ACCESO</span>
            //    <i class="fa fa-angle-left pull-right"></i>
            //    </a>
            //    <ul class="treeview-menu">
            //    <li><a href="empleado.php"><i class="fa fa-user"></i> gestionar empleado</a></li>
            //    <li><a href="persona.php"><i class="fa fa-user"></i> gestionar persona</a></li>
            //    <li><a href="departamento.php"><i class="fa fa-user"></i> gestionar departamento</a></li>
               
            //    </ul>
            //    </li>';
            //  }
            //  if ($_SESSION['compras']==1)
            //  {
            //    echo '<li class="treeview">
            //    <a href="#">
            //    <i class="fa fa-users"></i>
            //    <span>Recursos Humanos</span>
            //    <i class="fa fa-angle-left pull-right"></i>
            //    </a>
            //    <ul class="treeview-menu">
            //    <li><a href="hojavida.php"><i class="fa fa-list-ul"></i> gestionar hojavida</a></li>
            //    <li><a href="detallecv.php"><i class="fa fa-list-ul"></i> gestionar detallecv</a></li>
            //    </ul>
            //    </li>';
               
            //  }
             
            //CAMBIAR  
            // if (1==1)
            // {
            //   echo '<li class="treeview">
            //   <a href="#">
            //   <i class="fa fa-users"></i>
            //   <span>ACCESO</span>
            //   <i class="fa fa-angle-left pull-right"></i>
            //   </a>
            //   <ul class="treeview-menu">
            //   <li><a href="usuario.php"><i class="fa fa-circle-thin"></i> usuario</a></li>
            //   <li><a href="permiso.php"><i class="fa fa-circle-thin"></i> persona</a></li>
            //   </ul>
            //   </li>';
            // }
            ?>

            <?php 
            // if ($_SESSION['ventas']==1)
            // {
            //   echo '<li class="treeview">
            //   <a href="#">
            //   <i class="fa fa-shopping-cart"></i>
            //   <span>VENTAS</span>
            //   <i class="fa fa-angle-left pull-right"></i>
            //   </a>
            //   <ul class="treeview-menu">
            //   <li><a href="venta.php"><i class="fa fa-circle-o"></i> realizar venta</a></li>
            //   <li><a href="cliente.php"><i class="fa fa-circle-o"></i> Añadir cliente</a></li>
            //   </ul>
            //   </li>';
            // }
            ?>
                        
            <?php 
            // if ($_SESSION['acceso']==1)
            // {
            //   echo '<li class="treeview">
            //   <a href="#">
            //   <i class="fa fa-folder"></i> <span>Acceso</span>
            //   <i class="fa fa-angle-left pull-right"></i>
            //   </a>
            //   <ul class="treeview-menu">
            //   <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            //   <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
              
            //   </ul>
            //   </li>';
            // }
            ?>

            <?php 
            // if ($_SESSION['consultac']==1)
            // {
            //   echo '<li class="treeview">
            //   <a href="#">
            //   <i class="fa fa-bar-chart"></i> <span>Consulta Compras</span>
            //   <i class="fa fa-angle-left pull-right"></i>
            //   </a>
            //   <ul class="treeview-menu">
            //   <li><a href="comprasfecha.php"><i class="fa fa-circle-o"></i> Consulta Compras</a></li>                
            //   </ul>
            //   </li>';
            // }
            ?>

             <?php 
            // if ($_SESSION['consultav']==1)
            // {
            //   echo '<li class="treeview">
            //   <a href="#">
            //   <i class="fa fa-bar-chart"></i> <span>Consulta Ventas</span>
            //   <i class="fa fa-angle-left pull-right"></i>
            //   </a>
            //   <ul class="treeview-menu">
            //   <li><a href="ventasfechacliente.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>                
            //   </ul>
            //   </li>';
            // }
          
            ?>

            <!-- <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li> -->
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
