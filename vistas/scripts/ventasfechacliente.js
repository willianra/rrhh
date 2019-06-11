var tabla;

//Función que se ejecuta al inicio
function init(){
	// listar();
	//Cargamos los items al select cliente
	$.post("../ajax/postulante.php?op=selectTipo1", function(r){
	            $("#idpostulante").html(r);
	            $('#idpostulante').selectpicker('refresh');
	});
}


//Función Listar
function listar()
{
	// var fecha_inicio = $("#fecha_inicio").val();
	// var fecha_fin = $("#fecha_fin").val();
	var idpostulante = $("#idpostulante").val();

	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					// url: '../ajax/consultas.php?op=ventasfechacliente',
					// data:{fecha_inicio: fecha_inicio,fecha_fin: fecha_fin, idcliente: idcliente},
					url: '../ajax/postulante.php?op=listar',
					data:{ idpostulante: idpostulante},
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


init();