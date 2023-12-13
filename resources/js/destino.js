import axios from "axios";
import { validarCampos, Spinner, limpiarHTML } from './app';

const formularioAdd = document.getElementById('formAddDestino');
const divSpinner = document.getElementById('spinner');
const spinnerEdit = document.getElementById('spinnerEdit');
const formularioEditar = document.getElementById('editarForm');


formularioAdd.addEventListener('submit', validarInfoRegistro);
formularioEditar.addEventListener('submit', validarInfoEditar)
btnDelete.addEventListener('click', MostrarAlerta)


function validarInfoRegistro(e) {
  e.preventDefault();

  //se valida la informacion de los formularios
  const data = obtenerDatos(formularioAdd);
  
  if (validarCampos(data)) {
    mostrarErrores('Todos los campos son requeridos');
    return;
  } 
  console.log(data);
  return
  //guardamos el registrp
  GuardarRegistro(data);
}

function validarInfoEditar(e) {

  e.preventDefault();
  // Encuentra el formulario más cercano al botón
  const formEditar = e.target.closest('form');
  console.log(formEditar);

  //se valida la informacion de los formularios
  const datos = obtenerDatos(formEditar);
  console.log(datos);

  if (validarCampos(datos)) {
    mostrarErrores('Todos los campos son requeridos');
    return;
  }
  
  //guardamos el registro
  ActualizarRegistro(data);

}


function obtenerDatos(formulario) {

  //se toma el valor de los input y se guardan en un objeto
  const inputs = formulario.querySelectorAll('input');
  const data = [];
  const row = {};

  inputs.forEach(input => {

    const valor = input.value;
    row[input.name] = valor;

  });

  data.push(row)

  return data;

}

function GuardarRegistro(array) {

  //mostramos un spinner mienstras se realiza la peticion
  Spinner(divSpinner);
  const datos = [...array];

  //realizamos la peticion
  axios.post('/register/destino', { datos: datos })
    .then(response => {

      //limpiamos el formulario y spinner
      formularioAdd.reset();
      limpiarHTML(divSpinner);

      //damos una respuesta al usuario
      const { message } = response.data;

      Swal.fire({
        title: "Registro Exitoso!",
        html: `El destino <span class="font-bold text-success">${message}</span> fue creado correctamente`,
        icon: "success"
      });

    })
    .catch(error => {
      mostrarErrores('Hubo un error, intenta nuevamente!');
    })

}

function ActualizarRegistro(array) {

  //mostramos un spinner mienstras se realiza la peticion
  Spinner(spinnerEdit);
  const datos = [...array];

  //realizamos la peticion
  axios.post('/update/destino', { datos: datos })
    .then(response => {

      //limpiamos el formulario y spinner
      formularioEditar.reset();
      limpiarHTML(divSpinner);

      //damos una respuesta al usuario
      const { message } = response.data;

      Swal.fire({
        title: "Actualizacion exitosa!",
        html: `El destino <span class="font-bold text-success">${message}</span> fue editado correctamente!`,
        icon: "success"
      });

    })
    .catch(error => {
      mostrarErrores('Hubo un error, intenta nuevamente!');
    })

}

function mostrarErrores(mensaje) {
  const error = document.querySelector('.alerta')
  if (!error) {
    const error = document.createElement('p');
    error.classList.add('alerta', 'bg-red-300', 'text-center', 'text-red-800', 'font-semibold', 'px-4', 'py-2', 'rounded');
    error.textContent = mensaje;
    divSpinner.appendChild(error)

    setTimeout(() => {
      error.remove()
    }, 3000);
  }

}
