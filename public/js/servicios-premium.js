document.addEventListener("DOMContentLoaded", function () {

    const carousel = document.getElementById("serviciosCarousel");
    const botonAnterior = document.getElementById("serviciosAnterior");
    const botonSiguiente = document.getElementById("serviciosSiguiente");
    const barraProgreso = document.getElementById("serviciosProgressBar");
    const contadorActual = document.getElementById("servicioActual");

    if (
        !carousel ||
        !botonAnterior ||
        !botonSiguiente ||
        !barraProgreso ||
        !contadorActual
    ) {
        return;
    }

    const tarjetas = carousel.querySelectorAll(".servicio-premium-card");

    if (!tarjetas.length) {
        return;
    }

    function obtenerDistanciaScroll() {

        const primeraTarjeta = tarjetas[0];
        const estilosCarousel = window.getComputedStyle(carousel);

        const gap =
            parseFloat(estilosCarousel.columnGap) ||
            parseFloat(estilosCarousel.gap) ||
            22;

        return primeraTarjeta.offsetWidth + gap;
    }

    function actualizarEstadoCarousel() {

        const scrollMaximo =
            carousel.scrollWidth - carousel.clientWidth;

        const porcentaje =
            scrollMaximo > 0
                ? carousel.scrollLeft / scrollMaximo
                : 0;

        const anchoVisible =
            carousel.clientWidth / carousel.scrollWidth;

        const anchoBarra =
            Math.max(
                anchoVisible * 100,
                12
            );

        const posicionBarra =
            porcentaje * (100 - anchoBarra);

        barraProgreso.style.width = `${anchoBarra}%`;
        barraProgreso.style.transform =
            `translateX(${posicionBarra / (anchoBarra / 100)}%)`;

        botonAnterior.disabled =
            carousel.scrollLeft <= 5;

        botonSiguiente.disabled =
            carousel.scrollLeft >= scrollMaximo - 5;

        actualizarContador();
    }

    function actualizarContador() {

        const distancia = obtenerDistanciaScroll();

        const indice =
            Math.round(carousel.scrollLeft / distancia);

        const numeroActual =
            Math.min(
                indice + 1,
                tarjetas.length
            );

        contadorActual.textContent =
            String(numeroActual).padStart(2, "0");
    }

    botonAnterior.addEventListener("click", function () {

        carousel.scrollBy({
            left: -obtenerDistanciaScroll(),
            behavior: "smooth"
        });

    });

    botonSiguiente.addEventListener("click", function () {

        carousel.scrollBy({
            left: obtenerDistanciaScroll(),
            behavior: "smooth"
        });

    });

    carousel.addEventListener(
        "scroll",
        actualizarEstadoCarousel,
        { passive: true }
    );

    window.addEventListener(
        "resize",
        actualizarEstadoCarousel
    );

    let estaArrastrando = false;
    let posicionInicial = 0;
    let scrollInicial = 0;

    carousel.addEventListener("pointerdown", function (evento) {

        estaArrastrando = true;
        posicionInicial = evento.clientX;
        scrollInicial = carousel.scrollLeft;

        carousel.setPointerCapture(evento.pointerId);
        carousel.style.cursor = "grabbing";
        carousel.style.scrollSnapType = "none";

    });

    carousel.addEventListener("pointermove", function (evento) {

        if (!estaArrastrando) {
            return;
        }

        const desplazamiento =
            evento.clientX - posicionInicial;

        carousel.scrollLeft =
            scrollInicial - desplazamiento;

    });

    function finalizarArrastre() {

        if (!estaArrastrando) {
            return;
        }

        estaArrastrando = false;

        carousel.style.cursor = "grab";
        carousel.style.scrollSnapType = "x mandatory";

        const distancia = obtenerDistanciaScroll();

        const destino =
            Math.round(
                carousel.scrollLeft / distancia
            ) * distancia;

        carousel.scrollTo({
            left: destino,
            behavior: "smooth"
        });

    }

    carousel.addEventListener(
        "pointerup",
        finalizarArrastre
    );

    carousel.addEventListener(
        "pointercancel",
        finalizarArrastre
    );

    carousel.addEventListener(
        "pointerleave",
        finalizarArrastre
    );

    carousel.style.cursor = "grab";

    actualizarEstadoCarousel();





    





});
