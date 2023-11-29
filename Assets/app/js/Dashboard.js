//#################    Cambiar Contraseña    ###################//
//constantes de formulario y boton submit
const form = document.getElementById("edit-pass");
const submitButton = document.getElementById("btn-edit-pass");
//variables de div mensajes de errores
var msgPass = document.getElementById("msgPass-actual");
let msgPassNew = document.getElementById("msgPass-nuevo");
let msgRepPassNew = document.getElementById("msgPass-reNuevo");
let tags = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

let timeout = null;

let errors = {
    password: true,
    newpassword: true,
    renewpassword: true,
}

document.querySelectorAll(".form-input").forEach((box) => {
    const boxInput = box.querySelector("input");


    boxInput.addEventListener("keydown", (event) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            validation(box, boxInput);
        }, 300);
    });

    boxInput.addEventListener("keyup", (e) => {
        let string = e.target.value;
        e.target.value = string.trim();
    });

});

var newPass;

validation = (box, boxInput) => {
    if (boxInput.name == "password") {
        if (boxInput.value == '') {
            boxInput.classList.add('is-invalid');
            msgPass.classList.remove('valid-feedback');
            msgPass.classList.add('invalid-feedback');
            msgPass.innerHTML = 'Por favor ingrese la contraseña.';
            errors[boxInput.name] = true;
        } else if (tags.test(boxInput.value) == false) {
            boxInput.classList.add('is-invalid');
            msgPass.classList.remove('valid-feedback');
            msgPass.classList.add('invalid-feedback');
            msgPass.innerHTML = 'El formato ingresado es incorrecto, le aconsejo la información:';
            errors[boxInput.name] = true;
        }
        else {
            boxInput.classList.remove('is-invalid');
            boxInput.classList.add('is-valid');
            msgPass.classList.remove('invalid-feedback');
            msgPass.classList.add('valid-feedback');
            msgPass.innerHTML = 'Excelente!';
            errors[boxInput.name] = false;
        }
    }
    if (boxInput.name == "newpassword") {
        if (boxInput.value == '') {
            boxInput.classList.add('is-invalid');
            msgPassNew.classList.remove('valid-feedback');
            msgPassNew.classList.add('invalid-feedback');
            msgPassNew.innerHTML = 'Por favor ingrese la contraseña.';
            errors[boxInput.name] = true;
        }
        else if (tags.test(boxInput.value) == false) {
            boxInput.classList.add('is-invalid');
            msgPassNew.classList.remove('valid-feedback');
            msgPassNew.classList.add('invalid-feedback');
            msgPassNew.innerHTML = 'El formato ingresado es incorrecto, le aconsejo la información:';
            errors[boxInput.name] = true;
        }
        else {
            boxInput.classList.remove('is-invalid');
            boxInput.classList.add('is-valid');
            msgPassNew.classList.remove('invalid-feedback');
            msgPassNew.classList.add('valid-feedback');
            msgPassNew.innerHTML = 'Excelente!';
            errors[boxInput.name] = false;
            newPass = boxInput.value;
        }
    }

    if (boxInput.name == "renewpassword") {
        if (boxInput.value == '') {
            boxInput.classList.add('is-invalid');
            msgRepPassNew.classList.remove('valid-feedback');
            msgRepPassNew.classList.add('invalid-feedback');
            msgRepPassNew.innerHTML = 'Por favor ingrese la contraseña.';
            errors[boxInput.name] = true;
        }
        else if (tags.test(boxInput.value) == false) {
            boxInput.classList.add('is-invalid');
            msgRepPassNew.classList.remove('valid-feedback');
            msgRepPassNew.classList.add('invalid-feedback');
            msgRepPassNew.innerHTML = 'El formato ingresado es incorrecto, le aconsejo la información:';
            errors[boxInput.name] = true;
        }
        else if (!(boxInput.value == newPass)) {
            boxInput.classList.add('is-invalid');
            msgRepPassNew.classList.remove('valid-feedback');
            msgRepPassNew.classList.add('invalid-feedback');
            msgRepPassNew.innerHTML = 'La contraseña ingresada no coincide.';
            errors[boxInput.name] = true;
        } else {

            boxInput.classList.remove('is-invalid');
            boxInput.classList.add('is-valid');
            msgRepPassNew.classList.remove('invalid-feedback');
            msgRepPassNew.classList.add('valid-feedback');
            msgRepPassNew.innerHTML = 'Excelente!';
            errors[boxInput.name] = false;
        }

    }


    //desavilita el boton de submut cuando hay un error
    submitController();
}
submitController = () => {
    if (errors.password || errors.newpassword || errors.renewpassword) {
        submitButton.toggleAttribute('disabled', true);
    } else {
        setTimeout(() => {
            submitButton.toggleAttribute('disabled', false);
        }, 400);
    }
}



//#################    Editar Perfil    ###################//
//const defaultFile = `${base_url}/Assets/img/perfil/profile-img.png`
const form_edit = document.getElementById("edit-perfil");
const file = document.getElementById("img-perfil");
const borrar = document.getElementById("borrar");
var img = document.getElementById("image");


let allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
var msgFile = document.getElementById("msgFile");
let msgNombre = document.getElementById("msgNombre");
let msgApellido = document.getElementById("msgApellido");
let msgTel = document.getElementById("msgTel");
let msgEmail = document.getElementById("msgEmail");
let msgFace = document.getElementById("msgFace");
let msgInsta = document.getElementById("msgInsta");

let timeout_edit = null;

let errors_edit = {
    image: true,
    nombre: true,
    apellido: true,
    phone: true,
    email: true,
    facebook: true,
    instagram: true,
}

document.querySelectorAll(".form-input-edit").forEach((box) => {
    const boxInput = box.querySelector("input");
    const img_file = document.getElementById("img-perfil");

    boxInput.addEventListener("keydown", (event) => {
        clearTimeout(timeout);
        timeout_edit = setTimeout(() => {
            validation_edit(box, boxInput);
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
            img.src = defaultImg;
        }
        borrar.addEventListener("click", () => {
            img.src = defaultImg;
        });
    });



});

validation_edit = (box, boxInput) => {

    /*if (boxInput.name == "img-perfil") {

        if (boxInput.value == '') {
            boxInput.classList.add('is-invalid');
            msgFile.classList.remove('valid-feedback');
            msgFile.classList.add('invalid-feedback');
            msgFile.innerHTML = 'Por favor ingrese una imagen.';
            errors_edit[boxInput.name] = true;
        }else {
            boxInput.classList.remove('is-invalid');
            boxInput.classList.add('is-valid');
            msgFile.classList.remove('invalid-feedback');
            msgFile.classList.add('valid-feedback');
            msgFile.innerHTML = 'Excelente!';
            errors[boxInput.name] = false;
        }
    }*/
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
            img.src = defaultImg;
            msgFile.innerHTML = '<p class="text-danger">La extenciones de imagenes permitidas son jpeg/.jpg/.png/.gif.</p>';
            break;
        default:
            img.src = defaultImg;
            msgFile.innerHTML = '<p class="text-danger">La extenciones de imagenes permitidas son jpeg/.jpg/.png/.gif.</p>';
            break;
    }

}

