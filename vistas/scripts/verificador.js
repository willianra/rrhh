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
	$("#idverificar").val("");
	$("#idusuario").val("");
	$("#identrevista").val("");
	$("#idformulario").val("");
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
					url: '../ajax/verificador.php?op=listar',
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
		url: "../ajax/verificador.php?op=guardaryeditar",
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

function mostrar(idverificar)
{
	$.post("../ajax/verificador.php?op=mostrar",{idverificar : idverificar}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idusuario").val(data.idusuario);
		$("#identrevista").val(data.identrevista);
 		$("#idverificar").val(data.idverificar);
 		$("#idformulario").val(data.idformulario);
 		$("#descripcion").val(data.descripcion);
 		$("#fecha").val(data.fecha);

 	})
}

//Función para desactivar registros
function desactivar(idverificar)
{
	bootbox.confirm("¿Está Seguro de desactivar la Verificacion?", function(result){
		if(result)
        {
        	$.post("../ajax/verificador.php?op=desactivar", {idverificar : idverificar}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idverificar)
{
	bootbox.confirm("¿Está Seguro de activar la Verificacion?", function(result){
		if(result)
        {
        	$.post("../ajax/verificador.php?op=activar", {idverificar : idverificar}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();