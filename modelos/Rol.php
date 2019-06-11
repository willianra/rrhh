<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Rol
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$descripcion)
	{
		$sql="INSERT INTO rol (nombre,descripcion,condicion)
		VALUES ('$nombre','$descripcion','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idrol,$nombre,$descripcion)
	{
		$sql="UPDATE rol SET nombre='$nombre',descripcion='$descripcion' WHERE idrol='$idrol'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idrol)
	{
		$sql="UPDATE rol SET condicion='0' WHERE idrol='$idrol'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idrol)
	{
		$sql="UPDATE rol SET condicion='1' WHERE idrol='$idrol'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idrol)
	{
		$sql="SELECT * FROM rol WHERE idrol='$idrol'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM rol";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM rol where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>