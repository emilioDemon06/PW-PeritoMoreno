//boton eliminar

	

	
	function eliminarFnt(element) {
		let idRol = element.dataset.idrol;
		let nombreRol = element.dataset.namerol;
		let resp = document.getElementById("resp");


		async function eliminado() {
			const datos = new FormData();
			datos.append('id', idRol);
			datos.append('nombre', nombreRol);

			try {
				const url = `${base_url}/Rol_Dashboard/eliminar`;
				const respuesta = await fetch(url, {
					method: "POST",
					body: datos,
				});
				const resultado = await respuesta.json();

				if (resultado.status) {
					resp.innerHTML = `${resultado.msg}`;
					window.location.href = `${base_url}/Rol_Dashboard`;

				} else {
					
					resp.innerHTML = `${resultado.error}`;				
					window.location.href = `${base_url}/Rol_Dashboard`;
					
				}


			} catch (err) {
				console.log(err.name);
				console.log(err.message);
				let message = err.statusText || "Ocurrio un error";
				let message2 = '<div class="alert alert-danger alert-dismissible fade show" role="alert">No se pudo eliminar rol, recuerde que algunos usuarios estan adheridos a este rol.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
				//resp.innerHTML = `error: ${err.status} : ${message}`;
				resp.innerHTML = message2;
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





/*document.addEventListener("DOMContentLoaded", function () {
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


}, false )*/

//boton editar
/*$("#tableUser tbody").on("click", "button.editarfnt", async function(){
		let data_table = tableUsuario.row($(this).parents("tr")).data();
		let idUser = data_table.ID;
		window.location.href = `${base_url}/Usuario_Dashboard/editar/${idUser}`;
	}
)*/