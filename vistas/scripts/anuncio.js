var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});

	$.post("../ajax/anuncio.php?op=selectCategoria", function(r){
		$("#idcategoria").html(r);
		$('#idcategoria').selectpicker('refresh');

});

}

//Función limpiar
function limpiar()
{
	$("#idanuncio").val("");
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#precio").val("");
	$("#lugar").val("");
	$("#imagenmuestra").attr("src","");
	$("#imagenactual").val("");
	$("#idcontacto").val("");
	// $("#idcategoria").val("");
	
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
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
					url: '../ajax/anuncio.php?op=listar',
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
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/anuncio.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idanuncio)
{
	$.post("../ajax/anuncio.php?op=mostrar",{idanuncio : idanuncio}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombre").val(data.nombre);
		$("#descripcion").val(data.descripcion);
 		$("#idanuncio").val(data.idanuncio);
 		$("#precio").val(data.precio);
 		$("#lugar").val(data.lugar);
		 
		 $("#imagenmuestra").show();
		$("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
		$("#imagenactual").val(data.imagen);

		 $("#idcontacto").val(data.idcontacto); 
		 $("#idcategoria").val(data.idcategoria);

 	})
}

//Función para desactivar registros
function desactivar(idanuncio)
{
	bootbox.confirm("¿Está Seguro de desactivar la Anuncio?", function(result){
		if(result)
        {
        	$.post("../ajax/anuncio.php?op=desactivar", {idanuncio : idanuncio}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idanuncio)
{
	bootbox.confirm("¿Está Seguro de activar la Anuncio?", function(result){
		if(result)
        {
        	$.post("../ajax/anuncio.php?op=activar", {idanuncio : idanuncio}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();