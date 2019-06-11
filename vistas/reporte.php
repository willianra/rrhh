<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if ( 1==2)
{
//   header("Location: login.html");
}
else
{
require 'header2.php';
if (1==1)
{
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Reporte <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Foto</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Documento</th>
                            <th>Número</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Login</th>
                            <th>Foto</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <h1> reporte de convocatorias</h1>
                    <form  action="../reportes/totalvendido.php"
  target="_blank "   method="post">
                    <?php
require_once "../modelos/Convocatoria.php";
$anuncios=new Convocatoria();
// $idcategoria=$_GET["idcategoria"];
// isset($_GET["categoria"]) ? $rspta=$anuncios->listar_categoria($_GET["idcategoria"]) : $rspta=$anuncios->listar();
$rspta=$anuncios->listar();
$aux=0;

while($reg=$rspta->fetch_object()){
    echo'
    <input type="checkbox" name="check_list[]" value="'.$reg->cargo.'"><label>'.$reg->cargo.'</label><br/>
                         ';   
}

    ?>

                    <input type="submit" name="submit" value="Submit"/>
                    </form>
                              
          <?php
          if(isset($_POST['submit'])){//to run PHP script on submit
          if(!empty($_POST['check_list'])){
          // Loop to store and display values of individual checked checkbox.
          foreach($_POST['check_list'] as $selected){
          echo $selected."</br>";
          }
          }
          }
          ?>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
  
}
require 'footer.php';
?>

<script type="text/javascript" src="scripts/usuario2.js"></script>
<?php 
}
ob_end_flush();
?>