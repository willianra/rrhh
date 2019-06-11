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
                          <h1 class="box-title">Verificar <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre del Postulante</th>
                            <th>Id de Entrevista</th>
                            <th>Id de Formulario</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre del Postulante</th>
                            <th>Id de Entrevista</th>
                            <th>Id de Formulario</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <!-- nombre del postulante -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idverificar" id="idverificar">
                            <input type="number" class="form-control" name="idusuario" id="idusuario" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <!-- id entrevista -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Id de Entrevista:</label>
                            <input type="number" class="form-control" name="identrevista" id="identrevista" maxlength="256" placeholder="Descripción">
                          </div>
                          <!-- id formulario -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Id de Formulario:</label>
                            <input type="number" class="form-control" name="idformulario" id="idformulario" maxlength="256" placeholder="Descripción">
                          </div>
                          <!-- descripcion -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                          <!-- fecha -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha :</label>
                            <input type="text" class="form-control" name="fecha" id="fecha" maxlength="256" placeholder="Descripción">
                          </div>

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
<script type="text/javascript" src="scripts/verificador.js"></script>
<?php 
}
ob_end_flush();
?>


