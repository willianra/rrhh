<?php 
require_once "../modelos/Zona.php";
// traer la  bitacora
require_once "../bitacora/bitacora.php";
ob_start();
session_start();
date_default_timezone_set("America/La_Paz");
//
$zona=new Zona();

$idzona=isset($_POST["idzona"])? limpiarCadena($_POST["idzona"]):"";
$provincia=isset($_POST["provincia"])? limpiarCadena($_POST["provincia"]):"";
$ciudad=isset($_POST["ciudad"])? limpiarCadena($_POST["ciudad"]):"";
$departamento=isset($_POST["departamento"])? limpiarCadena($_POST["departamento"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$contenido='id='.$idzona.'provincia='.$provincia.'ciudad='.$ciudad.'departamento='.$departamento.'descripcion='.$descripcion.'fecha.'.date("d-m-Y (H:i:s)", time());
switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idzona)){
			$rspta=$zona->insertar($provincia,$ciudad,$departamento,$descripcion);
			$contenido='nombre='.$_SESSION["nombre"].' inserto una nueva ciudad'.$contenido;
			//  modificar aqui
			if ($rspta) {
				bitacora($contenido);
				echo "Zona registrada";
			} else {
				echo "Zona no se pudo registrar";
			}
           // fin
			//echo $rspta ? "Zona registrada" : "Zona no se pudo registrar";
		}
		else {
			$rspta=$zona->editar($idzona,$provincia,$ciudad,$departamento,$descripcion);
			$contenido='nombre='.$_SESSION["nombre"].' actualizo una nueva ciudad'.$contenido;
			//  modificar aqui
			if ($rspta) {
				bitacora($contenido);
				echo "Zona actualizada";
			} else {
				echo "Zona no se pudo actualizar";
			}
           // fin
		  //echo $rspta ? "Zona actualizada" : "Zona no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$zona->desactivar($idzona);
		$contenido='nombre='.$_SESSION["nombre"].' desactivo una nueva ciudad'.$contenido;
		//  modificar aqui
		if ($rspta) {
			bitacora($contenido);
			echo "Zona Desactivada";
		} else {
			echo "Zona no se puede desactivar";
		}
	   // fin
 		//echo $rspta ? "Zona Desactivada" : "Zona no se puede desactivar";
	break;

	case 'activar':
		$rspta=$zona->activar($idzona);
		$contenido='nombre='.$_SESSION["nombre"].' activo una nueva ciudad'.$contenido;
		//  modificar aqui
		if ($rspta) {
			bitacora($contenido);
			echo "Zona activada";
		} else {
			echo "Zona no se puede activar";
		}
	   // fin
 		//echo $rspta ? "Zona activada" : "Zona no se puede activar";
	break;

	case 'mostrar':
		$rspta=$zona->mostrar($idzona);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$zona->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idzona.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idzona.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idzona.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idzona.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->provincia,
 				"2"=>$reg->ciudad,
 				"3"=>$reg->departamento,
 				"4"=>$reg->descripcion,
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
}
?>