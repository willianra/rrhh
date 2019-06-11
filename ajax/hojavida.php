<?php 
require_once "../modelos/Hojavida.php";

$hojavida=new Hojavida();

$idhojavida=isset($_POST["idhojavida"])? limpiarCadena($_POST["idhojavida"]):"";
$fechaRegistro=isset($_POST["fechaRegistro"])? limpiarCadena($_POST["fechaRegistro"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idhojavida)){
			$rspta=$hojavida->insertar($fechaRegistro,$descripcion);
			echo $rspta ? "Hoja de Vida registrada" : "Hoja de Vida no se pudo registrar";
		}
		else {
			$rspta=$hojavida->editar($idhojavida,$fechaRegistro,$descripcion);
			echo $rspta ? "Hoja de Vida actualizada" : "Hoja de Vida no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$hojavida->desactivar($idhojavida);
 		echo $rspta ? "Hoja de Vida Desactivada" : "Hoja de Vida no se puede desactivar";
	break;

	case 'activar':
		$rspta=$hojavida->activar($idhojavida);
 		echo $rspta ? "Hoja de Vida activada" : "Hoja de Vida no se puede activar";
	break;

	case 'mostrar':
		$rspta=$hojavida->mostrar($idhojavida);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$hojavida->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idhojavida.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idhojavida.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idhojavida.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idhojavida.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->fechaRegistro,
 				"2"=>$reg->descripcion,
 				"3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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