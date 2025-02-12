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
const modalDel = document.getElementById("modalDel");
if (modalDel) {
  modalDel.addEventListener("show.bs.modal", (event) => {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const idDel = button.getAttribute("data-bs-idDel");
    // Update the modal's content.
    const inputDel = modalDel.querySelector("#inputDel");
    inputDel.value = idDel;
  });
}

// funciones para borrar usuario
const modalDelUser = document.getElementById("modalDelUser");
if (modalDelUser) {
  modalDelUser.addEventListener("show.bs.modal", (event) => {
    // Button that triggered the modal
    const buttone = event.relatedTarget;
    // Extract info from data-bs-* attributes
    const idDelUser = buttone.getAttribute("data-bs-idDelUser");
    // Update the modal's content.
    const inputDelUser = modalDelUser.querySelector("#inputDelUser");
    inputDelUser.value = idDelUser;
  });
}

// modal Update

const modalUpdate = document.getElementById("modalUpdateProd");
if (modalUpdate) {
  modalUpdate.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;
    const allProd = button.getAttribute("data-bs-allUpdate");
    const prod = document.getElementById(allProd);
    // recuperar datos
    const nombre = prod.querySelectorAll(".nombre")[0].innerText;
    const detalle = prod.querySelectorAll(".detalle")[0].innerText;
    const descripcion = prod.querySelectorAll(".descripcion")[0].innerText;
    const precio = prod.querySelectorAll(".precio")[0].innerText;
    const categoria = prod
      .querySelectorAll(".categoria")[0]
      .getAttribute("data_idVal");
    const oferta = prod.querySelectorAll(".oferta")[0].getAttribute("data_val");
    const img = prod.querySelectorAll(".image")[0].innerHTML;

    // formulario
    const formId = modalUpdate.querySelector("#idProdUpdate");
    const formHeader = modalUpdate.querySelector(".modal-header");
    const formNombre = modalUpdate.querySelector("#prodNameUpdate");
    const formDetalle = modalUpdate.querySelector("#prodDescUpdate");
    const formDescripcion = modalUpdate.querySelector("#prodLongDescUpdate");
    const formPrice = modalUpdate.querySelector("#prodPriceUpdate");
    const formCategoria = modalUpdate.querySelector("#prodCatUpdate");
    const formOferta = modalUpdate.querySelector("#prodOfertaUpdate");
    const formImg = modalUpdate.querySelector("#imgsProdUpdate");

    // llenar Formulario
    formId.value = allProd;
    formHeader.innerHTML = img;
    formNombre.value = nombre;
    formDetalle.value = detalle;
    formDescripcion.value = descripcion;
    formPrice.value = precio;
    formCategoria.value = categoria;
    formOferta.value = oferta;
  });
}

// tooltips
const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);
// Carritoo
document.addEventListener("DOMContentLoaded", function () {
  let carrito = [];

  // Agregar al carrito
  document.querySelectorAll(".aggCart").forEach((button) => {
      button.addEventListener("click", function () {
          const idProducto = this.getAttribute("data-idProducto");
          agregarAlCarrito(idProducto);
      });
  });

  // Función para agregar productos al carrito
  function agregarAlCarrito(idProducto) {
      fetch(`carrito.php?idProducto=${idProducto}`, {
          method: "GET",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
      })
      .then((response) => response.json())
      .then((data) => {
          document.getElementById("carrito-count").textContent = data.carrito_count;
          let producto = data.data;

          let productoExistente = carrito.find((item) => item.id === idProducto);

          if (productoExistente) {
              productoExistente.cantidad += 1;
          } else {
              carrito.push({ id: idProducto, cantidad: 1, nombre: producto.nombre, precio: producto.precio });
          }

          mostrarCarrito();
      });
  }

 

  // Función para mostrar el carrito
  function mostrarCarrito() {
      const carritoContenido = document.getElementById("carrito-lista");
      carritoContenido.innerHTML = ""; // Limpiar carrito

      let totalCompra = 0;

      carrito.forEach((item, index) => {
          totalCompra += item.precio * item.cantidad;
          carritoContenido.innerHTML += `
              <tr>
                  <td>${item.nombre}</td>
                  <td>${item.precio}€</td>
                  <td>${item.cantidad}</td>
                  <td><button class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">Eliminar</button></td>
              </tr>
          `;
      });

      document.getElementById("total-compra").textContent = `Total: ${totalCompra}€`;

      document.getElementById("carrito_data").value = JSON.stringify(carrito);
      // Función para eliminar un producto del carrito
    }
      function eliminarProducto(index) {
        carrito.splice(index, 1);
        mostrarCarrito();
      }
 

  // Event listener para el formulario de compra
  document.getElementById("form-carrito").addEventListener("submit", function (e) {
      e.preventDefault();
  });
});

