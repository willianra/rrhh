<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Verificador
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idusuario,$identrevista,$idformulario,$descripcion,$fecha)
	{
		$sql="INSERT INTO verificar (idusuario,identrevista,idformulario,descripcion,fecha,condicion)
		VALUES ('$idusuario','$identrevista','$idformulario','$descripcion','$fecha','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idverificar,$idusuario,$identrevista,$idformulario,$descripcion,$fecha)
	{
		$sql="UPDATE verificar SET idusuario='$idusuario',identrevista='$identrevista',idformulario='$idformulario',
		                             descripcion='$descripcion',fecha='$fecha' WHERE idverificar='$idverificar'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idverificar)
	{
		$sql="UPDATE verificar SET condicion='0' WHERE idverificar='$idverificar'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idverificar)
	{
		$sql="UPDATE verificar SET condicion='1' WHERE idverificar='$idverificar'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idverificar)
	{
		$sql="SELECT * FROM verificar WHERE idverificar='$idverificar'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM verificar";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM verificar where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>