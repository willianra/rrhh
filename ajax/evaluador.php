<?php 
require_once "../modelos/Evaluador.php";

$evaluador=new Evaluador();

$idevaluador=isset($_POST["idevaluador"])? limpiarCadena($_POST["idevaluador"]):"";
$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$iddepartamento=isset($_POST["iddepartamento"])? limpiarCadena($_POST["iddepartamento"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idevaluador)){
			$rspta=$evaluador->insertar($idpersona,$iddepartamento);
			echo $rspta ? "Evaluador registrado" : "Evaluador no se pudo registrado";
		}
		else {
			$rspta=$evaluador->editar($idevaluador,$idpersona,$iddepartamento);
			echo $rspta ? "Evaluador actualizado" : "Evaluador no se pudo actualizado";
		}
	break;

	case 'desactivar':
		$rspta=$evaluador->desactivar($idevaluador);
 		echo $rspta ? "Evaluador Desactivado" : "Evaluador no se puede desactivado";
	break;

	case 'activar':
		$rspta=$evaluador->activar($idevaluador);
 		echo $rspta ? "Evaluador activado" : "Evaluador no se puede activado";
	break;

	case 'mostrar':
		$rspta=$evaluador->mostrar($idevaluador);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$evaluador->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idevaluador.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idevaluador.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idevaluador.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idevaluador.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->idpersona,
 				"2"=>$reg->iddepartamento,
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

	case "selectTipo1":
		require_once "../modelos/Persona.php";
		$persona = new Persona();
		$rspta = $persona->listarEvaluadores();
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
				}
	break;
	case "selectTipo2":
		require_once "../modelos/Departamento.php";
		$departamento = new Departamento();
		$rspta = $departamento->listarDepartamento();
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->iddepartamento . '>' . $reg->nombredepartamento . '</option>';
				}
	break;
}
?>