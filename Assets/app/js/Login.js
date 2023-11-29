const form = document.getElementById("form_login");
const submitButton = document.getElementById("submit-btn");
let msgpass = document.getElementById("msgpass");
let msgEmail = document.getElementById("msgEmail");

let timeout = null;

let errors = {
	emailname: true,
	password: true,
}

const  emailFormatRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

//recorrer los input del formulario
document.querySelectorAll(".form-input").forEach((box) =>{
	const boxInput = box.querySelector("input");

	boxInput.addEventListener("keydown", (event) =>{
		clearTimeout(timeout);
		timeout = setTimeout(()=>{
			//console.log(`box: ${boxInput.name} valor: ${boxInput.value}`);
			validation(box, boxInput);
		}, 300 );
	});
	//elimina los espacios en blanco
	boxInput.addEventListener("keyup", (e) =>{
        let string = e.target.value;
        e.target.value = string.trim();
    });

});
form.addEventListener("submit",function(e) {
	e.preventDefault();
	login();	
});

//funcion de validacion de cada input
validation = (box, boxInput) => {
	if (boxInput.name == 'emailname') {
		if (boxInput.value == '') {
			showError(true, boxInput);	
			msgEmail.innerHTML = 'Por favor ingrese su email!';
		}else if(!boxInput.value.match(emailFormatRegex)){
			showError(true, boxInput);	
			msgEmail.innerHTML = 'El email ingresado no es valido!';
		}else{
			showError(false, boxInput);
			msgEmail.innerHTML = 'Excelente!';
		}
	}

	if (boxInput.name == 'password') {	
		if (boxInput.value == '') {
			showError(true, boxInput);	
			msgpass.innerHTML = 'Por favor ingrese su contraseña!';
		}
		else{
			showError(false, boxInput);
			msgpass.innerHTML = 'Excelente!';
		}
	}
	//desavilita el boton de submut cuando hay un error
	submitController();
}
//funcion que checkea si es false o true y abilita las clases de bootstrap 
showError = (check, boxInput) =>{
	if (check) {
		boxInput.classList.add('is-invalid');
		msgEmail.classList.add('invalid-feedback');
		errors[boxInput.name] = true;
	}else{
		boxInput.classList.remove('is-invalid');
		boxInput.classList.add('is-valid');
		errors[boxInput.name] = false;
	}
}

submitController = () =>{
	if(errors.emailname || errors.password){
		submitButton.toggleAttribute('disabled', true);
	}else{
		submitButton.toggleAttribute('disabled', false);
	}
}


	

	

async function login(){
		const formLogin = new FormData(form);
		let respSuccess = document.getElementById("respSuccess");
		let respDanger = document.getElementById("respDanger");
		let userErr = document.getElementById("userErr");
		let passErr = document.getElementById("passErr");

		console.log(formLogin);
	try {
		const url = `${base_url}/Login/ingresar_2`;
		const respuesta = await fetch(url,{
			method: "POST",
			body: formLogin,
		});
		const resultado = await respuesta.json();
		
		

		if(resultado.status == true){
			respSuccess.innerHTML = `<div class="alert alert-success" role="alert">${resultado.msg}</div>`;
			passErr.classList.add('visually-hidden');
			userErr.classList.add('visually-hidden');
			setTimeout(() => {
				window.location.href = `${base_url}/Dashboard`;
			}, 400);
	    }
		else if(resultado.error1){
			userErr.innerHTML = `<div class="alert alert-danger" role="alert">${resultado.error1}</div>`;
			passErr.innerHTML = '';
		}
		else if(resultado.error2){
			passErr.innerHTML = `<div class="alert alert-danger" role="alert">${resultado.error2}</div>`;
			userErr.innerHTML = '';
		} 
		else if(resultado.error3){
			setTimeout(() => {
				passErr.innerHTML = `<div class="alert alert-danger" role="alert">${resultado.error3}</div>`;
			}, 500);
			//userErr.innerHTML = '';
		} 
		else
		{
			respDanger.innerHTML = `<div class="alert alert-danger" role="alert">${resultado.error}</div>`;
			window.location.href = `${base_url}/Login`;
		}

	} catch(err) {
		
		console.log(err);
		let message = err.statusText || "Ocurrio un error";
		respDanger.innerHTML = `error: ${err.status} : ${message}`;
	}

	
}