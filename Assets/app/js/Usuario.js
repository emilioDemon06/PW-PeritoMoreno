document.addEventListener("DOMContentLoaded",function() {
	
}, false);
	

	

async function agregarUsers(){
		event.preventDefault();
		
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
	    }else{	
	      resp.innerHTML = `<div class="alert alert-danger" role="alert">${resultado.error}</div>`;
	    }
	    
	} catch(err) {
		
		console.log(err);
		let message = err.statusText || "Ocurrio un error";
		resp.innerHTML = `error: ${err.status} : ${message}`;
	}

	
}