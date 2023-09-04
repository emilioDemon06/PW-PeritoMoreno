
let tableUsuario;

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
			{data:"nombre"}
		],

		//ocultar columnas
		columnDefs:[
			{
			targets:[0],
			visible:false,
			serchable:false,
			}
		],
		//mostrar botones de exportacion
		dom: "lBfrtip",
		buttons:[
			{
				extend:"copyHtml5",
				text:"copiar",
				titleAttr: "Copiar",
				className: "btn btn-primary",
			},
			{
				extend:"excelHtml5",
				text:"exportar",
				titleAttr: "Exportar a Excel",
				className: "btn btn-warning",
			},
		],
	})
}, false )



/*document.querySelector("#form_users").addEventListener("submit",function(e) {
	e.preventDefault();
	agregarUsers();
});
	

	

async function agregarUsers(){
		
		let formUsers = new FormData(document.querySelector("#form_users"));
		let resp = document.getElementById("respuesta");
	try
	{
		const url = `${base_url}/Usuario_Dashboard/agregarUsers`;
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
	
	
}*/