<?php 
require_once "../modelos/Notificacion.php";

$notificacion=new Notificacion();

$idnotificacion=isset($_POST["idnotificacion"])? limpiarCadena($_POST["idnotificacion"]):"";
$idpostulante=isset($_POST["idpostulante"])? limpiarCadena($_POST["idpostulante"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idnotificacion)){
			$rspta=$notificacion->insertar($idpostulante,$descripcion,$correo);
			echo $rspta ? "Notificacion registrada" : "La notificacion no se pudo ser registra";
		}
		else {
			$rspta=$notificacion->editar($idnotificacion,$idpostulante,$descripcion,$correo);
			echo $rspta ? "Notificacion actualizada" : "La notificacion no se pudo ser actualizada";
		}
	break;

	case 'desactivar':
		$rspta=$notificacion->desactivar($idnotificacion);
 		echo $rspta ? "Notificacion Desactivada" : "La notificacion no se puede desactivar";
	break;

	case 'activar':
		$rspta=$notificacion->activar($idnotificacion);
 		echo $rspta ? "Notificacion activada" : "La notificacion no se puede activar";
	break;

	case 'mostrar':
		$rspta=$notificacion->mostrar($idnotificacion);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$notificacion->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idnotificacion.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idnotificacion.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idnotificacion.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idnotificacion.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->idpostulante,
 				"2"=>$reg->descripcion,
 				"3"=>$reg->correo,
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
	
	case "selectTipo2":
	require_once "../modelos/Postulante.php";
	$postulante = new Postulante();
	$rspta = $postulante->listarPostulante();
	while ($reg = $rspta->fetch_object())
			{
				echo '<option value=' . $reg->idpostulante . '>' . $reg->idpersona . '</option>';
			}
break;
}
?>