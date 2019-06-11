<?php 
require_once "../modelos/Detallecv.php";

$detallecv=new Detallecv();

$iddetallecv=isset($_POST["iddetallecv"])? limpiarCadena($_POST["iddetallecv"]):"";
$detalle=isset($_POST["detalle"])? limpiarCadena($_POST["detalle"]):"";
$fechaInicio=isset($_POST["fechaInicio"])? limpiarCadena($_POST["fechaInicio"]):"";
$fechaFin=isset($_POST["fechaFin"])? limpiarCadena($_POST["fechaFin"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($iddetallecv)){
			$rspta=$detallecv->insertar($detalle,$fechaInicio,$fechaFin);
			echo $rspta ? "Detalle de Hoja de Vida registrada" : "Detalle de Hoja de Vida no se pudo registrar";
		}
		else {
			$rspta=$detallecv->editar($iddetallecv,$detalle,$fechaInicio,$fechaFin);
			echo $rspta ? "Detalle de Hoja de Vida actualizada" : "Detalle de Hoja de Vida no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$detallecv->desactivar($iddetallecv);
 		echo $rspta ? "Detalle de Hoja de Vida Desactivada" : "Detalle de Hoja de Vida no se puede desactivar";
	break;

	case 'activar':
		$rspta=$detallecv->activar($iddetallecv);
 		echo $rspta ? "Detalle de Hoja de Vida activada" : "Detalle de Hoja de Vida no se puede activar";
	break;

	case 'mostrar':
		$rspta=$detallecv->mostrar($iddetallecv);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$detallecv->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->iddetallecv.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->iddetallecv.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->iddetallecv.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->iddetallecv.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->detalle,
 				"2"=>$reg->fechaInicio,
 				"3"=>$reg->fechaFin,
 				"4"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
}
?>