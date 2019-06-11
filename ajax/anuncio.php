<?php 
require_once "../bitacora/bitacora.php";
require_once "../modelos/Anuncio.php";
ob_start();
session_start();
date_default_timezone_set("America/La_Paz");
$anuncio=new Anuncio();

$idanuncio=isset($_POST["idanuncio"])? limpiarCadena($_POST["idanuncio"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
$lugar=isset($_POST["lugar"])? limpiarCadena($_POST["lugar"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$idcontacto=isset($_POST["idcontacto"])? limpiarCadena($_POST["idcontacto"]):"";
$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";
$contenido='id='.$idanuncio.'nombre='.$nombre.'descripcion='.$descripcion.'precio='.$precio.'lugar='.$lugar.'imagen='.$imagen.'idcontacto='.$idcontacto.'idcategoria='.$idcategoria.'fecha.'.date("d-m-Y (H:i:s)", time());
switch ($_GET["op"]){
	case 'guardaryeditar':
	
	if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
	{
		$imagen=$_POST["imagenactual"];
	}
	else 
	{
		$ext = explode(".", $_FILES["imagen"]["name"]);
		if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
		{
			$imagen = round(microtime(true)) . '.' . end($ext);
			move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/usuarios/" . $imagen);
		}
	}

		if (empty($idanuncio)){
			$rspta=$anuncio->insertar($nombre,$descripcion,$precio,$lugar,$imagen,$idcontacto,$idcategoria);
			
			$contenido='nombre='.$_SESSION["nombre"].' inserto un nuevo anuncio'.$contenido;
			//  modificar aqui
			if ($rspta) {
				bitacora($contenido);
				echo "Anuncio registrado";
			} else {
				echo "Anuncio no se pudo registrar";
			}
           // fin  
		}
		else {
			$rspta=$anuncio->editar($idanuncio,$nombre,$descripcion,$precio,$lugar,$imagen,$idcontacto,$idcategoria);
			$contenido='nombre='.$_SESSION["nombre"].' modifico un nuevo anuncio'.$contenido;
			if ($rspta) {
				bitacora($contenido);
				echo "Anuncio actualizado";
			} else {
				echo "Anuncio no se pudo actualizar";
			}
		}
	break;

	case 'desactivar':
		$rspta=$anuncio->desactivar($idanuncio);
		$contenido='nombre='.$_SESSION["nombre"].' desactivo un nuevo anuncio'.$contenido;
//  modificar
	if ($rspta) {
		bitacora($contenido);
		echo "Anuncio Desactivado";
	} else {
		echo "Anuncio no se puede desactivar";
	}
    //echo $rspta ? "Anuncio Desactivado" : "Anuncio no se puede desactivar";
		break;

	case 'activar':
		$rspta=$anuncio->activar($idanuncio);
		$contenido='nombre='.$_SESSION["nombre"].' activo un nuevo anuncio'.$contenido;
	//  modificar
	if ($rspta) {
		bitacora($contenido);
		echo "Anuncio  activado";
	} else {
		echo "Anuncio no se puede activar";
	}
    //echo $rspta ? "Anuncio activado" : "Anuncio no se puede activar";
	break;

	case 'mostrar':
		$rspta=$anuncio->mostrar($idanuncio);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$anuncio->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idanuncio.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idanuncio.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idanuncio.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idanuncio.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->nombre,
 				"2"=>$reg->descripcion,
 				"3"=>$reg->precio,
 				"4"=>$reg->lugar,
 				"5"=>"<img src='../files/usuarios/".$reg->imagen."' height='50px' width='50px' >",
 				"6"=>$reg->idcontacto,
				 "7"=>$reg->idcategoria,
				 // aqui modifico para el estado del producto 
 				"8"=>($reg->condicion)?'<span class="label bg-green">Disponible</span>':
 				'<span class="label bg-red">Vendido</span>'
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
		require_once "../modelos/Categoria.php";
		$categoria = new Categoria();
		$rspta = $categoria->listar();
		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idcategoria . '>' . $reg->nombre . '</option>';
				}
	break;
}
?>