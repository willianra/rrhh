<?php 
require_once "../modelos/Verificador.php";

$verificador=new Verificador();

$idverificar=isset($_POST["idverificar"])? limpiarCadena($_POST["idverificar"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$identrevista=isset($_POST["identrevista"])? limpiarCadena($_POST["identrevista"]):"";
$idformulario=isset($_POST["idformulario"])? limpiarCadena($_POST["idformulario"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idverificar)){
			$rspta=$verificador->insertar($idusuario,$identrevista,$idformulario,$descripcion,$fecha);
			echo $rspta ? "Verificador registrada" : "Verificador no se pudo registrar";
		}
		else {
			$rspta=$verificador->editar($idverificar,$idusuario,$identrevista,$idformulario,$descripcion,$fecha);
			echo $rspta ? "Verificador actualizada" : "Verificador no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$verificador->desactivar($idverificar);
 		echo $rspta ? "Verificador Desactivada" : "Verificador no se puede desactivar";
	break;

	case 'activar':
		$rspta=$verificador->activar($idverificar);
 		echo $rspta ? "Verificador activada" : "Verificador no se puede activar";
	break;

	case 'mostrar':
		$rspta=$verificador->mostrar($idverificar);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$verificador->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idverificar.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idverificar.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idverificar.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idverificar.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->idusuario,
 				"2"=>$reg->identrevista,
 				"3"=>$reg->idformulario,
 				"4"=>$reg->descripcion,
 				"5"=>$reg->fecha,
 				"6"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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