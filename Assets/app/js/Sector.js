function eliminarFnt(element) {
	let idSector = element.dataset.idsector;
	let nombreSector = element.dataset.namesector;
	let resp = document.getElementById("resp");


    async function eliminado() {
		const datos = new FormData();
		datos.append('id', idSector);
		datos.append('nombre', nombreSector);


		try {
			const url = `${base_url}/Sector_Dashboard/eliminar`;
			const respuesta = await fetch(url, {
				method: "POST",
				body: datos,
			});
			const resultado = await respuesta.json();

			if (resultado.status) {
				resp.innerHTML = `${resultado.msg}`;
				window.location.href = `${base_url}/Sector_Dashboard`;

			} else {
				resp.innerHTML = `${resultado.error}`;				
				window.location.href = `${base_url}/Sector_Dashboard`;
				
			}


		} catch (err) {
			console.log(err);
			let message = err.statusText || "Ocurrio un error";
			resp.innerHTML = `error: ${err.status} : ${message}`;
		}
	}


	Swal.fire({
		title: '¿Estas seguro?',
		text: "¡No podrás revertir esto.!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Eliminar',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire(
				'¡Eliminado!',
				'Tu archivo ha sido eliminado.',
				'success',
			)
			eliminado();
		}
	})




}