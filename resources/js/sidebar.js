// Elementos del DOM: buscamos los nodos que vamos a manipular.
// ----------------------------------------------

// El contenedor del sidebar (el panel deslizante)
const sidebar = document.getElementById("sidebar");

// El overlay: fondo negro semi-transparente que cubre la página cuando el sidebar está abierto
const overlay = document.getElementById("overlay");

// El elemento <h2> (o similar) donde mostramos el título dinámico del sidebar
const title = document.getElementById("sidebarTitle");

// Contenedor donde inyectamos el HTML recibido por AJAX (contenido del sidebar)
const content = document.getElementById("sidebarContent");

// Botón para cerrar el sidebar (la "X" dentro del sidebar)
const closeBtn = document.getElementById("closeSidebar");


// ABRIR SIDEBAR DINÁMICO
// ----------------------------------------------
// Exponemos la función en window para poder invocarla desde atributos inline
// (ej. onclick="openDynamicSidebar('Tu carrito', '/sidebar/cart')")
// Devolvemos una función asíncrona porque usamos fetch().
window.openDynamicSidebar = async function(titleText, url) {
    try {
        // Cambiar el título del sidebar en el DOM.
        // titleText viene de quien llama (botón del navbar, por ejemplo).
        title.textContent = titleText;

        // Petición AJAX al servidor (Laravel) para obtener el HTML parcial del sidebar.
        // fetch realiza una GET por defecto.
        const res = await fetch(url);

        // Si la petición falla con un status HTTP de error (4xx/5xx),
        // fetch no lanza excepción; hay que comprobar res.ok si queremos manejarlo.
        // Aquí asumimos que el servidor devuelve 200 con HTML.
        const html = await res.text(); // extraemos el cuerpo como texto (HTML)

        // Insertamos ese HTML dentro del contenedor #sidebarContent.
        // --> ATENCIÓN: innerHTML ejecuta cualquier <script> y puede introducir XSS
        // si el HTML no proviene de una fuente segura.
        content.innerHTML = html;

        // Mostrar el sidebar: quitamos la clase que lo mantenía fuera de pantalla.
        // Normalmente esa clase es translate-x-full (Tailwind), que aplica
        // transform: translateX(100%).
        sidebar.classList.remove("translate-x-full");

        // Mostrar el overlay: quitamos las clases que lo hacían invisible e inactivo.
        // opacity-0 (transparente) y pointer-events-none (no clickeable).
        overlay.classList.remove("opacity-0", "pointer-events-none");
    } 
    catch (err) {
        // Si ocurre cualquier error en la operación asíncrona (p. ej. red caída),
        // lo logueamos en consola. Podrías además mostrar un mensaje al usuario.
        console.error("Error cargando sidebar:", err);
    }
};


// CERRAR SIDEBAR (botón "X")
// ----------------------------------------------
closeBtn.addEventListener("click", () => {
    // Volvemos a mover el sidebar fuera de la pantalla.
    sidebar.classList.add("translate-x-full");

    // Ocultamos y desactivamos el overlay para que no capture clics.
    overlay.classList.add("opacity-0", "pointer-events-none");
});


// Cerrar haciendo clic afuera (overlay)
// ----------------------------------------------
overlay.addEventListener("click", () => {
    // Mismo comportamiento visual: cerrar el sidebar y ocultar overlay.
    sidebar.classList.add("translate-x-full");
    overlay.classList.add("opacity-0", "pointer-events-none");
});
