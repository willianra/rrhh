<?php 
require_once "../modelos/Departamento.php";

$departamento=new Departamento();

$iddepartamento=isset($_POST["iddepartamento"])? limpiarCadena($_POST["iddepartamento"]):"";
$funciones=isset($_POST["funciones"])? limpiarCadena($_POST["funciones"]):"";
$nombredepartamento=isset($_POST["nombredepartamento"])? limpiarCadena($_POST["nombredepartamento"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($iddepartamento)){
			$rspta=$departamento->insertar($funciones,$nombredepartamento);
			echo $rspta ? "Departamento registrado" : "Departamento no se pudo registrar";
		}
		else {
			$rspta=$departamento->editar($iddepartamento,$funciones,$nombredepartamento);
			echo $rspta ? "Departamento actualizado" : "Departamento no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$departamento->desactivar($iddepartamento);
 		echo $rspta ? "Departamento Desactivado" : "Departamento no se puede desactivar";
	break;

	case 'activar':
		$rspta=$departamento->activar($iddepartamento);
 		echo $rspta ? "Departamento activado" : "Departamento no se puede activar";
	break;

	case 'mostrar':
		$rspta=$departamento->mostrar($iddepartamento);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$departamento->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->iddepartamento.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->iddepartamento.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->iddepartamento.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->iddepartamento.')"><i class="fa fa-check"></i></button>',
					 "1"=>$reg->nombredepartamento,
					 "2"=>$reg->funciones,
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