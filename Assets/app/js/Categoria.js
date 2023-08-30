
document.addEventListener("DOMContentLoaded",function() {
	
}, false);
	

	

async function agregar(){
		event.preventDefault();
		let formCategoria = new FormData(document.querySelector("#form_categoria"));
	try {
		const url = `${base_url}/Categoria_Dashboard/agregar`;
		const respuesta = await fetch(url,{
			method: "POST",
			body: formCategoria,
		});
		const resultado = await respuesta.json();
		console.log(resultado);
	} catch(err) {
		
		console.log(err);
	}

	
}