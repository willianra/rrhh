<?php 
require_once "../modelos/Postulante.php";

$postulante=new Postulante();

$idpostulante=isset($_POST["idpostulante"])? limpiarCadena($_POST["idpostulante"]):"";
$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idpostulante)){
			$rspta=$postulante->insertar($idpersona,$codigo,$cargo);
			echo $rspta ? "Postulante registrado" : "Postulante no se pudo registrar";
		}
		else {
			$rspta=$postulante->editar($idpostulante,$idpersona,$codigo,$cargo);
			echo $rspta ? "Postulante actualizado" : "Postulante no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$postulante->desactivar($idpostulante);
 		echo $rspta ? "Postulante Desactivado" : "Postulante no se puede desactivar";
	break;

	case 'activar':
		$rspta=$postulante->activar($idpostulante);
 		echo $rspta ? "Postulante activado" : "Postulante no se puede activar";
	break;

	case 'mostrar':
		$rspta=$postulante->mostrar($idpostulante);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$postulante->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpostulante.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idpostulante.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idpostulante.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idpostulante.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->idpersona,
 				"2"=>$reg->codigo,
 				"3"=>$reg->cargo,
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
	case 'listarp':
		$rspta=$postulante->mostrar($idpersona);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->idpostulante,
 				"1"=>$reg->idpersona,
 				"2"=>$reg->codigo,
 				"3"=>$reg->cargo,
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

	
	case "selectTipo1":
		require_once "../modelos/Persona.php";
		$persona = new Persona();
		$rspta = $persona->listarPostulantes();
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
				}
	break;
}
?>