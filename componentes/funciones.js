// display de botones en panel principal
function displayOn(nombre, comun) {
  const currentDisplay = document.querySelector(nombre);
  const allDisplays = document.querySelectorAll(comun);
  allDisplays.forEach((element) => {
    element.style.display = "none";
  });
  if (currentDisplay.style.display == "none") {
    currentDisplay.style.display = "block";
  } else {
    currentDisplay.style.display = "none";
  }
}


// funciones para el modal borrar producto
const modalDel = document.getElementById('modalDel');
if (modalDel) {
  modalDel.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const idDel = button.getAttribute('data-bs-idDel');
    // Update the modal's content.
    const inputDel = modalDel.querySelector('#inputDel');
    inputDel.value = idDel;
    
  })
}

// funciones para borrar usuario
const modalDelUser = document.getElementById('modalDelUser');
if (modalDelUser) {
  modalDelUser.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const buttone = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const idDelUser = buttone.getAttribute('data-bs-idDelUser');
    // Update the modal's content.
    const inputDelUser = modalDelUser.querySelector('#inputDelUser');
    inputDelUser.value = idDelUser;
    
  })
}

// modal Update

const modalUpdate = document.getElementById('modalUpdateProd');
if(modalUpdate){
  modalUpdate.addEventListener('show.bs.modal',event =>{
    const button = event.relatedTarget;
    const allProd = button.getAttribute('data-bs-allUpdate');
    const prod = document.getElementById(allProd);
    // recuperar datos
    const nombre = prod.querySelectorAll('.nombre')[0].innerText;
    const detalle = prod.querySelectorAll('.detalle')[0].innerText;
    const descripcion = prod.querySelectorAll('.descripcion')[0].innerText;
    const precio = prod.querySelectorAll('.precio')[0].innerText;
    const categoria = prod.querySelectorAll('.categoria')[0].getAttribute('data_idVal');
    const oferta = prod.querySelectorAll('.oferta')[0].getAttribute('data_val');
    const img = prod.querySelectorAll('.image')[0].innerHTML;

    // formulario
    const formId = modalUpdate.querySelector('#idProdUpdate');
    const formHeader = modalUpdate.querySelector('.modal-header');
    const formNombre = modalUpdate.querySelector('#prodNameUpdate');
    const formDetalle = modalUpdate.querySelector('#prodDescUpdate');
    const formDescripcion = modalUpdate.querySelector('#prodLongDescUpdate');
    const formPrice = modalUpdate.querySelector('#prodPriceUpdate');
    const formCategoria= modalUpdate.querySelector('#prodCatUpdate');
    const formOferta = modalUpdate.querySelector('#prodOfertaUpdate');
    const formImg = modalUpdate.querySelector('#imgsProdUpdate');

    // llenar Formulario
    formId.value = allProd;
    formHeader.innerHTML = img;
    formNombre.value = nombre;
    formDetalle.value = detalle;
    formDescripcion.value= descripcion;
    formPrice.value = precio;
    formCategoria.value = categoria;
    formOferta.value=oferta;
  } )
}


// tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));


// añadir productos al modal carrito
document.addEventListener('DOMContentLoaded', function() {
  // Variables
  let carrito = [];

  // Agregar al carrito
  document.querySelectorAll('.aggCart').forEach(button => {
      button.addEventListener('click', function() {
          const idProducto = this.getAttribute('data-idProducto');
          console.log('hiciste clickkkk');
          agregarAlCarrito(idProducto);
      });
  });

  // Función para agregar productos al carrito
  function agregarAlCarrito(idProducto) {
    // fetch a la base de datos en carrito
    fetch(`carrito.php?idProducto=${idProducto}`, {
      'method': 'GET',
      'headers': { 'Content-Type': 'application/x-www-form-urlencoded' }
   })
  .then(response => response.json())
  .then(data => {
      console.log(data);
        document.getElementById('carrito-count').textContent = data.carrito_count;
});


// cantidad de productos


      let productoExistente = carrito.find(item => item.id === idProducto);

      if (productoExistente) {
          productoExistente.cantidad += 1;
      } else {
          carrito.push({ id: idProducto, cantidad: 1 });
      }

      mostrarCarrito();
  }

  // Función para mostrar el carrito en el modal
  function mostrarCarrito() {
      const modalCarrito = document.getElementById('modalCarrito');
      const carritoContenido = document.getElementById('carrito-contenido');
      
      carritoContenido.innerHTML = ''; // Limpiar el contenido del carrito

      carrito.forEach(item => {
          carritoContenido.innerHTML += `<p>Producto ID: ${item.id}, Cantidad: ${item.cantidad}</p>`;
      });

      modalCarrito.style.display = 'block';
  }

  // Cerrar el modal
  document.getElementById('cerrar-modal').addEventListener('click', function() {
      document.getElementById('modalCarrito').style.display = 'none';
  });
});
