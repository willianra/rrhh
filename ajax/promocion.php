<?php 
require_once "../modelos/Promocion.php";
// traer la  bitacora
require_once "../bitacora/bitacora.php";
ob_start();
session_start();
date_default_timezone_set("America/La_Paz");
//
$promocion=new Promocion();

$idpromocion=isset($_POST["idpromocion"])? limpiarCadena($_POST["idpromocion"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$fechaInicio=isset($_POST["fechaInicio"])? limpiarCadena($_POST["fechaInicio"]):"";
$fechaFin=isset($_POST["fechaFin"])? limpiarCadena($_POST["fechaFin"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
// 
$contenido='id='.$idpromocion.'nombre='.$nombre.'fechaInicio='.$fechaInicio.'fechaFin='.$fechaFin.'descripcion='.$descripcion.'hora'.date("d-m-Y (H:i:s)",time());
// 
switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idpromocion)){
			$rspta=$categoria->insertar($nombre,$descripcion);
			$contenido='nombre='.$_SESSION["nombre"].' inserto un nuevo promocion'.$contenido;
			//  modificar aqui
			if ($rspta) {
				bitacora($contenido);
				echo "Promocion registrada";
			} else {
				echo "Promocion no se pudo registrar";
			}
           // fin
			//echo $rspta ? "Categoría registrada" : "Categoría no se pudo registrar";
		}
		else {
			$rspta=$categoria->editar($idpromocion,$nombre,$fechaInicio,$fechaFin,$descripcion);
			//  modificar aqui
			$contenido='nombre='.$_SESSION["nombre"].' inserto un nuevo promocion'.$contenido;
			if ($rspta) {
				bitacora($contenido);
				echo "Promocion actualizada";
			} else {
				echo "Promocion no se pudo actualizar";
			}
           // fin
		  //echo $rspta ? "Categoría actualizada" : "Categoría no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$categoria->desactivar($idpromocion);
		//  modificar aqui
		$contenido='nombre='.$_SESSION["nombre"].' inserto un nuevo promocion'.$contenido;
		if ($rspta) {
			bitacora($contenido);
			echo "Promocion Desactivada";
		} else {
			echo "Promocion no se puede desactivar";
		}
	   // fin 
		//echo $rspta ? "Categoría Desactivada" : "Categoría no se puede desactivar";
	break;

	case 'activar':
		$rspta=$categoria->activar($idpromocion);
		 //  modificar aqui
		 $contenido='nombre='.$_SESSION["nombre"].' inserto un nuevo promocion'.$contenido;
		if ($rspta) {
			bitacora($contenido);
			echo "Promocion activada";
		} else {
			echo "Promocion no se puede activar";
		}
	   // fin
		//echo $rspta ? "Categoría activada" : "Categoría no se puede activar";
	break;

	case 'mostrar':
		$rspta=$categoria->mostrar($idpromocion);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$promocion->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpromocion.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idpromocion.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idpromocion.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idpromocion.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->fechaInicio,
 				"3"=>$reg->fechaFin,
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