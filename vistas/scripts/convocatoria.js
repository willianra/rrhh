var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	$.post("../ajax/convocatoria.php?op=selectTipo2", function(r){
		$("#nombreconvocatoria").html(r);
		$('#nombreconvocatoria').selectpicker('refresh');
	});
}

//Función limpiar
function limpiar()
{
	$("#idconvocatoria").val("");
	$("#nombreconvocatoria").val("");
	$("#descripcion").val("");
	$("#cargo").val("");
	$("#sueldo").val("");
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
					url: '../ajax/convocatoria.php?op=listar',
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
		url: "../ajax/convocatoria.php?op=guardaryeditar",
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

function mostrar(idconvocatoria)
{
	$.post("../ajax/convocatoria.php?op=mostrar",{idconvocatoria : idconvocatoria}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#nombreconvocatoria").val(data.nombreconvocatoria);
		$("#descripcion").val(data.descripcion);
 		$("#idconvocatoria").val(data.idconvocatoria);
		$("#cargo").val(data.cargo);
		$("#sueldo").val(data.sueldo);
 	})
}

//Función para desactivar registros
function desactivar(idconvocatoria)
{
	bootbox.confirm("¿Está Seguro de desactivar la Convocatoria?", function(result){
		if(result)
        {
        	$.post("../ajax/convocatoria.php?op=desactivar", {idconvocatoria : idconvocatoria}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idconvocatoria)
{
	bootbox.confirm("¿Está Seguro de activar la convocatoria?", function(result){
		if(result)
        {
        	$.post("../ajax/convocatoria.php?op=activar", {idconvocatoria : idconvocatoria}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();