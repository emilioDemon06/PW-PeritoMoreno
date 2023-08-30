
document.querySelector("#form_login").addEventListener("submit",function(e) {
	e.preventDefault();
	login();	
});
	

	

async function login(){
		const formLogin = new FormData(document.querySelector("#form_login"));
		let resp = document.getElementById("respuesta");
	try {
		const url = `${base_url}/Login/ingresar`;
		const respuesta = await fetch(url,{
			method: "POST",
			body: formLogin,
		});
		const resultado = await respuesta.json();
		

		if(resultado.status){
			resp.innerHTML = `<div class="alert alert-success" role="alert">${resultado.msg}</div>`;
			setTimeout(()=>{
	      		window.location.href = `${base_url}/Dashboard`;
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