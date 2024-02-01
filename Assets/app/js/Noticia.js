
tinymce.init({
  selector: '#noticia',
  language: "es",
  plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  mergetags_list: [
    { value: 'First.Name', title: 'First Name' },
    { value: 'Email', title: 'Email' },
  ],
  ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
});


document.addEventListener("DOMContentLoaded", function () {
	tableNoticia = new DataTable("#tableNoticia",{
		aProcessing: true,
		aServerSide: true,
		

		//lenguaje en español de la tabla
		language: {
        	url: `${base_url}/Assets/plugins/DataTable/datatable-spanish/spanish.json`
		},

		//consultar los datos desde la url
		ajax:{
			url: `${base_url}/Noticia_Dashboard/mostrar`,
			dataSrc: ""
		},
		//datos desde el servidor
		columns:[
			{data:"ID"},
			{data:"Titulo"},
			{data:"Copete"},
			{data:"Contenido"},
			{data:"Fecha"},
			{data:"Categoria"},
            {data:"Autor"},
			{
				defaultContent: "<button type='button' class='editarfnt btn btn-sm me-1 btn-edit text-light' title='Editar'><i class='bi bi-pencil-square'></i></button><button type='button' class='eliminarfnt btn btn-danger btn-sm' title='Eliminar'><i class='bi bi-trash'></i></button>"
			},
			
		],
		//paginación
		lengthMenu:[10,25,50,100,200,500],
		iDisplayLength:5,
		pagingType: 'full_numbers',
		//ocultar columnas
		columnDefs:[
			{
                targets:[0],
                visible:false,
                serchable:true,
			},
            {
                targets:[2],
                visible:false,
                serchable:true,
            },
            {
                targets:[3],
                visible:false,
                serchable:true,
            },
            {
                width: "20%",
                targets:[1],
            }
		],
		//ordenar por nombre 
		order:[4,"desc"],
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


//boton editar
$("#tableNoticia tbody").on("click", "button.editarfnt", async function(){
        let data_table = tableNoticia.row($(this).parents("tr")).data();
        let idNoticia = data_table.ID;
        window.location.href = `${base_url}/Noticia_Dashboard/editar/${idNoticia}`;
    }
)


//boton editar
$("#tableNoticia tbody").on("click", "button.eliminarfnt", async function(){
    let data_table = tableNoticia.row($(this).parents("tr")).data();
    let idNoticia = data_table.ID;
    
    async function eliminar() {
        const datos = new FormData();

        datos.append('id',idNoticia);

        try {
            const url = `${base_url}/Noticia_Dashboard/eliminar`;
            const respuesta = await fetch(url,{
                method: "POST",
                body: datos,
            });
            const resultado = await respuesta.json();

            if(resultado.status){
                  resp.innerHTML = `${resultado.msg}`;
                  window.location.href = `${base_url}/Noticia_Dashboard`;	
            }else{	
                resp.innerHTML = `${resultado.error}`;
                window.location.href = `${base_url}/Noticia_Dashboard`;	
            }


        } catch(err) {
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
            eliminar();
        }
      })


    }
)



const borrar = document.getElementById("borrar-not");
const img_file = document.getElementById("img-noticia");
var img = document.getElementById("img-not");
let msgTitulo = document.getElementById("msgTitulo");
let msgCopete = document.getElementById("msgCopete");
let msgFecha = document.getElementById("msgFecha");
let msgNoticia = document.getElementById("msgNoticia");
let msgFile = document.getElementById("msgFile");

var input = document.querySelectorAll(".form-input-not");

console.log(input);

let timeout = null;
let timeout_not = null;
document.querySelectorAll(".form-input-not").forEach((box) => {
    const boxInput = box.querySelector(".form-text");


    boxInput.addEventListener("keydown", (event) => {
        clearTimeout(timeout);
        timeout_not = setTimeout(() => {
            validation_not(box, boxInput);
        }, 300);
    });

    boxInput.addEventListener("change", (e) => {

        if (e.target.files[0]) {
            var size = e.target.files[0].size / 1000;
            var tipo = e.target.files[0].type;
            console.log(size);
            //nombre para asignar a la imagen subida
            console.log(tipo);

            tipo_archivo(tipo);
            const reader = new FileReader();
            reader.onload = function (e) {
                img.src = e.target.result;
                console.log(img_file.value);
                //console.log(e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);

        } else {
            img.src = imgDefault;
        }
    });

});



validation_not = (box, boxInput) => {
    if (boxInput.name == "titulo") {
        
        if (boxInput.value == '') {
            boxInput.classList.add('is-invalid');
            msgTitulo.classList.remove('valid-feedback');
            msgTitulo.classList.add('invalid-feedback');
            msgTitulo.innerHTML = 'Por favor ingrese un titulo.';
            
        }else {
            boxInput.classList.remove('is-invalid');
            boxInput.classList.add('is-valid');
            msgTitulo.classList.remove('invalid-feedback');
            msgTitulo.classList.add('valid-feedback');
            msgTitulo.innerHTML = 'Excelente!';
            
        }
    }
    if (boxInput.name == "copete") {

        if (boxInput.value == '') {
            boxInput.classList.add('is-invalid');
            msgCopete.classList.remove('valid-feedback');
            msgCopete.classList.add('invalid-feedback');
            msgCopete.innerHTML = 'Por favor ingrese un copete.';
            
        }else {
            boxInput.classList.remove('is-invalid');
            boxInput.classList.add('is-valid');
            msgCopete.classList.remove('invalid-feedback');
            msgCopete.classList.add('valid-feedback');
            msgCopete.innerHTML = 'Excelente!';
            
        }
    }

    if (boxInput.name == "noticia") {

        if (boxInput.value == '') {
            boxInput.classList.add('is-invalid');
            msgNoticia.classList.remove('valid-feedback');
            msgNoticia.classList.add('invalid-feedback');
            msgNoticia.innerHTML = 'Por favor ingrese un email.';
            
        }else {
            boxInput.classList.remove('is-invalid');
            boxInput.classList.add('is-valid');
            msgNoticia.classList.remove('invalid-feedback');
            msgNoticia.classList.add('valid-feedback');
            msgNoticia.innerHTML = 'Excelente!';
           
        }
    }

}




var tipo_archivo = (tipo) => {
    switch (tipo) {
        case "image/jpeg":
            msgFile.innerHTML = '<p class="text-success">Excelente!</p>';
            break;
        case "image/jpg":
            msgFile.innerHTML = '<p class="text-success">Excelente!</p>';
            break;

        case "image/png":
            msgFile.innerHTML = '<p class="text-success">Excelente!</p>';
            break;
        case "image/gif":
            msgFile.innerHTML = '<p class="text-success">Excelente!</p>';
            break;
        case "":
            img.src = imgDefault;
            msgFile.innerHTML = '<p class="text-danger">La extenciones de imagenes permitidas son jpeg/.jpg/.png/.gif.</p>';
            break;
        default:
            img.src = imgDefault;
            msgFile.innerHTML = '<p class="text-danger">La extenciones de imagenes permitidas son jpeg/.jpg/.png/.gif.</p>';
            break;
    }

}