var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	$.post("../ajax/postulante.php?op=selectTipo1", function(r){
		$("#idpersona").html(r);
		$('#idpersona').selectpicker('refresh');
});
}

//Función limpiar
function limpiar()
{
	$("#idpostulante").val("");
	$("#idpersona").val("");
	$("#codigo").val("");
	$("#cargo").val("");
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
					url: '../ajax/postulante.php?op=listar',
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
		url: "../ajax/postulante.php?op=guardaryeditar",
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

function mostrar(idpostulante)
{
	$.post("../ajax/postulante.php?op=mostrar",{idpostulante : idpostulante}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idpersona").val(data.idpersona);
		$("#codigo").val(data.codigo);
		$("#cargo").val(data.cargo);
 		$("#idpostulante").val(data.idpostulante);
 	})
}

//Función para desactivar registros
function desactivar(idpostulante)
{
	bootbox.confirm("¿Está Seguro de desactivar al Postulante?", function(result){
		if(result)
        {
        	$.post("../ajax/postulante.php?op=desactivar", {idpostulante : idpostulante}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idpostulante)
{
	bootbox.confirm("¿Está Seguro de activar al Postulante?", function(result){
		if(result)
        {
        	$.post("../ajax/postulante.php?op=activar", {idpostulante : idpostulante}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();