<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Empleado
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpersona,$cargo,$fecha,$sueldomensual)
	{
		$sql="INSERT INTO empleado (idpersona,cargo,fecha,sueldomensual,condicion)
		VALUES ('$idpersona','$cargo','$fecha','$sueldomensual','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idempleado,$idpersona,$cargo,$fecha,$sueldomensual)
	{
		$sql="UPDATE empleado SET idpersona='$idpersona',cargo='$cargo',fecha='$fecha',sueldomensual='$sueldomensual' WHERE idempleado='$idempleado'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idempleado)
	{
		$sql="UPDATE empleado SET condicion='0' WHERE idempleado='$idempleado'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idempleado)
	{
		$sql="UPDATE empleado SET condicion='1' WHERE idempleado='$idempleado'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idempleado)
	{
		$sql="SELECT * FROM empleado WHERE idempleado='$idempleado'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{ 
		$sql="SELECT idempleado ,nombre as idpersona , cargo,fecha ,sueldomensual ,empleado.condicion FROM `empleado`, persona WHERE empleado.idpersona= persona.idpersona 
		 order by idempleado desc";
		 
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM empleado where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>