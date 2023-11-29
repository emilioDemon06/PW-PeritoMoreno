document.addEventListener("DOMContentLoaded", function () {
	tableUsuario = new DataTable("#tablePermiso",{
		aProcessing: true,
		aServerSide: true,
		

		//lenguaje en español de la tabla
		language: {
        	url: `${base_url}/Assets/plugins/DataTable/datatable-spanish/spanish.json`
		},
		//ocultar columnas
		columnDefs:[
			{
			targets:[0],
			visible:true,
			serchable:false,
			}
		],
		//ordenar por nombre 
		//order:[1,"asc"],
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
		lengthMenu: [
			[5,10,25,50,-1],
			[5,10,25,50,"All"],
		],
		iDisplayLength: 5,
		order: [[0,"asc"]],		
	})
	false
})