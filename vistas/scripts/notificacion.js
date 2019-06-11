var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	$.post("../ajax/formulario.php?op=selectTipo2", function(r){
		$("#idpostulante").html(r);
		$('#idpostulante').selectpicker('refresh');
});
}

//Función limpiar
function limpiar()
{
	$("#idnotificacion").val("");
	$("#idpostulante").val("");
	$("#descripcion").val("");
	$("#correo").val("");
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
					url: '../ajax/notificacion.php?op=listar',
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
		url: "../ajax/notificacion.php?op=guardaryeditar",
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

function mostrar(idnotificacion)
{
	$.post("../ajax/notificacion.php?op=mostrar",{idnotificacion : idnotificacion}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idpostulante").val(data.idpostulante);
		$("#descripcion").val(data.descripcion);
		$("#correo").val(data.correo);
 		$("#idnotificacion").val(data.idnotificacion);

 	})
}

//Función para desactivar registros
function desactivar(idnotificacion)
{
	bootbox.confirm("¿Está Seguro de desactivar la Notificacion?", function(result){
		if(result)
        {
        	$.post("../ajax/notificacion.php?op=desactivar", {idnotificacion : idnotificacion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idnotificacion)
{
	bootbox.confirm("¿Está Seguro de activar la Notifacacion?", function(result){
		if(result)
        {
        	$.post("../ajax/notificacion.php?op=activar", {idnotificacion : idnotificacion}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();