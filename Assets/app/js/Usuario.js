
let tableUsuario;
let formNuevo = document.querySelector("#form_nuevo");
let resp = document.getElementById("respuesta");

document.addEventListener("DOMContentLoaded", function () {
	tableUsuario = new DataTable("#tableUser",{
		aProcessing: true,
		aServerSide: true,
		

		//lenguaje en español de la tabla
		language: {
        	url: `${base_url}/Assets/plugins/DataTable/datatable-spanish/spanish.json`
		},

		//consultar los datos desde la url
		ajax:{
			url: `${base_url}/Usuario_Dashboard/mostrarUser`,
			dataSrc: ""
		},
		//datos desde el servidor
		columns:[
			{data:"ID"},
			{data:"NombreUser"},
			{data:"NombreRol"},
			{data:"Correo"},
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

	nuevo();

}, false )

//boton editar
$("#tableUser tbody").on("click", "button.editarfnt", async function(){
		let data_table = tableUsuario.row($(this).parents("tr")).data();
		let idUser = data_table.ID;
		window.location.href = `${base_url}/Usuario_Dashboard/editar/${idUser}`;
	}
)


/*document.querySelector("#form_users").addEventListener("submit",function(e) {
	e.preventDefault();
	nuevo();
});*/
	

	

async function nuevo(){
		
		let formUsers = new FormData(formNuevo);
	try
	{
		const url = `${base_url}/Usuario_Dashboard/nuevo`;
		const respuesta = await fetch(url,{
			method: "POST",
			body: formUsers,
		});
		const resultado = await respuesta.json();

		if(resultado.status){
	      resp.innerHTML = `<div class="alert alert-success" role="alert">${resultado.msg}</div>`;
	      setTimeout(()=>{
	      		window.location.href = `${base_url}/Usuario_Dashboard`;
			},1000);
	    }else{	
	      resp.innerHTML = `<div class="alert alert-danger" role="alert">${resultado.error}</div>`;
	    }
	    
	} catch(err) {
		
		console.log(err);
		let message = err.statusText || "Ocurrio un error";
		resp.innerHTML = `error: ${err.status} : ${message}`;
	}
	
	
}