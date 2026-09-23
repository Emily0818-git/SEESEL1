document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.logos-slider').forEach((slider) => {
        const track = slider.querySelector('.logos-track');
        const prev = slider.querySelector('.slider-anterior');
        const next = slider.querySelector('.slider-siguiente');

        const mover = (direccion) => {
            const card = track.querySelector('.logo-card');
            if (!card) return;
            const distancia = card.offsetWidth + 12;
            track.scrollBy({ left: distancia * direccion, behavior: 'smooth' });
        };

        prev?.addEventListener('click', () => mover(-1));
        next?.addEventListener('click', () => mover(1));

        let auto = setInterval(() => mover(1), 3500);

        slider.addEventListener('mouseenter', () => clearInterval(auto));
        slider.addEventListener('mouseleave', () => {
            clearInterval(auto);
            auto = setInterval(() => mover(1), 3500);
        });
    });

    const elementos = document.querySelectorAll(
        '.norma-card, .diferenciador-card, .logo-card, .inicio-intro, .slider-encabezado'
    );

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    elementos.forEach((elemento) => {
        elemento.classList.add('reveal');
        observer.observe(elemento);
    });
});



document.addEventListener("DOMContentLoaded", () => {

    const navbar = document.getElementById("inicioNavbar");
    const toggle = document.getElementById("inicioNavbarToggle");
    const menu = document.getElementById("inicioNavbarMenu");
    const dropdown = document.querySelector(".inicio-navbar-dropdown");
    const dropdownButton = document.querySelector(
        ".inicio-navbar-dropdown-boton"
    );

    /* Navbar con fondo al hacer scroll */
    const controlarNavbar = () => {
        if (!navbar) return;

        navbar.classList.toggle(
            "scrolled",
            window.scrollY > 35
        );
    };

    controlarNavbar();

    window.addEventListener("scroll", controlarNavbar, {
        passive: true
    });

    /* Menú móvil */
    if (toggle && menu) {
        toggle.addEventListener("click", () => {

            const abierto = menu.classList.toggle("abierto");

            toggle.classList.toggle("activo", abierto);
            toggle.setAttribute(
                "aria-expanded",
                abierto ? "true" : "false"
            );

            document.body.style.overflow = abierto
                ? "hidden"
                : "";
        });
    }

    /* Submenú móvil */
    if (dropdownButton && dropdown) {
        dropdownButton.addEventListener("click", (event) => {

            if (window.innerWidth <= 991) {
                event.preventDefault();
                dropdown.classList.toggle("abierto");
            }
        });
    }

    /* Cerrar al seleccionar una opción */
    document
        .querySelectorAll(".inicio-navbar-menu a")
        .forEach((enlace) => {

            enlace.addEventListener("click", () => {

                if (!menu || !toggle) return;

                menu.classList.remove("abierto");
                toggle.classList.remove("activo");
                toggle.setAttribute("aria-expanded", "false");

                document.body.style.overflow = "";
            });
        });

    /* Cerrar cuando cambia el tamaño */
    window.addEventListener("resize", () => {

        if (window.innerWidth > 991) {

            menu?.classList.remove("abierto");
            toggle?.classList.remove("activo");
            dropdown?.classList.remove("abierto");

            toggle?.setAttribute(
                "aria-expanded",
                "false"
            );

            document.body.style.overflow = "";
        }
    });

});