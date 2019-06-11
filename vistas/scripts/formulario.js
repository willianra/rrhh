var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	$.post("../ajax/formulario.php?op=selectTipo1", function(r){
		$("#idconvocatoria").html(r);
		$('#idconvocatoria').selectpicker('refresh');
});
	$.post("../ajax/formulario.php?op=selectTipo2", function(r){
		$("#idpostulante").html(r);
		$('#idpostulante').selectpicker('refresh');
});
	$.post("../ajax/formulario.php?op=selectTipo3", function(r){
		$("#idempleado").html(r);
		$('#idempleado').selectpicker('refresh');
});
}

//Función limpiar
function limpiar()
{
	$("#idformulario").val("");
	$("#idconvocatoria").val("");
	$("#nombre").val("");
	$("#descripcion").val("");
	$("#fecha").val("");
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
					url: '../ajax/formulario.php?op=listar',
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
		url: "../ajax/formulario.php?op=guardaryeditar",
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

function mostrar(idformulario)
{
	$.post("../ajax/formulario.php?op=mostrar",{idformulario : idformulario}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idconvocatoria").val(data.idconvocatoria);
		$("#nombre").val(data.nombre);
 		$("#idformulario").val(data.idformulario);
 		$("#descripcion").val(data.descripcion);
 		$("#fecha").val(data.fecha);

 	})
}

//Función para desactivar registros
function desactivar(idformulario)
{
	bootbox.confirm("¿Está Seguro de desactivar el Formulario?", function(result){
		if(result)
        {
        	$.post("../ajax/formulario.php?op=desactivar", {idformulario : idformulario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idformulario)
{
	bootbox.confirm("¿Está Seguro de activar el Formulario?", function(result){
		if(result)
        {
        	$.post("../ajax/formulario.php?op=activar", {idformulario : idformulario}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();