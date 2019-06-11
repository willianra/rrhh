<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Contacto
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombre,$telefono,$imagen)
	{
		$sql="INSERT INTO contacto (nombre,telefono,imagen,condicion)
		VALUES ('$nombre','$telefono','$imagen','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idcontacto,$nombre,$telefono,$imagen)
	{
		$sql="UPDATE contacto SET nombre='$nombre',telefono='$telefono',imagen = '$imagen' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idcontacto)
	{
		$sql="UPDATE contacto SET condicion='0' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idcontacto)
	{
		$sql="UPDATE contacto SET condicion='1' WHERE idcontacto='$idcontacto'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idcontacto)
	{
		$sql="SELECT * FROM contacto WHERE idcontacto='$idcontacto'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM contacto";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM contacto where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>