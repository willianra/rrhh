<?php 
require_once "../modelos/Contacto.php";
// traer la  bitacora
require_once "../bitacora/bitacora.php";
ob_start();
session_start();
date_default_timezone_set("America/La_Paz");
//
$contacto=new Contacto();

$idcontacto=isset($_POST["idcontacto"])? limpiarCadena($_POST["idcontacto"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
// 
$contenido='id='.$idcontacto.'nombre='.$nombre.'telefono='.$telefono.'imagen='.$imagen.'fecha.'.date("d-m-Y (H:i:s)", time());
// 
switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($idcontacto)){
			$rspta=$contacto->insertar($nombre,$telefono,$imagen);
			$contenido='nombre='.$_SESSION["nombre"].' inserto un nuevo contacto'.$contenido;
			//  modificar aqui
			if ($rspta) {
				bitacora($contenido);
				echo "Contacto registrado";
			} else {
				echo "Contacto no se pudo registrar";
			}
           // fin  
			//echo $rspta ? "Contacto registrado" : "Contacto no se pudo registrar";
		}
		else {
			$rspta=$contacto->editar($idcontacto,$nombre,$telefono,$imagen);
			// 
			$contenido='nombre='.$_SESSION["nombre"].' actualizado un nuevo contacto'.$contenido;
			//  modificar aqui
			if ($rspta) {
				bitacora($contenido);
				echo "Contacto actualizado";
			} else {
				echo "Contacto no se pudo actualizar";
			}
           // fin  
		   // echo $rspta ? "Contacto actualizado" : "Contacto no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$contacto->desactivar($idcontacto);
		// 
		$contenido='nombre='.$_SESSION["nombre"].'Desactivado  un nuevo contacto'.$contenido;
		//  modificar aqui
		if ($rspta) {
			bitacora($contenido);
			echo "Contacto Desactivado";
		} else {
			echo "Contacto no se puede desactivar";
		}
	   // fin  
 	   //echo $rspta ? "Contacto Desactivado" : "Contacto no se puede desactivar";
	break;

	case 'activar':
		$rspta=$contacto->activar($idcontacto);
		// 
		$contenido='nombre='.$_SESSION["nombre"].'A activado un nuevo contacto'.$contenido;
		//  modificar aqui
		if ($rspta) {
			bitacora($contenido);
			echo "Contacto activada";
		} else {
			echo "Contacto no se puede activar";
		}
	   // fin  
 	  // echo $rspta ? "Contacto activada" : "Contacto no se puede activar";
	break;

	case 'mostrar':
		$rspta=$contacto->mostrar($idcontacto);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$contacto->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcontacto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idcontacto.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcontacto.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idcontacto.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->telefono,
 				"3"=>$reg->imagen,
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
}
?>