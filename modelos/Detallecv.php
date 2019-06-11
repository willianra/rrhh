<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Detallecv
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($detalle,$fechaInicio,$fechaFin)
	{
		$sql="INSERT INTO detallecv (detalle,fechaInicio,fechaFin,condicion)
		VALUES ('$detalle','$fechaInicio','$fechaFin','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($iddetallecv,$detalle,$fechaInicio,$fechaFin)
	{
		$sql="UPDATE detallecv SET detalle='$detalle',fechaInicio='$fechaInicio' , fechaFin='$fechaFin' WHERE iddetallecv='$iddetallecv'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($iddetallecv)
	{
		$sql="UPDATE detallecv SET condicion='0' WHERE iddetallecv='$iddetallecv'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($iddetallecv)
	{
		$sql="UPDATE detallecv SET condicion='1' WHERE iddetallecv='$iddetallecv'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($iddetallecv)
	{
		$sql="SELECT * FROM detallecv WHERE iddetallecv='$iddetallecv'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM detallecv";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM detallecv where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>