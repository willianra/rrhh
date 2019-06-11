<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Hojavida
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($fechaRegistro,$descripcion)
	{
		$sql="INSERT INTO hoja_de_vida (fechaRegistro,descripcion,condicion)
		VALUES ('$fechaRegistro','$descripcion','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idhojavida,$fechaRegistro,$descripcion)
	{
		$sql="UPDATE hoja_de_vida SET fechaRegistro='$fechaRegistro',descripcion='$descripcion' WHERE idhojavida='$idhojavida'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idhojavida)
	{
		$sql="UPDATE hoja_de_vida SET condicion='0' WHERE idhojavida='$idhojavida'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idhojavida)
	{
		$sql="UPDATE hoja_de_vida SET condicion='1' WHERE idhojavida='$idhojavida'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idhojavida)
	{
		$sql="SELECT * FROM hoja_de_vida WHERE idhojavida='$idhojavida'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM hoja_de_vida";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM hoja_de_vida where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>