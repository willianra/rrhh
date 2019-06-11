var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
}

//Función limpiar
function limpiar()
{
	$("#iddetallecv").val("");
	$("#detalle").val("");
	$("#fechaInicio").val("");
	$("#fechaFin").val("");
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
					url: '../ajax/detallecv.php?op=listar',
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
		url: "../ajax/detallecv.php?op=guardaryeditar",
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

function mostrar(iddetallecv)
{
	$.post("../ajax/detallecv.php?op=mostrar",{iddetallecv : iddetallecv}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#detalle").val(data.detalle);
		$("#fechaInicio").val(data.fechaInicio);
		$("#fechaFin").val(data.fechaFin);
 		$("#iddetallecv").val(data.iddetallecv);

 	})
}

//Función para desactivar registros
function desactivar(iddetallecv)
{
	bootbox.confirm("¿Está Seguro de desactivar el Detalle de la Hoja de Vida?", function(result){
		if(result)
        {
        	$.post("../ajax/detallecv.php?op=desactivar", {iddetallecv : iddetallecv}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(iddetallecv)
{
	bootbox.confirm("¿Está Seguro de activar el Detalle de la Hoja de Vida?", function(result){
		if(result)
        {
        	$.post("../ajax/detallecv.php?op=activar", {iddetallecv : iddetallecv}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();