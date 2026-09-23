<?php
// Vista de contacto SEESEL
?>

<link rel="stylesheet" href="public/css/contacto.css">

<section class="contacto-page">

    <!-- =====================================================
         HERO CONTACTO
    ====================================================== -->
    <section class="contacto-hero">
        
    </section>


    <!-- =====================================================
         CONTACTO + FORMULARIO
    ====================================================== -->
    <section class="contacto-main" id="formulario-contacto">

        <div class="contacto-container contacto-main__grid">

            <!-- CONTACTO DIRECTO -->
            <aside class="contacto-directo">

                <div class="contacto-section-title contacto-section-title--light">
                    <h2>Contacto directo</h2>
                    <span></span>
                </div>

                <div class="contacto-info-list">

                    <a href="tel:+524424619026" class="contacto-info-item">

                        <div class="contacto-info-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div>
                            <small>Teléfono</small>
                            <strong>+52 442 461 9026</strong>
                        </div>

                    </a>


                    <a
                        href="mailto:contacto@seeselqro.com.mx"
                        class="contacto-info-item"
                    >

                        <div class="contacto-info-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div>
                            <small>Correo electrónico</small>
                            <strong>contacto@seeselqro.com.mx</strong>
                        </div>

                    </a>


                    <div class="contacto-info-item">

                        <div class="contacto-info-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div>
                            <small>Ubicación</small>
                            <strong>
                                Santiago de Querétaro, Qro.<br>
                                Col. San José del Alto
                            </strong>
                        </div>

                    </div>


                    <a
                        href="https://www.instagram.com/seesel.qro/"
                        target="_blank"
                        rel="noopener"
                        class="contacto-info-item"
                    >

                        <div class="contacto-info-icon">
                            <i class="fa-brands fa-instagram"></i>
                        </div>

                        <div>
                            <small>Instagram</small>
                            <strong>seesel.qro</strong>
                        </div>

                    </a>

                </div>


                <div class="contacto-social">

                    <span>Síguenos</span>

                    <div class="contacto-social__icons">

                        <a
                            href="https://www.facebook.com/share/1CCaQbEKte/"
                            target="_blank"
                            rel="noopener"
                            aria-label="Facebook"
                        >
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>

                        <a
                            href="https://www.instagram.com/seesel.qro/"
                            target="_blank"
                            rel="noopener"
                            aria-label="Instagram"
                        >
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <a
                            href="#"
                            aria-label="LinkedIn"
                        >
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>

                    </div>

                </div>

            </aside>


            <!-- =====================================================
                 FORMULARIO
            ====================================================== -->
            <div class="contacto-form-card">

                <div class="contacto-section-title">
                    <h2>Envíanos un mensaje</h2>
                    <span></span>
                </div>

                <form
                    id="contactoForm"
                    class="contacto-form"
                >

                    <div class="contacto-form__row">

                        <div class="contacto-field">

                            <label for="nombre">
                                Nombre
                            </label>

                            <input
                                type="text"
                                name="nombre"
                                id="nombre"
                                placeholder="Nombre"
                                required
                            >

                        </div>


                        <div class="contacto-field">

                            <label for="email">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                placeholder="Correo electrónico"
                                required
                            >

                        </div>

                    </div>


                    <div class="contacto-field">

                        <label for="telefono">
                            Teléfono
                        </label>

                        <input
                            type="tel"
                            name="telefono"
                            id="telefono"
                            placeholder="Teléfono"
                        >

                    </div>


                    <div class="contacto-field">

                        <label for="motivo">
                            Motivo de contacto
                        </label>

                        <select
                            name="motivo"
                            id="motivo"
                            required
                        >

                            <option
                                value=""
                                selected
                                disabled
                            >
                                Selecciona una opción
                            </option>

                            <option value="Servicio eléctrico">
                                Servicio eléctrico
                            </option>

                            <option value="Producto">
                                Producto
                            </option>

                            <option value="Cotización">
                                Cotización
                            </option>

                            <option value="Soporte técnico">
                                Soporte técnico
                            </option>

                            <option value="Otro">
                                Otro
                            </option>

                        </select>

                    </div>


                    <div class="contacto-field">

                        <label for="mensaje">
                            ¿Cómo podemos ayudarte?
                        </label>

                        <textarea
                            name="mensaje"
                            id="mensaje"
                            placeholder="Cuéntanos qué necesitas"
                            required
                        ></textarea>

                    </div>


                    <!-- HONEYPOT ANTISPAM -->
                    <div
                        class="contacto-honeypot"
                        aria-hidden="true"
                    >

                        <input
                            type="text"
                            name="website"
                            tabindex="-1"
                            autocomplete="off"
                        >

                    </div>


                    <!-- BOTÓN -->
                    <button
                        type="submit"
                        class="btn-contacto-enviar"
                        id="btnContactoEnviar"
                    >

                        <i class="fa-solid fa-paper-plane"></i>

                        <span>
                            Enviar solicitud
                        </span>

                    </button>


                    <!-- MENSAJE DE RESPUESTA -->
                    <div id="contactoRespuesta"></div>


                    <!-- PRIVACIDAD -->
                    <p class="contacto-privacy">

                        <i class="fa-solid fa-lock"></i>

                        Tu información está segura.
                        Solo será utilizada para responder tu solicitud.

                    </p>

                </form>

            </div>

        </div>

    </section>


    <!-- =====================================================
         FRANJA DE CONFIANZA
    ====================================================== -->
    <section class="contacto-trust">

        <div class="contacto-container contacto-trust__grid">

            <div class="contacto-trust-item">

                <div class="contacto-trust-icon">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>

                <div>
                    <strong>+15</strong>
                    <span>Años de experiencia</span>
                    <small>en soluciones eléctricas</small>
                </div>

            </div>


            <div class="contacto-trust-item">

                <div class="contacto-trust-icon">
                    <i class="fa-solid fa-headset"></i>
                </div>

                <div>
                    <strong>Atención</strong>
                    <span>especializada</span>
                    <small>Personal capacitado</small>
                </div>

            </div>


            <div class="contacto-trust-item">

                <div class="contacto-trust-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>

                <div>
                    <strong>Cobertura en</strong>
                    <span>Querétaro y Bajío</span>
                    <small>Respuesta rápida</small>
                </div>

            </div>


            <div class="contacto-trust-item">

                <div class="contacto-trust-icon">
                    <i class="fa-solid fa-bolt"></i>
                </div>

                <div>
                    <strong>Soluciones</strong>
                    <span>industriales</span>
                    <small>Atención profesional</small>
                </div>

            </div>

        </div>

    </section>



    <!-- =========================================================
     ÚNETE A NUESTRO EQUIPO - SEESEL
========================================================= -->

<section class="seesel-rh-section">

    <div class="seesel-rh-card">

        <!-- =========================
             INFORMACIÓN
        ========================== -->
        <div class="seesel-rh-info">

            <!-- ENCABEZADO -->
            <div class="seesel-rh-header">

                <div class="seesel-rh-icon">
                    <i class="fa-solid fa-people-group"></i>
                </div>

                <div>
                    <h2>ÚNETE A NUESTRO EQUIPO</h2>
                    <h3>Construye tu futuro con SEESEL</h3>
                </div>

            </div>


            <!-- TEXTO -->
            <div class="seesel-rh-texto">

                <p>
                    Buscamos personas comprometidas, responsables y con interés
                    en desarrollarse dentro del sector eléctrico.
                </p>

                <p>
                    Si te gustaría formar parte de nuestro equipo de trabajo,
                    ponte en contacto con nuestro departamento de
                    <strong>Recursos Humanos</strong> y envíanos tu CV.
                </p>

                <h4>¡Queremos conocerte!</h4>

            </div>


            <!-- BOTÓN -->
            <a
                href="mailto:recursoshumanos@seeselqro.com.mx?subject=Quiero formar parte de SEESEL"
                class="seesel-rh-btn"
            >
                <i class="fa-regular fa-envelope"></i>

                <span>
                    CONTACTAR A RECURSOS HUMANOS
                </span>
            </a>


            <!-- PRIVACIDAD -->
            <div class="seesel-rh-privacidad">

                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Tu información será utilizada únicamente para fines
                    de reclutamiento y selección.
                </span>

            </div>

        </div>


        <!-- =========================
             IMAGEN
        ========================== -->
        <div class="seesel-rh-imagen">

            <img
                src="public/img/105.jpg"
                alt="Únete al equipo SEESEL"
            >

        </div>

    </div>

</section>










    <!-- =====================================================
         DIRECTORIO
    ====================================================== -->
    <section class="contacto-directorio">

        <div class="contacto-container">

            <div class="contacto-heading-center">

                <span>
                    Directorio SEESEL
                </span>

                <h2>
                    Extensiones telefónicas
                </h2>

                <p>
                    Comunícate directamente con el área que necesitas
                    dentro de SEESEL.
                </p>

            </div>


            <div class="contacto-directorio-grid">

                <div class="contacto-directorio-line">
                    <span></span>
                </div>


                <article class="contacto-extension-card">

                    <div class="extension-icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>

                    <h3>
                        Recursos<br>
                        Humanos
                    </h3>

                    <strong>
                        Ext. 101
                    </strong>

                    <a href="tel:+524424619026">
                        <i class="fa-solid fa-phone"></i>
                        Llamar
                    </a>

                </article>


                <article class="contacto-extension-card">

                    <div class="extension-icon">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </div>

                    <h3>
                        Área<br>
                        Técnica
                    </h3>

                    <strong>
                        Ext. 102
                    </strong>

                    <a href="tel:+524424619026">
                        <i class="fa-solid fa-phone"></i>
                        Llamar
                    </a>

                </article>


                <article class="contacto-extension-card">

                    <div class="extension-icon">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </div>

                    <h3>
                        Ventas
                    </h3>

                    <strong>
                        Ext. 103
                    </strong>

                    <a href="tel:+524424619026">
                        <i class="fa-solid fa-phone"></i>
                        Llamar
                    </a>

                </article>


                <article class="contacto-extension-card">

                    <div class="extension-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>

                    <h3>
                        Atención al<br>
                        Cliente
                    </h3>

                    <strong>
                        Ext. 104
                    </strong>

                    <a href="tel:+524424619026">
                        <i class="fa-solid fa-phone"></i>
                        Llamar
                    </a>

                </article>

            </div>

        </div>

    </section>


    <!-- =====================================================
         MAPA
    ====================================================== -->
    <section class="contacto-mapa">

        <div class="contacto-container">

            <div class="contacto-heading-center">

                <span>
                    Nuestra ubicación
                </span>

                <h2>
                    Encuéntranos en Querétaro
                </h2>

            </div>


            <div class="contacto-map-card">

                <div class="contacto-map-overlay">

                    <i class="fa-solid fa-location-dot"></i>

                    <div>

                        <strong>
                            SEESEL
                        </strong>

                        <p>
                            Irapuato 305, Col. Unidad Modelo,<br>
                            Santiago de Querétaro, Qro.
                        </p>

                        <a
                            href="https://maps.app.goo.gl/wyRqHfDPrgnA1yqb6"
                            target="_blank"
                            rel="noopener"
                        >
                            Ver en Google Maps

                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>

                    </div>

                </div>


                <iframe
                    src="https://www.google.com/maps?q=Irapuato+305,+Col.+Unidad+Modelo,+Santiago+de+Querétaro,+Querétaro&output=embed"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>

            </div>


            <div class="contacto-map-footer">

                <div>

                    <i class="fa-solid fa-location-dot"></i>

                    <span>
                        Irapuato 305, Col. Unidad Modelo,<br>
                        Santiago de Querétaro, Qro.
                    </span>

                </div>


                <div>

                    <i class="fa-regular fa-clock"></i>

                    <span>
                        L - V: 8:00 am - 6:00 pm<br>
                        S: 8:00 am - 1:00 pm
                    </span>

                </div>


                <a
                    href="https://maps.app.goo.gl/wyRqHfDPrgnA1yqb6"
                    target="_blank"
                    rel="noopener"
                >
                    Cómo llegar

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </section>


    <!-- =====================================================
         WHATSAPP
    ====================================================== -->
    <a
        href="https://wa.me/524424619026"
        target="_blank"
        rel="noopener"
        class="contacto-whatsapp"
        aria-label="Hablar con un asesor"
    >

        <i class="fa-brands fa-whatsapp"></i>

        <span>
            Hablar con<br>
            un asesor
        </span>

    </a>

</section>


<!-- =========================================================
     ANIMACIONES AL HACER SCROLL
========================================================= -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const elementos = document.querySelectorAll(
        ".contacto-extension-card, .contacto-trust-item, .contacto-form-card, .contacto-directo, .contacto-map-card"
    );

    const observer = new IntersectionObserver((entries) => {

        entries.forEach((entry) => {

            if (entry.isIntersecting) {

                entry.target.classList.add("contacto-visible");

                observer.unobserve(entry.target);

            }

        });

    }, {
        threshold: 0.14
    });

    elementos.forEach((elemento) => {
        observer.observe(elemento);
    });

});
</script>


<!-- =========================================================
     ENVÍO DEL FORMULARIO
========================================================= -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const form =
        document.getElementById("contactoForm");

    const respuesta =
        document.getElementById("contactoRespuesta");

    const boton =
        document.getElementById("btnContactoEnviar");


    if (!form || !respuesta || !boton) {
        return;
    }


    form.addEventListener("submit", async function (e) {

        e.preventDefault();


        /* ===============================================
           DESACTIVAMOS EL BOTÓN
        =============================================== */

        boton.disabled = true;

        boton.innerHTML = `
            <i class="fa-solid fa-spinner fa-spin"></i>
            <span>Enviando...</span>
        `;


        respuesta.className =
            "contacto-respuesta";

        respuesta.innerHTML = "";


        try {

            /* ===============================================
               DATOS DEL FORMULARIO
            =============================================== */

            const datos =
                new FormData(form);


            /* ===============================================
               PETICIÓN AL MVC
            =============================================== */

            const response = await fetch(
                "index.php?c=contacto&a=enviar",
                {
                    method: "POST",
                    body: datos
                }
            );


            /* ===============================================
               LEEMOS PRIMERO COMO TEXTO

               Esto permite detectar errores PHP,
               HTML inesperado, warnings, etc.
            =============================================== */

            const texto =
                await response.text();


            console.log(
                "RESPUESTA DEL SERVIDOR:",
                texto
            );


            /* ===============================================
               CONVERTIMOS A JSON
            =============================================== */

            let resultado;


            try {

                resultado =
                    JSON.parse(texto);

            }
           catch (errorJSON) {

                console.error("RESPUESTA NO JSON:", texto);

                respuesta.className =
                    "contacto-respuesta contacto-respuesta--error";

                respuesta.innerHTML = `
                    <i class="fa-solid fa-circle-exclamation"></i>

                    <div>
                        <strong>Respuesta real del servidor:</strong>

                        <pre style="
                            white-space:pre-wrap;
                            font-size:11px;
                            margin-top:8px;
                            max-height:220px;
                            overflow:auto;
                        ">${texto.replace(/</g, "&lt;").replace(/>/g, "&gt;")}</pre>
                    </div>
                `;

                return;
            }


            /* ===============================================
               RESPUESTA CORRECTA
            =============================================== */

            if (resultado.success) {

                respuesta.className =
                    "contacto-respuesta contacto-respuesta--success";


                respuesta.innerHTML = `
                    <i class="fa-solid fa-circle-check"></i>

                    <div>

                        <strong>
                            ¡Solicitud enviada!
                        </strong>

                        <span>
                            Gracias por contactarnos.
                            Nuestro equipo se pondrá en contacto contigo.
                        </span>

                    </div>
                `;


                form.reset();

            }


            /* ===============================================
               ERROR DEVUELTO POR EL CONTROLADOR
            =============================================== */

            else {

                respuesta.className =
                    "contacto-respuesta contacto-respuesta--error";


                respuesta.innerHTML = `
                    <i class="fa-solid fa-circle-exclamation"></i>

                    <div>

                        <strong>
                            No pudimos enviar tu solicitud.
                        </strong>

                        <span>
                            ${resultado.message ?? "Intenta nuevamente."}
                        </span>

                    </div>
                `;

            }

        }


        /* ===============================================
           ERROR DE JAVASCRIPT / SERVIDOR
        =============================================== */

        catch (error) {

            console.error(
                "ERROR CONTACTO:",
                error
            );


            respuesta.className =
                "contacto-respuesta contacto-respuesta--error";


            respuesta.innerHTML = `
                <i class="fa-solid fa-circle-exclamation"></i>

                <div>

                    <strong>
                        Ocurrió un problema.
                    </strong>

                    <span>
                        ${error.message}
                    </span>

                </div>
            `;

        }


        /* ===============================================
           REACTIVAMOS EL BOTÓN
        =============================================== */

        finally {

            boton.disabled = false;


            boton.innerHTML = `
                <i class="fa-solid fa-paper-plane"></i>
                <span>Enviar solicitud</span>
            `;

        }

    });

});
</script>