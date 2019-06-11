 <?php
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['escritorio']==1 || $_SESSION['entidad']==1)
{
  // require 'php-sdk/src/temboo.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
<body> 
<div class="content-wrapper">  
<section class="content">
             
<style>


#team {
    background: #eee !important;
}

.btn-primary:hover,
.btn-primary:focus {
    background-color: #108d6f;
    border-color: #108d6f;
    box-shadow: none;
    outline: none;
}

.btn-primary {
    color: #fff;
    background-color: #007b5e;
    border-color: #007b5e;
}

section {
    padding: 1px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}

#team .card {
    border: none;
    background: #ffffff;
}

.image-flip:hover .backside,
.image-flip.hover .backside {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
    /* -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg); */
}

.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
    margin-bottom: 30px;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    color: #007b5e !important;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}
.fondo { 
 background: url('../public/images/fondo.jpeg') no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}
</style>
 

<section  class="fondo pb-5">
    <div class=" container">
        <h5 style="color: black; background-color: white" class="section-title h1">TODO LO QUE PUEDE REALIZAR!! </h5>
        <div  class="fondo row">
            <!-- Team member -->
            <div  class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div style="background-color: white" class="card">
                                <div style="background-color: transparent;"class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://magentaig.com/wp-content/uploads/2017/05/ventas-portada.png" alt="card image"></p>
                                    <h4 class="card-title">VENDER PRODUCTOS </h4>
                                    <p class="card-text">realiza la venta tus productos previo registro del cliente </p>
                                    <a href="venta.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                     <!--<a href="" class="btn btn-primary btn-sm">L-V</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">SAB</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">DOM</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div style="background-color: white" class="card">
                                <div style="background-color: transparent;"class="card-body text-center">
                                    <p><img class=" img-fluid" src="https://www.enriquejros.com/desarrolloweb/stock-productos-900x250.jpg" alt="card image"></p>
                                    <h4 class="card-title">AUMENTAR STOCK</h4>
                                    <p class="card-text">incrementa la cantidad de tus productos previo registro del proveedor </p>
                                    <a href="ingreso.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                     <!--<a href="" class="btn btn-primary btn-sm">L-V</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">SAB</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">DOM</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div style="background-color: white" class="card">
                                <div style="background-color: transparent;"class="card-body text-center">
                                    <p><img class=" img-fluid" src=" https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSFEaWC4MuGDJceIKgxB0qHDlBwE76rYMferqm-5aacrGyN2TVWA" alt="card image"></p>
                                    <h4 class="card-title">NUEVO PRODUCTO</h4>
                                    <p class="card-text">ingresa para añadir un nuevo producto  </p>
                                    <a href="articulo.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                     <!--<a href="" class="btn btn-primary btn-sm">L-V</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">SAB</a>-->

                                     <!--<a href="" class="btn btn-primary btn-sm">DOM</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div style="background-color: white" class="card">
                                <div style="background-color: transparent;"class="card-body text-center">
                                    <p><img class=" img-fluid" src="http://www.merkrete.com/images/categories/NEW.png" alt="card image"></p>
                                    <h4 class="card-title">NUEVO CLIENTE</h4>
                                    <p class="card-text">ingresa para añadir  nuevos clientes </p>
                                    <a href="cliente.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                     <!--<a href="" class="btn btn-primary btn-sm">L-V</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">SAB</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">DOM</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      <div  class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div style="background-color: white" class="card">
                                <div style="background-color: transparent;"class="card-body text-center">
                                    <p><img class=" img-fluid" src="http://www.merkrete.com/images/categories/NEW.png" alt="card image"></p>
                                    <h4 class="card-title">NUEVO PROVEEDOR</h4>
                                    <p class="card-text">ingresa para añadir  nuevos proveedores </p>
                                    <a href="proveedor.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                     <!--<a href="" class="btn btn-primary btn-sm">L-V</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">SAB</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">DOM</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div style="background-color: white" class="card">
                                <div style="background-color: transparent;"class="card-body text-center">
                                    <p><img class=" img-fluid" src="http://www.merkrete.com/images/categories/NEW.png" alt="card image"></p>
                                    <h4 class="card-title">NUEVO CATEGORIA</h4>
                                    <p class="card-text">ingresa para añadir nuevas categorias de productos</p>
                                    <a href="cliente.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                                     <!--<a href="" class="btn btn-primary btn-sm">L-V</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">SAB</a>-->
                                     <!--<a href="" class="btn btn-primary btn-sm">DOM</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
            
             
          </div>
         </div>
</section>

<!-- Team -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  </body>
<?php
}
else
{
  require 'noacceso.php';
}
 
require 'footer.php';
?>
<script type="text/javascript" src="scripts/funciones.js"></script>
<?php 
}
ob_end_flush();

 ?>