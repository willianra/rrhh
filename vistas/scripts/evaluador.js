var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	$.post("../ajax/evaluador.php?op=selectTipo1", function(r){
		$("#idpersona").html(r);
		$('#idpersona').selectpicker('refresh');
});

$.post("../ajax/evaluador.php?op=selectTipo2", function(r){
	$("#iddepartamento").html(r);
	$('#iddepartamento').selectpicker('refresh');
});
}

//Función limpiar
function limpiar()
{
	$("#idevaluador").val("");
	$("#idpersona").val("");
	$("#iddepartamento").val("");
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
					url: '../ajax/evaluador.php?op=listar',
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
		url: "../ajax/evaluador.php?op=guardaryeditar",
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

function mostrar(idevaluador)
{
	$.post("../ajax/evaluador.php?op=mostrar",{idevaluador : idevaluador}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idpersona").val(data.idpersona);
		$("#iddepartamento").val(data.iddepartamento);
 		$("#idevaluador").val(data.idevaluador);

 	})
}

//Función para desactivar registros
function desactivar(idevaluador)
{
	bootbox.confirm("¿Está Seguro de desactivar al evaluador", function(result){
		if(result)
        {
        	$.post("../ajax/evaluador.php?op=desactivar", {idevaluador : idevaluador}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idevaluador)
{
	bootbox.confirm("¿Está Seguro de activar al evaluador?", function(result){
		if(result)
        {
        	$.post("../ajax/evaluador.php?op=activar", {idevaluador : idevaluador}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();