<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';

if ($_SESSION['almacen']==1)
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
                          <h1 class="box-title">gestionar Formulario Para Empleados <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre de la Convocatoria</th>
                            <th>Nombre del postulante</th>
                            <th>empleado</th>
                           
                            <th>cv</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre de la Convocatoria</th>
                            <th>Nombre del postulante</th>
                            <th>Nombre del empleado</th>
                            <th>cv</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <!-- nombre de la convocatoria  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>seleccionar la convocatoria:</label>
                            <input type="hidden" name="idformulario" id="idformulario">
                            <select id="idconvocatoria" name="idconvocatoria" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                         
                            <input type="hidden" name="idpostulante" id="idpostulante">
                     
                          <!-- descripcion -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label> seleccionar empleado:</label>
                            <select id="idempleado" name="idempleado" class="form-control selectpicker" data-live-search="true"  ></select>
                          </div>
                          <!-- fecha -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>CV-Agregar datos personales , trabajos realizados, experiencia , salario estimado ,cursos realizados,:</label>
                            <textarea name="fecha" id="fecha" cols="70" rows="15"></textarea>
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
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
  require 'noacceso.php';
}

require 'footer.php';
?>
<script type="text/javascript" src="scripts/formulario.js"></script>
<?php 
}
ob_end_flush();
?>


