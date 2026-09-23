document.addEventListener("DOMContentLoaded", function () {

    /* =====================================================
       ANIMACIONES AL HACER SCROLL
    ====================================================== */

    const elementosAnimados = document.querySelectorAll(
        ".reveal-up, .reveal-left, .reveal-right"
    );

    const observerAnimaciones = new IntersectionObserver(
        function (entries, observer) {

            entries.forEach(function (entry) {

                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add("visible");
                observer.unobserve(entry.target);

            });

        },
        {
            threshold: 0.14,
            rootMargin: "0px 0px -50px 0px"
        }
    );

    elementosAnimados.forEach(function (elemento, indice) {

        elemento.style.transitionDelay =
            Math.min((indice % 5) * 90, 360) + "ms";

        observerAnimaciones.observe(elemento);

    });


    /* =====================================================
       CONTADORES ANIMADOS
    ====================================================== */

    const contadores = document.querySelectorAll(".contador");

    let contadoresEjecutados = false;

    function iniciarContadores() {

        if (contadoresEjecutados) {
            return;
        }

        contadoresEjecutados = true;

        contadores.forEach(function (contador) {

            const objetivo = Number(contador.dataset.target || 0);
            const sufijo = contador.dataset.suffix || "";

            const duracion = 1800;
            const inicio = performance.now();

            function actualizarContador(tiempoActual) {

                const progreso = Math.min(
                    (tiempoActual - inicio) / duracion,
                    1
                );

                const progresoSuavizado =
                    1 - Math.pow(1 - progreso, 4);

                const valorActual = Math.floor(
                    progresoSuavizado * objetivo
                );

                contador.textContent = valorActual + sufijo;

                if (progreso < 1) {
                    requestAnimationFrame(actualizarContador);
                } else {
                    contador.textContent = objetivo + sufijo;
                }

            }

            requestAnimationFrame(actualizarContador);

        });

    }

    const seccionEstadisticas = document.querySelector(
        ".nosotros-estadisticas"
    );

    if (seccionEstadisticas) {

        const observerContadores = new IntersectionObserver(
            function (entries, observer) {

                entries.forEach(function (entry) {

                    if (!entry.isIntersecting) {
                        return;
                    }

                    iniciarContadores();
                    observer.unobserve(entry.target);

                });

            },
            {
                threshold: 0.3
            }
        );

        observerContadores.observe(seccionEstadisticas);

    }


    /* =====================================================
       PARALLAX SUAVE EN EL HERO
    ====================================================== */

    const heroImagen = document.querySelector(
        ".nosotros-hero-bg img"
    );

    let ticking = false;

    function actualizarParallax() {

        const desplazamiento = window.scrollY;

        if (heroImagen && desplazamiento < window.innerHeight) {

            heroImagen.style.transform =
                "scale(1.06) translateY(" +
                desplazamiento * 0.08 +
                "px)";

        }

        ticking = false;

    }

    window.addEventListener(
        "scroll",
        function () {

            if (!ticking) {

                window.requestAnimationFrame(actualizarParallax);
                ticking = true;

            }

        },
        {
            passive: true
        }
    );

});