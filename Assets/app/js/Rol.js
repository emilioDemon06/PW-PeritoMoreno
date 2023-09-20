document.addEventListener("DOMContentLoaded", function () {
	tableUsuario = new DataTable("#tableRol",{
		aProcessing: true,
		aServerSide: true,
		

		//lenguaje en español de la tabla
		language: {
        	url: `${base_url}/Assets/plugins/DataTable/datatable-spanish/spanish.json`
		},

		//consultar los datos desde la url
		ajax:{
			url: `${base_url}/Rol_Dashboard/mostrarRol`,
			dataSrc: ""
		},
		//datos desde el servidor
		columns:[
			{data:"ID"},
			{data:"Nombre"},
			{data:"is_activo"},
			{
				defaultContent: "<button type='button' class='editarfnt btn btn-warning btn-sm me-1' >Editar</button><button type='button' class='eliminarfnt btn btn-danger btn-sm'>Eliminar</button>"
			},
			
		],
		//paginación
		lengthMenu:[5,10,25],
		iDisplayLength:5,
		pagingType: 'full_numbers',
		//ocultar columnas
		columnDefs:[
			{
			targets:[0],
			visible:false,
			serchable:false,
			}
		],
		//ordenar por nombre 
		order:[1,"asc"],
		//mostrar botones de exportacion
		dom: "lBfrtip",
		buttons:[
			{
				extend:"copyHtml5",
				text:"Copiar",
				titleAttr: "Copiar",
				className: "btn btn-info",
			},
			{
				extend:"excelHtml5",
				text:"Excel",
				titleAttr: "Exportar a Excel",
				className: "btn btn-success",
			},
			{
				extend:"pdfHtml5",
				text:"PDF",
				titleAttr: "Exportar a PDF",
				className: "btn btn-danger",
			},
		],
		
	});


}, false )