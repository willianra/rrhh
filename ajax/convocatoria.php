<?php 
require_once "../modelos/Convocatoria.php";

$convocatoria=new Convocatoria();

$idconvocatoria=isset($_POST["idconvocatoria"])? limpiarCadena($_POST["idconvocatoria"]):"";
$nombreconvocatoria=isset($_POST["nombreconvocatoria"])? limpiarCadena($_POST["nombreconvocatoria"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";
$sueldo=isset($_POST["sueldo"])? limpiarCadena($_POST["sueldo"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idconvocatoria)){
			$rspta=$convocatoria->insertar($nombreconvocatoria,$descripcion,$cargo,$sueldo);
			echo $rspta ? "Convocatoria registrada" : "Convocatoria no se pudo registrar";
		}
		else {
			$rspta=$convocatoria->editar($idconvocatoria,$nombreconvocatoria,$descripcion,$cargo,$sueldo);
			echo $rspta ? "Convocatoria actualizada" : "Convocatoria no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$convocatoria->desactivar($idconvocatoria);
 		echo $rspta ? "Convocatoria Desactivada" : "Convocatoria no se puede desactivar";
	break;

	case 'activar':
		$rspta=$convocatoria->activar($idconvocatoria);
 		echo $rspta ? "Convocatoria activada" : "Convocatoria no se puede activar";
	break;

	case 'mostrar':
		$rspta=$convocatoria->mostrar($idconvocatoria);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$convocatoria->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idconvocatoria.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idconvocatoria.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idconvocatoria.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idconvocatoria.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombreconvocatoria,
 				"2"=>$reg->descripcion,
 				"3"=>$reg->cargo,
 				"4"=>$reg->sueldo,
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
	case "selectTipo2":
	require_once "../modelos/Departamento.php";
	$departamento = new Departamento();
	$rspta = $departamento->listarDepartamento();
	while ($reg = $rspta->fetch_object())
			{
				echo '<option >' . $reg->nombredepartamento . '</option>';
			}
break;
}
?>