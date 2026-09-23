document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       SLIDER DE PROYECTOS
    ====================================================== */

    const sliderProyectos = document.querySelector(".proyectos-slider");
    const botonAnterior = document.querySelector(".proyecto-anterior");
    const botonSiguiente = document.querySelector(".proyecto-siguiente");

    function obtenerDesplazamiento() {
        const tarjeta = document.querySelector(".proyecto-destacado-card");

        if (!tarjeta) {
            return 320;
        }

        const estilos = window.getComputedStyle(sliderProyectos);
        const gap = parseInt(estilos.gap, 10) || 15;

        return tarjeta.offsetWidth + gap;
    }

    if (sliderProyectos && botonAnterior && botonSiguiente) {

        botonSiguiente.addEventListener("click", function () {
            sliderProyectos.scrollBy({
                left: obtenerDesplazamiento(),
                behavior: "smooth"
            });
        });

        botonAnterior.addEventListener("click", function () {
            sliderProyectos.scrollBy({
                left: -obtenerDesplazamiento(),
                behavior: "smooth"
            });
        });
    }


    /* =====================================================
       ANIMACIÓN DE APARICIÓN
    ====================================================== */

    const elementosAnimados = document.querySelectorAll(
        ".servicio-proyecto-card, " +
        ".proceso-paso, " +
        ".capacidad-card, " +
        ".proyecto-destacado-card, " +
        ".estadistica-item"
    );

    const observadorElementos = new IntersectionObserver(
        function (entradas, observador) {

            entradas.forEach(function (entrada) {

                if (!entrada.isIntersecting) {
                    return;
                }

                const elemento = entrada.target;

                const hermanos = Array.from(
                    elemento.parentElement.children
                );

                const indice = hermanos.indexOf(elemento);

                elemento.style.transitionDelay =
                    `${Math.min(indice * 70, 420)}ms`;

                elemento.classList.add("proyectos-elemento-visible");

                observador.unobserve(elemento);
            });
        },
        {
            threshold: 0.15
        }
    );

    elementosAnimados.forEach(function (elemento) {
        observadorElementos.observe(elemento);
    });


    /* =====================================================
       CONTADORES ANIMADOS
    ====================================================== */

    const contadores = document.querySelectorAll(
        ".contador-proyecto"
    );

    let contadoresIniciados = false;

    function animarContador(contador) {

        const valorFinal =
            parseInt(contador.dataset.valor, 10) || 0;

        const sufijo =
            contador.dataset.sufijo || "";

        const duracion = 1800;
        const tiempoInicio = performance.now();

        function actualizarContador(tiempoActual) {

            const progreso = Math.min(
                (tiempoActual - tiempoInicio) / duracion,
                1
            );

            const progresoSuavizado =
                1 - Math.pow(1 - progreso, 3);

            const valorActual = Math.floor(
                valorFinal * progresoSuavizado
            );

            contador.textContent =
                valorActual.toLocaleString("es-MX") + sufijo;

            if (progreso < 1) {
                requestAnimationFrame(actualizarContador);
            } else {
                contador.textContent =
                    valorFinal.toLocaleString("es-MX") + sufijo;
            }
        }

        requestAnimationFrame(actualizarContador);
    }

    const seccionEstadisticas = document.querySelector(
        ".estadisticas-proyectos"
    );

    if (seccionEstadisticas) {

        const observadorContadores =
            new IntersectionObserver(
                function (entradas) {

                    entradas.forEach(function (entrada) {

                        if (
                            entrada.isIntersecting &&
                            !contadoresIniciados
                        ) {
                            contadoresIniciados = true;

                            contadores.forEach(function (contador) {
                                animarContador(contador);
                            });
                        }
                    });
                },
                {
                    threshold: 0.35
                }
            );

        observadorContadores.observe(seccionEstadisticas);
    }


    /* =====================================================
       MOVIMIENTO SUTIL DEL HERO
    ====================================================== */

    const hero = document.querySelector(".proyectos-hero");
    const fondoHero = document.querySelector(
        ".proyectos-hero-fondo"
    );

    if (hero && fondoHero && window.innerWidth > 900) {

        hero.addEventListener("mousemove", function (evento) {

            const rect = hero.getBoundingClientRect();

            const posicionX =
                (evento.clientX - rect.left) / rect.width;

            const posicionY =
                (evento.clientY - rect.top) / rect.height;

            const moverX = (posicionX - 0.5) * 12;
            const moverY = (posicionY - 0.5) * 7;

            fondoHero.style.transform =
                `scale(1.06) translate(${moverX}px, ${moverY}px)`;
        });

        hero.addEventListener("mouseleave", function () {
            fondoHero.style.transform =
                "scale(1.04) translate(0, 0)";
        });
    }

        
      
    

});



