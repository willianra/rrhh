<?php
//Activamos el almacenamiento en el buffer
ob_start();
if (strlen(session_id()) < 1) 
  session_start();

if (!isset($_SESSION["nombre"]))
{
  echo 'Debe ingresar al sistema correctamente para visualizar el reporte';
}
else
{
if ($_SESSION['almacen']==1)
{

//Inlcuímos a la clase PDF_MC_Table
require('PDF_MC_Table.php');
 
//Instanciamos la clase para generar el documento pdf
$pdf=new PDF_MC_Table();
 
//Agregamos la primera página al documento pdf
$pdf->AddPage();
 
//Seteamos el inicio del margen superior en 25 pixeles 
$y_axis_initial = 25;
 
//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6,'REPORTE DE CONVOCATORIAS',1,0,'C'); 
$pdf->Ln(10);

// lorena 
  
// 


 
//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra

//Table with 20 rows and 4 columns

$pdf->SetFillColor(232,232,232); 
$pdf->SetFont('Arial','B',7);
if(!empty($_POST['check_list'])){
  // Loop to store and display values of individual checked checkbox.
  foreach($_POST['check_list'] as $selected){
    echo $selected."</br>";
    require_once "../modelos/Convocatoria.php";
    $consultas = new Convocatoria();
    
    $rspta = $consultas->listarC($selected);
    // $rspta = $consultas->listar();
    $pdf->Cell(30,6,utf8_decode($selected),1,1,'C',1);
    $pdf->SetWidths(array(58,50,30,12,35));
    
    while($reg= $rspta->fetch_object())
    {  
      // $nombre = $reg->idarticulo;
    //     $nombre = $reg->cargo;
    //     // $categoria = $reg->descripcion;
    //     // $codigo = $reg->precio;
    //     // $stock = $reg->lugar;
    //     // $descripcion =$reg->idcontacto;
       
       $pdf->SetFont('Arial','',10);
        $pdf->Row(array(utf8_decode('$nombre'),utf8_decode('$cargo'),'$codigo','$stock',utf8_decode('$descripcion')));
    }
    
  }
  }
// $pdf->Cell(58,6,'Nombre',1,0,'C',1); 
// $pdf->Cell(30,6,utf8_decode('Código'),1,0,'C',1);
// $pdf->Cell(12,6,'Stock',1,0,'C',1);
// $pdf->Cell(35,6,'Imagen',1,0,'C',1);
 
$pdf->Ln(10);
//Comenzamos a crear las filas de los registros según la consulta mysql
 
//Mostramos el documento pdf
$pdf->Output();

?>
<?php
}
else
{
  echo 'No tiene permiso para visualizar el reporte';
}

}
ob_end_flush();
?>