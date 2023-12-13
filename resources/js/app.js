
//Función para validar campos
export function validarCampos(array) {
  return array.some(obj => {
    return Object.values(obj).some(valor => valor === '' || valor === null || valor === undefined);
  });
}



// Función para crear un spinner
export function Spinner(contenedor) {
  const Spinner = document.createElement('div');
  Spinner.innerHTML = `
    <div class="spinner">
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>
  `;
  contenedor.appendChild(Spinner);
}

// Función para limpiar HTML
export function limpiarHTML(contenedor) {
  while (contenedor.firstChild) {
    contenedor.removeChild(contenedor.firstChild)
  }
}
