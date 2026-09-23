<!-- =====================================================
     MODAL DE BANCO DE CAPACITORES SEESEL
====================================================== -->
<div
    class="modal fade modal-interruptores-seesel"
    id="modalBancoCapacitores"
    tabindex="-1"
    aria-labelledby="modalBancoCapacitoresTitulo"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content">

            <!-- ENCABEZADO -->
            <header class="modal-interruptores-header">

                <div>
                    <span class="modal-interruptores-eyebrow">
                        Catálogo de productos
                    </span>

                    <h2 id="modalBancoCapacitoresTitulo">
                        Banco de Capacitores
                    </h2>

                    <p>
                        Soluciones para corrección del factor de potencia y
                        optimización de la eficiencia energética.
                    </p>
                </div>

                <button
                    type="button"
                    class="modal-interruptores-cerrar"
                    data-bs-dismiss="modal"
                    aria-label="Cerrar modal"
                >
                    <i class="fa-solid fa-xmark"></i>
                </button>

            </header>


            <!-- CUERPO -->
            <div class="modal-interruptores-body">

                <!-- =====================================
                     MENÚ IZQUIERDO
                ====================================== -->
                <aside class="interruptores-menu-lateral">

                    <div class="interruptores-menu-encabezado">

                        <span>
                            Clasificación
                        </span>

                        <h3>
                            Tipo de solución
                        </h3>

                        <p>
                            Selecciona una categoría para consultar
                            los equipos disponibles.
                        </p>

                    </div>


                    <div
                        class="interruptores-menu-scroll"
                        id="capacitoresMenu"
                    >

                        <button
                            type="button"
                            class="interruptores-menu-item active"
                            data-categoria="automaticos"
                        >
                            <span class="interruptores-menu-icono">
                                <i class="fa-solid fa-sliders"></i>
                            </span>

                            <span class="interruptores-menu-texto">
                                <strong>Según su Modo de Operación</strong>
                                <small>Compensación variable</small>
                            </span>

                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        <button
                            type="button"
                            class="interruptores-menu-item"
                            data-categoria="fijos"
                        >
                            <span class="interruptores-menu-icono">
                                <i class="fa-solid fa-toggle-on"></i>
                            </span>

                            <span class="interruptores-menu-texto">
                                <strong>Según el Lugar de Instalación</strong>
                                <small>Cargas constantes</small>
                            </span>

                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                        <button
                            type="button"
                            class="interruptores-menu-item"
                            data-categoria="armonicos"
                        >
                            <span class="interruptores-menu-icono">
                                <i class="fa-solid fa-wave-square"></i>
                            </span>

                            <span class="interruptores-menu-texto">
                                <strong>Según Aplicaciones Especiales</strong>
                                <small>Protección ante distorsión</small>
                            </span>

                            <i class="fa-solid fa-chevron-right"></i>
                        </button>


                    </div>


                    <div class="interruptores-menu-ayuda">

                        <span>
                            <i class="fa-solid fa-headset"></i>
                        </span>

                        <div>
                            <strong>
                                ¿Necesitas asesoría?
                            </strong>

                            <p>
                                Te ayudamos a seleccionar el banco de capacitores
                                adecuado para tu instalación.
                            </p>
                        </div>

                    </div>

                </aside>


                <!-- =====================================
                     CONTENIDO DERECHO
                ====================================== -->
                <main class="interruptores-contenido">

                    <!-- ENCABEZADO DE LA CATEGORÍA -->
                    <div class="interruptores-categoria-header">

                        <div>
                            <span id="capacitoresCategoriaEtiqueta">
                                Banco de capacitores
                            </span>

                            <h3 id="capacitoresCategoriaTitulo">
                                Según su Modo de Operación
                            </h3>

                            <p id="capacitoresCategoriaDescripcion">
                                Soluciones que conectan y desconectan etapas según
                                la demanda de potencia reactiva de la instalación.
                            </p>
                        </div>


                        <div class="interruptores-controles">

                            <button
                                type="button"
                                id="capacitoresAnterior"
                                aria-label="Producto anterior"
                            >
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>

                            <button
                                type="button"
                                id="capacitoresSiguiente"
                                aria-label="Producto siguiente"
                            >
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>

                        </div>

                    </div>


                    <!-- PRODUCTOS -->
                    <div class="interruptores-productos-wrapper">

                        <div
                            class="interruptores-productos-scroll"
                            id="capacitoresProductos"
                        >
                            <!-- Las tarjetas se generan con JavaScript -->
                        </div>

                    </div>


                    <!-- PROGRESO -->
                    <div class="interruptores-progreso">

                        <div class="interruptores-progreso-fondo">

                            <span
                                id="capacitoresProgreso"
                                class="interruptores-progreso-activo"
                            ></span>

                        </div>

                    </div>


                    <!-- PIE -->
                    <footer class="interruptores-footer">

                        <div>
                            <strong>
                                ¿Requieres una configuración específica?
                            </strong>

                            <span>
                                Consulta disponibilidad, capacidad y tiempos de entrega.
                            </span>
                        </div>

                        <a
                            href="https://wa.me/524421822409?text=Hola%2C%20deseo%20solicitar%20informaci%C3%B3n%20sobre%20bancos%20de%20capacitores."
                            target="_blank"
                            rel="noopener"
                            class="interruptores-cotizar"
                        >
                            <i class="fa-brands fa-whatsapp"></i>
                            Solicitar cotización
                        </a>

                    </footer>

                </main>

            </div>


            <!-- =====================================
                 VISOR INTERNO DE IMÁGENES
            ====================================== -->
            <div
                class="interruptores-lightbox"
                id="capacitoresLightbox"
                aria-hidden="true"
            >

                <button
                    type="button"
                    class="interruptores-lightbox-cerrar"
                    id="capacitoresLightboxCerrar"
                    aria-label="Cerrar imagen"
                >
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <div class="interruptores-lightbox-contenido">

                    <img
                        src=""
                        alt=""
                        id="capacitoresLightboxImagen"
                    >

                    <h4 id="capacitoresLightboxTitulo"></h4>

                </div>

            </div>

        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("modalBancoCapacitores");
    const menu = document.getElementById("capacitoresMenu");
    const productosContenedor =
        document.getElementById("capacitoresProductos");

    const tituloCategoria =
        document.getElementById("capacitoresCategoriaTitulo");

    const descripcionCategoria =
        document.getElementById("capacitoresCategoriaDescripcion");

    const botonAnterior =
        document.getElementById("capacitoresAnterior");

    const botonSiguiente =
        document.getElementById("capacitoresSiguiente");

    const progreso =
        document.getElementById("capacitoresProgreso");

    const lightbox =
        document.getElementById("capacitoresLightbox");

    const lightboxImagen =
        document.getElementById("capacitoresLightboxImagen");

    const lightboxTitulo =
        document.getElementById("capacitoresLightboxTitulo");

    const lightboxCerrar =
        document.getElementById("capacitoresLightboxCerrar");


    if (
        !modal ||
        !menu ||
        !productosContenedor
    ) {
        return;
    }


    /* =====================================================
       INFORMACIÓN DEL CATÁLOGO
    ====================================================== */

    const categorias = {

        automaticos: {
            titulo: "Según su Modo de Operación",

            descripcion:
                "Soluciones que conectan y desconectan etapas automáticamente según la demanda de potencia reactiva.",

            productos: [
                {
                    tipo: "Banco automático",
                    nombre: "Banco de capacitor fijo de 5 kvar a 240 Total Ground",
                    descripcion:
                        "Suministran una potencia reactiva constante. Se conectan de forma manual o fija en redes con cargas estables y previsibles (como un motor grande que opera siempre el mismo tiempo)",
                    imagen:
                        "public/img/B.1.JPEG"
                },
                {
                    tipo: "Banco automático",
                    nombre: "Banco de Capacitores de 50 kVAR Automático 480 VCA, 60 Hz",
                    descripcion:
                        "Usan un controlador inteligente para conectar o desconectar escalones de capacitores según la demanda de energía reactiva en tiempo real. Son ideales para industrias con cargas variables.",
                    imagen:
                        "public/img/B.2.JPEG"
                }
               
            ]
        },

        fijos: {
            titulo: "Según el Lugar de Instalación",

            descripcion:
                "Equipos para compensación permanente en cargas estables o de operación continua.",

            productos: [
                {
                    tipo: "Según el Lugar de Instalación",
                    nombre: "Montados en poste",
                    descripcion:
                        "Bastidores trifásicos instalados en la vía pública o redes aéreas de distribución.",
                    imagen:
                        "public/img/B.3.JPEG"
                },
                {
                    tipo: "Según el Lugar de Instalación",
                    nombre: "Con gabinete metálico (Tipo interior/exterior)",
                    descripcion:
                        "Banco de capacitores tipo subestacion en gabinete de media tension de 9MVAR 23KV",
                    imagen:
                        "public/img/B.4.JPEG"
                },
                {
                    tipo: "Banco fijo",
                    nombre: "Móviles",
                    descripcion:
                        "Unidades sobre remolques para soporte temporal o emergencias en redes eléctricas.",
                    imagen:
                        "public/img/B.5.JPEG"
                }
            ]
        },

        armonicos: {
            titulo: "Según Aplicaciones Especiales",

            descripcion:
                "Bancos diseñados para instalaciones con presencia de armónicos y cargas electrónicas.",

            productos: [
                {
                    tipo: "Según Aplicaciones Especiales",
                    nombre: "Con filtros de armónicos",
                    descripcion:
                        "Incluyen reactancias para evitar la resonancia y proteger la red contra corrientes armónicas.",
                    imagen:
                        "public/img/B.6.JPEG"
                },
                {
                    tipo: "Según Aplicaciones Especiales",
                    nombre: "Para alta tensión",
                    descripcion:
                        "Diseñados con arreglos complejos para subestaciones de transmisión eléctrica.",
                    imagen:
                        "public/img/B.7.JPEG"
                }
                
            ]
        }


    };


    /* =====================================================
       CREAR TARJETAS
    ====================================================== */

    function crearTarjeta(producto) {

        const articulo = document.createElement("article");
        articulo.className = "interruptor-modal-card";

        articulo.innerHTML = `
            <div class="interruptor-card-imagen">

                <button
                    type="button"
                    class="interruptor-ampliar-imagen"
                    aria-label="Ampliar imagen de ${producto.nombre}"
                >
                    <img
                        src="${producto.imagen}"
                        alt="${producto.nombre}"
                        loading="lazy"
                    >
                </button>

                <span class="interruptor-card-ampliar">
                    <i class="fa-solid fa-expand"></i>
                </span>

            </div>

            <div class="interruptor-card-contenido">

                <span class="interruptor-card-tipo">
                    ${producto.tipo}
                </span>

                <h4>
                    ${producto.nombre}
                </h4>

                <p>
                    ${producto.descripcion}
                </p>

                <a
                    href="https://wa.me/524421822409?text=${encodeURIComponent(
                        "Hola, deseo solicitar información sobre " +
                        producto.nombre +
                        "."
                    )}"
                    target="_blank"
                    rel="noopener"
                    class="interruptor-card-enlace"
                >
                    Consultar producto
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>
        `;

        const botonImagen =
            articulo.querySelector(
                ".interruptor-ampliar-imagen"
            );

        botonImagen.addEventListener("click", function () {
            abrirLightbox(producto);
        });

        return articulo;
    }


    /* =====================================================
       MOSTRAR CATEGORÍA
    ====================================================== */

    function mostrarCategoria(nombreCategoria) {

        const categoria = categorias[nombreCategoria];

        if (!categoria) {
            return;
        }

        tituloCategoria.textContent =
            categoria.titulo;

        descripcionCategoria.textContent =
            categoria.descripcion;

        productosContenedor.innerHTML = "";

        categoria.productos.forEach(function (producto) {

            productosContenedor.appendChild(
                crearTarjeta(producto)
            );

        });

        productosContenedor.scrollLeft = 0;

        requestAnimationFrame(function () {
            actualizarProgreso();
        });

    }


    /* =====================================================
       MENÚ
    ====================================================== */

    menu
        .querySelectorAll("[data-categoria]")
        .forEach(function (boton) {

            boton.addEventListener("click", function () {

                menu
                    .querySelectorAll("[data-categoria]")
                    .forEach(function (item) {
                        item.classList.remove("active");
                    });

                boton.classList.add("active");

                mostrarCategoria(
                    boton.dataset.categoria
                );

            });

        });


    /* =====================================================
       DESPLAZAMIENTO
    ====================================================== */

    function obtenerDistancia() {

        const tarjeta =
            productosContenedor.querySelector(
                ".interruptor-modal-card"
            );

        if (!tarjeta) {
            return 300;
        }

        const estilos =
            window.getComputedStyle(
                productosContenedor
            );

        const gap =
            parseFloat(estilos.columnGap) || 16;

        return tarjeta.offsetWidth + gap;
    }

    botonAnterior.addEventListener("click", function () {

        productosContenedor.scrollBy({
            left: -obtenerDistancia(),
            behavior: "smooth"
        });

    });

    botonSiguiente.addEventListener("click", function () {

        productosContenedor.scrollBy({
            left: obtenerDistancia(),
            behavior: "smooth"
        });

    });


    /* =====================================================
       PROGRESO
    ====================================================== */

    function actualizarProgreso() {

        const anchoTotal =
            productosContenedor.scrollWidth;

        const anchoVisible =
            productosContenedor.clientWidth;

        const maximo =
            anchoTotal - anchoVisible;

        if (maximo <= 0) {
            progreso.style.width = "100%";
            progreso.style.transform = "translateX(0)";
            return;
        }

        const porcentajeVisible =
            anchoVisible / anchoTotal;

        const anchoIndicador = Math.max(
            porcentajeVisible * 100,
            15
        );

        const porcentajeScroll =
            productosContenedor.scrollLeft /
            maximo;

        const recorrido =
            100 - anchoIndicador;

        const posicion =
            porcentajeScroll * recorrido;

        progreso.style.width =
            anchoIndicador + "%";

        progreso.style.transform =
            "translateX(" +
            (
                posicion *
                100 /
                anchoIndicador
            ) +
            "%)";
    }

    productosContenedor.addEventListener(
        "scroll",
        actualizarProgreso,
        { passive: true }
    );

    window.addEventListener(
        "resize",
        actualizarProgreso
    );


    /* =====================================================
       LIGHTBOX
    ====================================================== */

    function abrirLightbox(producto) {

        lightboxImagen.src =
            producto.imagen;

        lightboxImagen.alt =
            producto.nombre;

        lightboxTitulo.textContent =
            producto.nombre;

        lightbox.classList.add("active");
        lightbox.setAttribute("aria-hidden", "false");

    }

    function cerrarLightbox() {

        lightbox.classList.remove("active");
        lightbox.setAttribute("aria-hidden", "true");

        setTimeout(function () {
            lightboxImagen.src = "";
        }, 300);

    }

    lightboxCerrar.addEventListener(
        "click",
        cerrarLightbox
    );

    lightbox.addEventListener("click", function (evento) {

        if (evento.target === lightbox) {
            cerrarLightbox();
        }

    });

    document.addEventListener("keydown", function (evento) {

        if (
            evento.key === "Escape" &&
            lightbox.classList.contains("active")
        ) {
            cerrarLightbox();
        }

    });


    /* =====================================================
       REINICIAR MODAL
    ====================================================== */

    modal.addEventListener(
        "show.bs.modal",
        function () {

            const primerBoton =
                menu.querySelector(
                    '[data-categoria="automaticos"]'
                );

            menu
                .querySelectorAll("[data-categoria]")
                .forEach(function (item) {
                    item.classList.remove("active");
                });

            if (primerBoton) {
                primerBoton.classList.add("active");
            }

            mostrarCategoria("automaticos");

        }
    );

    modal.addEventListener(
        "hidden.bs.modal",
        function () {

            cerrarLightbox();

        }
    );


    /* Primera carga */
    mostrarCategoria("automaticos");

});
</script>