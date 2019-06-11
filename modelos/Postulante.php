<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Postulante
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($idpersona,$codigo,$cargo)
	{
		$sql="INSERT INTO postulante (idpersona,codigo,cargo,condicion)
		VALUES ('$idpersona','$codigo','$cargo','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idpostulante,$idpersona,$codigo,$cargo)
	{
		$sql="UPDATE postulante SET idpersona ='$idpersona',codigo='$codigo', cargo='$cargo' WHERE idpostulante='$idpostulante'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar categorías
	public function desactivar($idpostulante)
	{
		$sql="UPDATE postulante SET condicion='0' WHERE idpostulante='$idpostulante'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar categorías
	public function activar($idpostulante)
	{
		$sql="UPDATE postulante SET condicion='1' WHERE idpostulante='$idpostulante'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpostulante)
	{
		$sql="SELECT * FROM postulante WHERE idpostulante='$idpostulante'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT idpostulante , nombre as idpersona ,codigo,cargo,postulante.condicion FROM `postulante` , persona WHERE postulante.idpersona= persona.idpersona order by idpostulante desc";

		return ejecutarConsulta($sql);		
	}
	public function listarPostulante()
	{
		$sql="SELECT idpostulante , nombre as idpersona ,codigo,cargo,postulante.condicion FROM `postulante` , persona WHERE postulante.idpersona= persona.idpersona  and postulante.condicion=1  order by idpostulante desc";

		return ejecutarConsulta($sql);		
	}
	//Implementar un método para listar los registros y mostrar en el select
	public function select()
	{
		$sql="SELECT * FROM postulante where condicion=1";
		return ejecutarConsulta($sql);		
	}
}

?>