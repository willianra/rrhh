<?php 
require_once "../modelos/Formulario.php";

$formulario=new Formulario();

$idformulario=isset($_POST["idformulario"])? limpiarCadena($_POST["idformulario"]):"";
$idconvocatoria=isset($_POST["idconvocatoria"])? limpiarCadena($_POST["idconvocatoria"]):"";
$idpostulante=isset($_POST["idpostulante"])? limpiarCadena($_POST["idpostulante"]):"";
$idempleado=isset($_POST["idempleado"])? limpiarCadena($_POST["idempleado"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idformulario)){
			$rspta=$formulario->insertar($idconvocatoria,$idpostulante,$idempleado,$fecha);
			echo $rspta ? "Formulario registrado" : "Formulario no se pudo registrar";
		}
		else {
			$rspta=$formulario->editar($idformulario,$idconvocatoria,$idpostulante,$idempleado,$fecha);
			echo $rspta ? "Formulario actualizado" : "Formulario no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$formulario->desactivar($idformulario);
 		echo $rspta ? "Formulario Desactivado" : "Formulario no se puede desactivar";
	break;

	case 'activar':
		$rspta=$formulario->activar($idformulario);
 		echo $rspta ? "Formulario activado" : "Formulario no se puede activar";
	break;

	case 'mostrar':
		$rspta=$formulario->mostrar($idformulario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$formulario->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idformulario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idformulario.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idformulario.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idformulario.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->idconvocatoria,
 				"2"=>$reg->idpostulante,
 				"3"=>$reg->idempleado,
 				"4"=>$reg->fecha,
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
	require_once "../modelos/Convocatoria.php";
	$convocatoria = new Convocatoria();
	$rspta = $convocatoria->listarConvocatorias();
	while ($reg = $rspta->fetch_object())
			{
				echo '<option value=' . $reg->idconvocatoria . '>' . $reg->nombreconvocatoria . '</option>';
			}
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
	case "selectTipo3":
	require_once "../modelos/Empleado.php";
	$empleado = new Empleado();
	$rspta = $empleado->listar();
	while ($reg = $rspta->fetch_object())
			{
				echo '<option value=' . $reg->idempleado . '>' . $reg->idpersona . '</option>';
			}
break;
}
?>