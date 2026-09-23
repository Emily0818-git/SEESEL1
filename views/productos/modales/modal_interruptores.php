<!-- =====================================================
     MODAL DE INTERRUPTORES SEESEL
====================================================== -->
<div
    class="modal fade modal-interruptores-seesel"
    id="modalInterruptores"
    tabindex="-1"
    aria-labelledby="modalInterruptoresTitulo"
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

                    <h2 id="modalInterruptoresTitulo">
                        Interruptores
                    </h2>

                    <p>
                        Soluciones de protección y maniobra para diferentes
                        niveles de tensión.
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
                            Nivel de tensión
                        </h3>

                        <p>
                            Selecciona una categoría para consultar
                            los equipos disponibles.
                        </p>

                    </div>


                    <div
                        class="interruptores-menu-scroll"
                        id="interruptoresMenu"
                    >

                        <button
                            type="button"
                            class="interruptores-menu-item active"
                            data-categoria="baja"
                        >
                            <span class="interruptores-menu-icono">
                                <i class="fa-solid fa-bolt"></i>
                            </span>

                            <span class="interruptores-menu-texto">
                                <strong>Baja tensión</strong>
                                <small>Protección hasta 1 kV</small>
                            </span>

                            <i class="fa-solid fa-chevron-right"></i>
                        </button>


                        <button
                            type="button"
                            class="interruptores-menu-item"
                            data-categoria="media"
                        >
                            <span class="interruptores-menu-icono">
                                <i class="fa-solid fa-tower-broadcast"></i>
                            </span>

                            <span class="interruptores-menu-texto">
                                <strong>Media tensión</strong>
                                <small>Celdas y subestaciones</small>
                            </span>

                            <i class="fa-solid fa-chevron-right"></i>
                        </button>


                        <button
                            type="button"
                            class="interruptores-menu-item"
                            data-categoria="alta"
                        >
                            <span class="interruptores-menu-icono">
                                <i class="fa-solid fa-plug-circle-bolt"></i>
                            </span>

                            <span class="interruptores-menu-texto">
                                <strong>Alta tensión</strong>
                                <small>Subestaciones de potencia</small>
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
                                Te ayudamos a seleccionar el interruptor
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
                            <span id="interruptoresCategoriaEtiqueta">
                                Interruptores
                            </span>

                            <h3 id="interruptoresCategoriaTitulo">
                                Baja tensión
                            </h3>

                            <p id="interruptoresCategoriaDescripcion">
                                Equipos para protección, control y maniobra
                                en instalaciones eléctricas de baja tensión.
                            </p>
                        </div>


                        <div class="interruptores-controles">

                            <button
                                type="button"
                                id="interruptoresAnterior"
                                aria-label="Producto anterior"
                            >
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>

                            <button
                                type="button"
                                id="interruptoresSiguiente"
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
                            id="interruptoresProductos"
                        >
                            <!-- Las tarjetas se generan con JavaScript -->
                        </div>

                    </div>


                    <!-- PROGRESO -->
                    <div class="interruptores-progreso">

                        <div class="interruptores-progreso-fondo">

                            <span
                                id="interruptoresProgreso"
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
                            href="https://wa.me/524421822409?text=Hola%2C%20deseo%20solicitar%20informaci%C3%B3n%20sobre%20interruptores%20el%C3%A9ctricos."
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
                id="interruptoresLightbox"
                aria-hidden="true"
            >

                <button
                    type="button"
                    class="interruptores-lightbox-cerrar"
                    id="interruptoresLightboxCerrar"
                    aria-label="Cerrar imagen"
                >
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <div class="interruptores-lightbox-contenido">

                    <img
                        src=""
                        alt=""
                        id="interruptoresLightboxImagen"
                    >

                    <h4 id="interruptoresLightboxTitulo"></h4>

                </div>

            </div>

        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const modal = document.getElementById("modalInterruptores");
    const menu = document.getElementById("interruptoresMenu");
    const productosContenedor =
        document.getElementById("interruptoresProductos");

    const tituloCategoria =
        document.getElementById("interruptoresCategoriaTitulo");

    const descripcionCategoria =
        document.getElementById("interruptoresCategoriaDescripcion");

    const botonAnterior =
        document.getElementById("interruptoresAnterior");

    const botonSiguiente =
        document.getElementById("interruptoresSiguiente");

    const progreso =
        document.getElementById("interruptoresProgreso");

    const lightbox =
        document.getElementById("interruptoresLightbox");

    const lightboxImagen =
        document.getElementById("interruptoresLightboxImagen");

    const lightboxTitulo =
        document.getElementById("interruptoresLightboxTitulo");

    const lightboxCerrar =
        document.getElementById("interruptoresLightboxCerrar");


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

        baja: {
            titulo: "Baja tensión",

            descripcion:
                "Equipos para protección, control y maniobra en instalaciones eléctricas de baja tensión.",

            productos: [
                {
                    tipo: "Baja tensión",
                    nombre: "Interruptor electromagnético",
                    descripcion:
                        "Interruptor electromagnético fijo 3wl1 3x1600a 55ka/440, 42ka/600v, Uso común en Casas, edificios, oficinas y comercios cuenta con un Voltaje de Hasta 1,000 V.",
                    imagen:
                        "public/img/IN.1.jpeg"
                },
                {
                    tipo: "Baja tensión",
                    nombre: "Interruptor termomagnético",
                    descripcion:
                        "Schneider Electric Interruptor Termomagnético 3 Polos HDL36060U31X, 690V, 60A, Entrada 240 - 600V.",
                    imagen:
                        "public/img/IN.2.jpeg"
                },
                {
                    tipo: "Baja tensión",
                    nombre: "Interruptor de riel DIN",
                    descripcion:
                        "Pastilla interruptora para riel din 5sl 1x4a 6ka 250/440v",
                    imagen:
                        "public/img/IN.3.JPEG"
                },
                {
                    tipo: "Baja tensión",
                    nombre: "Interruptores de seguridad (Switch Disconnect).",
                    descripcion:
                        "Interruptores de seguridad de 2P 30 amperios, 240 V, 2 cables, fusibles de alta resistencia, caja de interruptores de desconexión de CA.",
                    imagen:
                        "public/img/IN.4.jpeg"
                }
            ]
        },


        media: {
            titulo: "Media tensión",

            descripcion:
                "Interruptores para celdas, subestaciones y sistemas de distribución eléctrica de media tensión.",

            productos: [
                {
                    tipo: "Media tensión",
                    nombre: "Interruptores de vacío (Vacuum Circuit Breaker, VCB). ",
                    descripcion:
                        "Uso común en Industrias grandes, redes de distribución urbana y subestaciones, cuenta con un Voltaje De 1,000 V hasta 35,000 V. Medio de extinción: Usan aire, vacío o gas hexafluoruro de azufre (SF₆) para apagar el arco eléctrico al abrirse.",
                    imagen:
                        "public/img/IN.5.JPEG"
                },
                {
                    tipo: "Media tensión",
                    nombre: "Interruptor en SF6",
                    descripcion:
                        "Solución compacta para maniobra y protección en instalaciones eléctricas de media tensión.",
                    imagen:
                        "public/img/IN.6.JPEG"
                },
                {
                    tipo: "Media tensión",
                    nombre: "Reconectadores (Reclosers). ",
                    descripcion:
                        "Voltaje: De 1,000 V hasta 35,000 V.",
                    imagen:
                        "public/img/IN.7.JPEG"
                },
                {
                    tipo: "Media tensión",
                    nombre: "seccionadores bajo carga (Load Break Switch).",
                    descripcion:
                        "Controlan y protegen los circuitos que reparten la electricidad desde las subestaciones hacia las zonas de consumo. .",
                    imagen:
                        "public/img/IN.8.JPEG"
                }
            ]
        },


        alta: {
            titulo: "Alta tensión",

            descripcion:
                "Equipos de interrupción y protección para subestaciones y sistemas eléctricos de alta capacidad.",

            productos: [
                {
                    tipo: "Alta tensión",
                    nombre: "Interruptores en SF₆.  ",
                    descripcion:
                        "Voltaje: Mayor a 35,000 V (frecuentemente desde 72.5 kV hasta cientos de kV).",
                    imagen:
                        "public/img/IN.9.JPEG"
                },
                {
                    tipo: "Alta tensión",
                    nombre: "Interruptor híbrido GIS",
                    descripcion:
                        "Uso: Líneas de transmisión masiva y grandes subestaciones de potencia.",
                    imagen:
                        "public/img/IN.10.JPEG"
                },
                {
                    tipo: "Interruptores de tanque vivo (Live Tank). ",
                    nombre: "Interruptor de potencia",
                    descripcion:
                        "Diseño: Equipos muy robustos que usan gas SF₆ o sistemas de aceite para evitar daños graves por arcos eléctricos potentes",
                    imagen:
                        "public/img/IN.11.JPEG"
                }
            ]
        },


        especiales: {
            titulo: "Soluciones especiales",

            descripcion:
                "Configuraciones seleccionadas de acuerdo con las necesidades particulares de cada proyecto.",

            productos: [
                {
                    tipo: "Solución especial",
                    nombre: "Interruptores para aplicaciones industriales",
                    descripcion:
                        "Configuraciones adaptadas a procesos, capacidades interruptivas y condiciones específicas de operación.",
                    imagen:
                        "public/img/interruptores/especial-industrial.png"
                },
                {
                    tipo: "Solución especial",
                    nombre: "Sistemas de transferencia",
                    descripcion:
                        "Equipos para transferencia segura entre diferentes fuentes de alimentación eléctrica.",
                    imagen:
                        "public/img/interruptores/transferencia.png"
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
                    '[data-categoria="baja"]'
                );

            menu
                .querySelectorAll("[data-categoria]")
                .forEach(function (item) {
                    item.classList.remove("active");
                });

            if (primerBoton) {
                primerBoton.classList.add("active");
            }

            mostrarCategoria("baja");

        }
    );

    modal.addEventListener(
        "hidden.bs.modal",
        function () {

            cerrarLightbox();

        }
    );


    /* Primera carga */
    mostrarCategoria("baja");

});
</script>