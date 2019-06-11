<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Formulario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idconvocatoria,$idpostulante,$idempleado,$fecha)
	{
		$sql="INSERT INTO formulario (idconvocatoria,idpostulante,idempleado,fecha,condicion)
		VALUES ('$idconvocatoria','$idpostulante','$idempleado','$fecha','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idformulario,$idconvocatoria,$idpostulante,$idempleado,$fecha)
	{
		$sql="UPDATE formulario SET idconvocatoria='$idconvocatoria',idpostulante='$idpostulante', idempleado='$idempleado',fecha ='$fecha' WHERE idformulario='$idformulario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idformulario)
	{
		$sql="UPDATE formulario SET condicion='0' WHERE idformulario='$idformulario'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idformulario)
	{
		$sql="UPDATE formulario SET condicion='1' WHERE idformulario='$idformulario'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idformulario)
	{
		$sql="SELECT * FROM formulario WHERE idformulario='$idformulario'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		
		//$sql="SELECT idformulario ,idconvocatoria , idpostulante ,idempleado,fecha ,formulario.condicion FROM `formulario` ,departamento, persona WHERE evaluador.idpersona= persona.idpersona 
		//and evaluador.iddepartamento= departamento.iddepartamento order by idevaluador desc";
		$sql="SELECT * FROM formulario";
		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM formulario where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>