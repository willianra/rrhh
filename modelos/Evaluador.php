<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Evaluador
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpersona,$iddepartamento)
	{
		$sql="INSERT INTO evaluador (idpersona,iddepartamento,condicion)
		VALUES ('$idpersona','$iddepartamento','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idevaluador,$idpersona,$iddepartamento)
	{
		$sql="UPDATE evaluador SET idpersona='$idpersona',iddepartamento='$iddepartamento' WHERE idevaluador='$idevaluador'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idevaluador)
	{
		$sql="UPDATE evaluador SET condicion='0' WHERE idevaluador='$idevaluador'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idevaluador)
	{
		$sql="UPDATE evaluador SET condicion='1' WHERE idevaluador='$idevaluador'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idevaluador)
	{
		$sql="SELECT * FROM evaluador WHERE idevaluador='$idevaluador'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT idevaluador , nombre as idpersona , nombredepartamento as iddepartamento   ,evaluador.condicion FROM `evaluador` ,departamento, persona WHERE evaluador.idpersona= persona.idpersona 
		and evaluador.iddepartamento= departamento.iddepartamento order by idevaluador desc";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM evaluador where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>