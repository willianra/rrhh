<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Zona
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($provincia,$ciudad,$departamento,$descripcion)
	{
		$sql="INSERT INTO zona (provincia,ciudad,departamento,descripcion,condicion)
		VALUES ('$provincia','$ciudad','$departamento','$descripcion','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idzona,$provincia,$ciudad,$departamento,$descripcion)
	{
		$sql="UPDATE zona SET provincia='$provincia',ciudad='$ciudad', departamento='$departamento', descripcion='$descripcion' WHERE idzona='$idzona'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idzona)
	{
		$sql="UPDATE zona SET condicion='0' WHERE idzona='$idzona'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idzona)
	{
		$sql="UPDATE zona SET condicion='1' WHERE idzona='$idzona'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idzona)
	{
		$sql="SELECT * FROM zona WHERE idzona='$idzona'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM zona";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM zona where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>