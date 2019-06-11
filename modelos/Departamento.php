<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Departamento
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($funciones,$nombredepartamento)
	{
		$sql="INSERT INTO departamento (funciones,nombredepartamento,condicion)
		VALUES ('$funciones','$nombredepartamento','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($iddepartamento,$funciones,$nombredepartamento)
	{
		$sql="UPDATE departamento SET funciones='$funciones',nombredepartamento='$nombredepartamento' WHERE iddepartamento='$iddepartamento'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($iddepartamento)
	{
		$sql="UPDATE departamento SET condicion='0' WHERE iddepartamento='$iddepartamento'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($iddepartamento)
	{
		$sql="UPDATE departamento SET condicion='1' WHERE iddepartamento='$iddepartamento'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($iddepartamento)
	{
		$sql="SELECT * FROM departamento WHERE iddepartamento='$iddepartamento'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM departamento";
		return ejecutarConsulta($sql);		
	}
	public function listarDepartamento()
	{
		$sql="SELECT * FROM departamento";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM departamento where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>