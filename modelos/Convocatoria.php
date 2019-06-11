<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Convocatoria
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nombreconvocatoria,$descripcion,$cargo,$sueldo)
	{
		$sql="INSERT INTO convocatoria (nombreconvocatoria,descripcion,cargo,sueldo,condicion)
		VALUES ('$nombreconvocatoria','$descripcion','$cargo','$sueldo','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idconvocatoria,$nombreconvocatoria,$descripcion,$cargo,$sueldo)
	{
		$sql="UPDATE convocatoria SET nombreconvocatoria='$nombreconvocatoria',descripcion='$descripcion', cargo='$cargo', sueldo='$sueldo' WHERE idconvocatoria='$idconvocatoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idconvocatoria)
	{
		$sql="UPDATE convocatoria SET condicion='0' WHERE idconvocatoria='$idconvocatoria'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idconvocatoria)
	{
		$sql="UPDATE convocatoria SET condicion='1' WHERE idconvocatoria='$idconvocatoria'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idconvocatoria)
	{
		$sql="SELECT * FROM convocatoria WHERE idconvocatoria='$idconvocatoria'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM convocatoria";
		return ejecutarConsulta($sql);		
	}
	public function listarC($cargo)
	{
		$sql="SELECT * FROM convocatoria where cargo='$cargo'";
		return ejecutarConsulta($sql);		
	}
	public function listarConvocatorias()
	{
		$sql="SELECT * FROM convocatoria where condicion=1";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM convocatoria where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>