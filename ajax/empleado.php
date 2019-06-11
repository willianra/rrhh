<?php 
require_once "../modelos/Empleado.php";

$empleado=new Empleado();

$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$idempleado=isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$sueldomensual=isset($_POST["sueldomensual"])? limpiarCadena($_POST["sueldomensual"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idempleado)){
			$rspta=$empleado->insertar($idpersona,$cargo,$fecha,$sueldomensual);
			echo $rspta ? "Empleado registrado" : "Empleado no se pudo registrar";
		}
		else {
			$rspta=$empleado->editar($idempleado,$idpersona,$cargo,$fecha,$sueldomensual);
			echo $rspta ? "Empleado actualizado" : "Empleado no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$empleado->desactivar($idempleado);
 		echo $rspta ? "Empleado Desactivado" : "Empleado no se puede desactivar";
	break;

	case 'activar':
		$rspta=$empleado->activar($idempleado);
 		echo $rspta ? "Empleado activado" : "Empleado no se puede activar";
	break;

	case 'mostrar':
		$rspta=$empleado->mostrar($idempleado);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$empleado->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idempleado.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idempleado.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idempleado.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idempleado.')"><i class="fa fa-check"></i></button>',
				"1"=>$reg->idpersona,
				"2"=>$reg->cargo,
				"3"=>$reg->fecha,
				"4"=>$reg->sueldomensual, 
 				"5"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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
	
	case "selectTipo1":
		require_once "../modelos/Persona.php";
		$persona = new Persona();
		$rspta = $persona->listarEmpleados();
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
				}
	break;
}
?>