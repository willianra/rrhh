<?php 
require_once "../modelos/Rol.php";

$rol=new Rol();

$idrol=isset($_POST["idrol"])? limpiarCadena($_POST["idrol"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idrol)){
			$rspta=$rol->insertar($nombre,$descripcion);
			echo $rspta ? "Rol registrado" : "Rol no se pudo registrar";
		}
		else {
			$rspta=$rol->editar($idrol,$nombre,$descripcion);
			echo $rspta ? "Rol actualizado" : "Rol no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$rol->desactivar($idrol);
 		echo $rspta ? "Rol Desactivado" : "Rol no se puede desactivar";
	break;

	case 'activar':
		$rspta=$rol->activar($idrol);
 		echo $rspta ? "Rol activado" : "Rol no se puede activar";
	break;

	case 'mostrar':
		$rspta=$rol->mostrar($idrol);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$rol->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idrol.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idrol.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idrol.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idrol.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
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