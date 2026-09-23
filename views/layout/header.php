<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SEESEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
>

    <!-- CSS GLOBAL -->
    <link rel="stylesheet" href="public/css/styles.css">
    <link
        rel="stylesheet"
        href="public/css/servicios-premium.css?v=1.0"
    >
    <link rel="stylesheet" href="public/css/productos-premium.css?v=1">
    <link rel="stylesheet" href="public/css/navbar.css">
    <link
    rel="stylesheet"
    href="public/css/productos.css?v=<?php echo time(); ?>"
>

    <link
    rel="stylesheet"
    href="public/css/footer-seesel-premium.css"
>
    <!-- CSS SOLO PARA PROYECTOS -->
    <?php
    $currentController = $_GET['c'] ?? '';
    $currentAction = $_GET['a'] ?? '';

    if (
        $currentController === 'pages' &&
        $currentAction === 'proyectos'
    ) {
        echo '<link rel="stylesheet" href="public/css/proyectos-premium.css">';
    }
    ?>

    <?php
    $currentController = $_GET['c'] ?? '';
    $currentAction = $_GET['a'] ?? '';

    if ($currentController === 'pages' && $currentAction === 'nosotros'):
    ?>
        <link
            rel="stylesheet"
            href="public/css/nosotros-premium.css?v=1"
        >
    <?php endif; ?>

    
    <link rel="stylesheet" href="public/css/chatbot.css">


   <!--           ConveyThis Script Start         -->
<script src="//cdn.conveythis.com/javascript/conveythis.js?api_key=pub_4b7e6dfe3fd79d62169d81e717634196"></script>
<!--           ConveyThis Script End         -->



    </head>

    <?php
    $currentController = $_GET['c'] ?? '';
    $currentAction = $_GET['a'] ?? '';

    if ($currentController === 'pages' && $currentAction === 'nosotros'):
    ?>
        <script src="public/js/nosotros-premium.js?v=1"></script>
    <?php endif; ?>
    <body>




    


<!-- =========================================================
     BARRA SUPERIOR SEESEL
========================================================= -->

<div class="top-bar-seesel">

    <div class="top-bar-contenedor">

        <!-- INFORMACIÓN DE CONTACTO -->
        <div class="top-bar-contacto">

            <a href="tel:+524421822409" class="top-bar-item">
                <span class="top-bar-icono">
                    <i class="fa-solid fa-phone"></i>
                </span>

                <span class="top-bar-texto">
                    <small>Llámanos</small>
                    <strong>442 182 2409</strong>
                </span>
            </a>

            <span class="top-bar-separador"></span>

            <a href="mailto:contacto@seeselqro.com.mx" class="top-bar-item">
                <span class="top-bar-icono">
                    <i class="fa-solid fa-envelope"></i>
                </span>

                <span class="top-bar-texto">
                    <small>Correo electrónico</small>
                    <strong>contacto@seeselqro.com.mx</strong>
                </span>
            </a>

        </div>


        <!-- LADO DERECHO -->
        <div class="top-bar-derecha">

            <!-- BOTÓN BUZÓN -->
            <button
                type="button"
                class="btn-buzon-tierras"
                data-bs-toggle="modal"
                data-bs-target="#modalBuzonTierras"
            >
                <span class="btn-buzon-icono">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </span>

                <span>
                    Buzón para Sistemas de Tierra
                </span>
            </button>


            <span class="top-bar-atencion">
                <span class="estado-activo"></span>
                Atención especializada
            </span>


            <a
                href="https://www.facebook.com/share/1CCaQbEKte/"
                target="_blank"
                rel="noopener"
                class="top-bar-social"
                aria-label="Facebook"
            >
                <i class="fa-brands fa-facebook-f"></i>
            </a>

        </div>

    </div>

</div>



<!-- =========================================================
     MODAL BUZÓN PARA SISTEMAS DE TIERRA
========================================================= -->

<div
    class="modal fade"
    id="modalBuzonTierras"
    tabindex="-1"
    aria-labelledby="modalBuzonTierrasLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-dialog-centered modal-xl">

        <div class="modal-content modal-buzon-content">

            <!-- =================================================
                 HEADER
            ================================================== -->
            <div class="modal-header modal-buzon-header">

                <div class="buzon-header-contenido">

                    <span class="buzon-header-icono">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </span>

                    <div>
                        <span class="buzon-mini-titulo">
                            ATENCIÓN SEESEL
                        </span>

                        <h5
                            class="modal-title"
                            id="modalBuzonTierrasLabel"
                        >
                            Buzón para Sistemas de Tierra
                        </h5>
                    </div>

                </div>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Cerrar"
                ></button>

            </div>


            <!-- =================================================
                 BODY
            ================================================== -->
            <div class="modal-body">


                <!-- =============================================
                     PASO 1 - PROCESO DE ATENCIÓN
                ============================================== -->
                <div id="buzonPaso1">

                    <div class="buzon-introduccion">

                        <span class="buzon-etiqueta">
                            <i class="fa-solid fa-shield-halved"></i>
                            Atención de quejas
                        </span>

                        <h3>
                            Conoce nuestro proceso de atención
                        </h3>

                        <p>
                            En SEESEL atendemos cada reporte de manera
                            documentada, transparente y con seguimiento
                            hasta su resolución.
                        </p>

                    </div>


                 <div class="buzon-imagen-contenedor buzon-carrusel">

                <div class="buzon-slides">

                    <!-- IMAGEN 1 -->
                    <div class="buzon-slide active">
                        <img
                            src="public/img/Proceso.png"
                            alt="Proceso de atención de quejas SEESEL"
                            class="buzon-imagen"
                        >
                    </div>

                    <!-- IMAGEN 2 -->
                    <div class="buzon-slide">
                        <img
                            src="public/img/PROCESO2.JPG"
                            alt="Información adicional del proceso de atención SEESEL"
                            class="buzon-imagen"
                        >
                    </div>

                </div>


                <!-- FLECHA IZQUIERDA -->
                <button
                    type="button"
                    class="buzon-carrusel-btn buzon-prev"
                    aria-label="Imagen anterior"
                >
                    <i class="fa-solid fa-chevron-left"></i>
                </button>


                <!-- FLECHA DERECHA -->
                <button
                    type="button"
                    class="buzon-carrusel-btn buzon-next"
                    aria-label="Imagen siguiente"
                >
                    <i class="fa-solid fa-chevron-right"></i>
                </button>


                <!-- INDICADORES -->
                <div class="buzon-indicadores">

                    <button
                        type="button"
                        class="buzon-indicador active"
                        data-slide="0"
                        aria-label="Ver imagen 1"
                    ></button>

                    <button
                        type="button"
                        class="buzon-indicador"
                        data-slide="1"
                        aria-label="Ver imagen 2"
                    ></button>

                </div>

            </div>


                    <div class="buzon-paso-footer">

                        <div class="buzon-seguridad">
                            <i class="fa-solid fa-lock"></i>

                            <span>
                                La información proporcionada será tratada
                                de manera confidencial.
                            </span>
                        </div>


                        <button
                            type="button"
                            id="btnContinuarBuzon"
                            class="btn-continuar-buzon"
                        >
                            Continuar

                            <i class="fa-solid fa-arrow-right"></i>
                        </button>

                    </div>

                </div>


                <!-- =============================================
                     PASO 2 - FORMULARIO
                ============================================== -->
                <div
                    id="buzonPaso2"
                    class="d-none"
                >

                    <div class="formulario-buzon-encabezado">

                        <button
                            type="button"
                            id="btnRegresarBuzon"
                            class="btn-regresar-buzon"
                        >
                            <i class="fa-solid fa-arrow-left"></i>
                            Regresar
                        </button>


                        <div>

                            <span class="formulario-buzon-paso">
                                PASO 2 DE 2
                            </span>

                            <h3>
                                Registro de reporte
                            </h3>

                            <p>
                                Completa la información para que nuestro
                                equipo pueda dar seguimiento a tu solicitud.
                            </p>

                        </div>

                    </div>


                    <!-- =========================================
                         MENSAJES
                    ========================================== -->

                    <div
                        id="mensajeBuzon"
                        class="alert d-none"
                        role="alert"
                    ></div>


                    <!-- =========================================
                         FORMULARIO
                    ========================================== -->

                    <form
                        id="formBuzonTierras"
                        autocomplete="off"
                    >

                        <div class="row g-4">


                            <!-- EMPRESA -->
                            <div class="col-md-6">

                                <label
                                    for="empresaBuzon"
                                    class="form-label"
                                >
                                    Nombre de la empresa
                                    <span>*</span>
                                </label>

                                <div class="input-buzon">

                                    <i class="fa-solid fa-building"></i>

                                    <input
                                        type="text"
                                        id="empresaBuzon"
                                        name="empresa"
                                        class="form-control"
                                        placeholder="Ej. Empresa Industrial S.A. de C.V."
                                        required
                                    >

                                </div>

                            </div>


                            <!-- NOMBRE -->
                            <div class="col-md-6">

                                <label
                                    for="nombreBuzon"
                                    class="form-label"
                                >
                                    Nombre completo
                                    <span>*</span>
                                </label>

                                <div class="input-buzon">

                                    <i class="fa-solid fa-user"></i>

                                    <input
                                        type="text"
                                        id="nombreBuzon"
                                        name="nombre"
                                        class="form-control"
                                        placeholder="Nombre de la persona que reporta"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- CORREO -->
                            <div class="col-md-6">

                                <label
                                    for="correoBuzon"
                                    class="form-label"
                                >
                                    Correo de contacto
                                    <span>*</span>
                                </label>

                                <div class="input-buzon">

                                    <i class="fa-solid fa-envelope"></i>

                                    <input
                                        type="email"
                                        id="correoBuzon"
                                        name="correo"
                                        class="form-control"
                                        placeholder="correo@empresa.com"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- TELÉFONO -->
                            <div class="col-md-6">

                                <label
                                    for="telefonoBuzon"
                                    class="form-label"
                                >
                                    Teléfono de contacto
                                </label>

                                <div class="input-buzon">

                                    <i class="fa-solid fa-phone"></i>

                                    <input
                                        type="tel"
                                        id="telefonoBuzon"
                                        name="telefono"
                                        class="form-control"
                                        placeholder="442 000 0000"
                                    >

                                </div>

                            </div>


                            <!-- FECHA -->
                            <div class="col-md-6">

                                <label
                                    for="fechaBuzon"
                                    class="form-label"
                                >
                                    Fecha de reporte
                                    <span>*</span>
                                </label>

                                <div class="input-buzon">

                                    <i class="fa-solid fa-calendar-days"></i>

                                    <input
                                        type="date"
                                        id="fechaBuzon"
                                        name="fecha"
                                        class="form-control"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- NO REPORTE -->
                            <div class="col-md-6">

                                <label
                                    for="reporteBuzon"
                                    class="form-label"
                                >
                                    No. Reporte
                                </label>

                                <div class="input-buzon">

                                    <i class="fa-solid fa-hashtag"></i>

                                    <input
                                        type="text"
                                        id="reporteBuzon"
                                        name="numero_reporte"
                                        class="form-control"
                                        placeholder="Ej. REP-2026-001"
                                    >

                                </div>

                                <small class="buzon-ayuda">
                                    Si cuentas con un número de reporte,
                                    indícalo aquí.
                                </small>

                            </div>


                            <!-- ASUNTO -->
                            <div class="col-12">

                                <label
                                    for="asuntoBuzon"
                                    class="form-label"
                                >
                                    Asunto
                                    <span>*</span>
                                </label>

                                <div class="input-buzon">

                                    <i class="fa-solid fa-list-check"></i>

                                    <select
                                        id="asuntoBuzon"
                                        name="asunto"
                                        class="form-select"
                                        required
                                    >

                                        <option value="">
                                            Selecciona una opción
                                        </option>

                                        <option value="Queja">
                                            Queja
                                        </option>

                                        <option value="Felicitación">
                                            Felicitación
                                        </option>

                                        <option value="Sugerencia">
                                            Sugerencia
                                        </option>

                                        <option value="Solicitud de seguimiento">
                                            Solicitud de seguimiento
                                        </option>

                                        <option value="Aclaración">
                                            Aclaración
                                        </option>

                                        <option value="Otro">
                                            Otro
                                        </option>

                                    </select>

                                </div>

                            </div>


                            <!-- MENSAJE -->
                            <div class="col-12">

                                <label
                                    for="mensajeBuzonTexto"
                                    class="form-label"
                                >
                                    Descripción
                                    <span>*</span>
                                </label>

                                <textarea
                                    id="mensajeBuzonTexto"
                                    name="mensaje"
                                    class="form-control textarea-buzon"
                                    rows="6"
                                    maxlength="2500"
                                    placeholder="Describe detalladamente tu reporte, comentario o situación..."
                                    required
                                ></textarea>

                                <div class="contador-buzon">
                                    <span id="contadorMensajeBuzon">
                                        0
                                    </span>
                                    / 2500 caracteres
                                </div>

                            </div>


                            <!-- HONEYPOT ANTI-SPAM -->
                            <div
                                class="campo-web-buzon"
                                aria-hidden="true"
                            >

                                <label for="websiteBuzon">
                                    Website
                                </label>

                                <input
                                    type="text"
                                    id="websiteBuzon"
                                    name="website"
                                    tabindex="-1"
                                    autocomplete="off"
                                >

                            </div>


                            <!-- AVISO -->
                            <div class="col-12">

                                <div class="aviso-buzon">

                                    <i class="fa-solid fa-circle-info"></i>

                                    <div>
                                        <strong>
                                            Protección de información
                                        </strong>

                                        <p>
                                            Los datos proporcionados serán
                                            utilizados exclusivamente para
                                            atender y dar seguimiento a tu
                                            reporte.
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <!-- BOTÓN -->
                            <div class="col-12">

                                <div class="buzon-form-footer">

                                    <span>
                                        <i class="fa-solid fa-shield-halved"></i>
                                        Información protegida
                                    </span>


                                    <button
                                        type="submit"
                                        id="btnEnviarBuzon"
                                        class="btn-enviar-buzon"
                                    >

                                        <span class="texto-boton">
                                            Enviar reporte
                                        </span>

                                        <span
                                            class="spinner-border spinner-border-sm d-none"
                                            id="spinnerBuzon"
                                        ></span>

                                        <i
                                            class="fa-solid fa-paper-plane"
                                            id="iconoEnviarBuzon"
                                        ></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- NAVBAR GLOBAL -->
<?php require_once __DIR__ . '/navbar.php'; ?>







<!-- NAVBAR GLOBAL -->
<?php require_once __DIR__ . '/navbar.php'; ?>



<!-- =========================================================
     ESTILOS CARRUSEL BUZÓN SEESEL
========================================================= -->
<style>
/* Contenedor principal del carrusel */
.buzon-carrusel {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    background: #fff;
}

/* Marco fijo: evita que una imagen más alta agrande todo el modal */
.buzon-slides {
    position: relative;
    width: 100%;
    aspect-ratio: 3 / 2;
    max-height: 430px;
    overflow: hidden;
    background: #fff;
}

.buzon-slide {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity .55s ease, visibility .55s ease;
}

.buzon-slide.active {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    z-index: 2;
}

.buzon-slide .buzon-imagen {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
}

/* Flechas flotantes */
.buzon-carrusel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    width: 42px;
    height: 42px;
    border: 0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,.94);
    color: #0b6b3a;
    box-shadow: 0 5px 18px rgba(0,0,0,.18);
    cursor: pointer;
    transition: transform .2s ease, background .2s ease;
}

.buzon-carrusel-btn:hover {
    background: #fff;
    transform: translateY(-50%) scale(1.08);
}

.buzon-prev { left: 14px; }
.buzon-next { right: 14px; }

/* Indicadores */
.buzon-indicadores {
    position: absolute;
    left: 50%;
    bottom: 12px;
    transform: translateX(-50%);
    z-index: 11;
    display: flex;
    gap: 8px;
}

.buzon-indicador {
    width: 9px;
    height: 9px;
    padding: 0;
    border: 0;
    border-radius: 50%;
    background: rgba(255,255,255,.65);
    box-shadow: 0 1px 5px rgba(0,0,0,.25);
    cursor: pointer;
    transition: width .25s ease, border-radius .25s ease, background .25s ease;
}

.buzon-indicador.active {
    width: 25px;
    border-radius: 999px;
    background: #169b62;
}

@media (max-width: 576px) {
    .buzon-slides {
        aspect-ratio: 4 / 3;
        max-height: 320px;
    }

    .buzon-carrusel-btn {
        width: 34px;
        height: 34px;
    }
    .buzon-prev { left: 7px; }
    .buzon-next { right: 7px; }
}
</style>

<!-- =========================================================
     SCRIPT BUZÓN PARA SISTEMAS DE TIERRA
========================================================= -->

<script>
document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENTOS
    ===================================================== */

    const modalBuzon = document.getElementById('modalBuzonTierras');

    const paso1 = document.getElementById('buzonPaso1');
    const paso2 = document.getElementById('buzonPaso2');

    const btnContinuar = document.getElementById('btnContinuarBuzon');
    const btnRegresar = document.getElementById('btnRegresarBuzon');

    const formulario = document.getElementById('formBuzonTierras');

    const textarea = document.getElementById('mensajeBuzonTexto');
    const contador = document.getElementById('contadorMensajeBuzon');

    const mensajeRespuesta = document.getElementById('mensajeBuzon');

    const btnEnviar = document.getElementById('btnEnviarBuzon');
    const spinner = document.getElementById('spinnerBuzon');
    const iconoEnviar = document.getElementById('iconoEnviarBuzon');


    /* =====================================================
       PASO 1 → PASO 2
    ===================================================== */

    if (btnContinuar) {

        btnContinuar.addEventListener('click', function (e) {

            e.preventDefault();

            console.log('Continuar presionado');

            if (!paso1 || !paso2) {
                console.error('No se encontraron los pasos del buzón.');
                return;
            }


            /* Ocultar imagen */
            paso1.classList.add('d-none');


            /* Mostrar formulario */
            paso2.classList.remove('d-none');


            /* Subir al inicio del modal */
            const modalBody = modalBuzon.querySelector('.modal-body');

            if (modalBody) {
                modalBody.scrollTop = 0;
            }

        });

    }


    /* =====================================================
       PASO 2 → PASO 1
    ===================================================== */

    if (btnRegresar) {

        btnRegresar.addEventListener('click', function (e) {

            e.preventDefault();


            paso2.classList.add('d-none');

            paso1.classList.remove('d-none');


            const modalBody = modalBuzon.querySelector('.modal-body');

            if (modalBody) {
                modalBody.scrollTop = 0;
            }

        });

    }


    /* =====================================================
       CONTADOR DE CARACTERES
    ===================================================== */

    if (textarea && contador) {

        textarea.addEventListener('input', function () {

            contador.textContent = textarea.value.length;

        });

    }


    /* =====================================================
       REINICIAR MODAL AL CERRAR
    ===================================================== */

    if (modalBuzon) {

        modalBuzon.addEventListener('hidden.bs.modal', function () {

            paso2.classList.add('d-none');

            paso1.classList.remove('d-none');


            if (mensajeRespuesta) {

                mensajeRespuesta.classList.add('d-none');

                mensajeRespuesta.classList.remove(
                    'alert-success',
                    'alert-danger'
                );

            }

        });

    }


    /* =====================================================
       ENVÍO DEL FORMULARIO
    ===================================================== */

    if (formulario) {

        formulario.addEventListener('submit', async function (e) {

            e.preventDefault();


            /* ---------------------------------------------
               LIMPIAR MENSAJES
            --------------------------------------------- */

            mensajeRespuesta.classList.add('d-none');

            mensajeRespuesta.classList.remove(
                'alert-success',
                'alert-danger'
            );


            /* ---------------------------------------------
               DATOS
            --------------------------------------------- */

            const formData = new FormData(formulario);


            /* ---------------------------------------------
               BOTÓN CARGANDO
            --------------------------------------------- */

            btnEnviar.disabled = true;

            if (spinner) {
                spinner.classList.remove('d-none');
            }

            if (iconoEnviar) {
                iconoEnviar.classList.add('d-none');
            }


            try {

                /* -----------------------------------------
                   ENVIAR
                ----------------------------------------- */

                const respuesta = await fetch(
                    'index.php?c=contacto&a=enviarBuzonTierras',
                    {
                        method: 'POST',
                        body: formData
                    }
                );


                /* -----------------------------------------
                   VERIFICAR RESPUESTA
                ----------------------------------------- */

                if (!respuesta.ok) {

                    throw new Error(
                        'Error del servidor: ' +
                        respuesta.status
                    );

                }


                const resultado = await respuesta.json();


                /* -----------------------------------------
                   CORRECTO
                ----------------------------------------- */

                if (resultado.success) {

                    mensajeRespuesta.classList.remove('d-none');

                    mensajeRespuesta.classList.add(
                        'alert-success'
                    );


                    mensajeRespuesta.innerHTML = `
                        <i class="fa-solid fa-circle-check me-2"></i>
                        ${resultado.message}
                    `;


                    formulario.reset();


                    if (contador) {
                        contador.textContent = '0';
                    }


                    mensajeRespuesta.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });

                }


                /* -----------------------------------------
                   ERROR DEL CONTROLADOR
                ----------------------------------------- */

                else {

                    throw new Error(
                        resultado.message ||
                        'No fue posible enviar el reporte.'
                    );

                }


            } catch (error) {

                console.error(
                    'Error Buzón:',
                    error
                );


                mensajeRespuesta.classList.remove('d-none');

                mensajeRespuesta.classList.add(
                    'alert-danger'
                );


                mensajeRespuesta.innerHTML = `
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    ${
                        error.message ||
                        'Ocurrió un problema al enviar el reporte.'
                    }
                `;

            }


            /* ---------------------------------------------
               RESTAURAR BOTÓN
            --------------------------------------------- */

            finally {

                btnEnviar.disabled = false;


                if (spinner) {
                    spinner.classList.add('d-none');
                }


                if (iconoEnviar) {
                    iconoEnviar.classList.remove('d-none');
                }

            }

        });

    }

});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const modalBuzon = document.getElementById('modalBuzonTierras');
    const carrusel = document.querySelector('#modalBuzonTierras .buzon-carrusel');

    if (!carrusel) return;

    const slides = Array.from(carrusel.querySelectorAll('.buzon-slide'));
    const indicadores = Array.from(carrusel.querySelectorAll('.buzon-indicador'));
    const btnAnterior = carrusel.querySelector('.buzon-prev');
    const btnSiguiente = carrusel.querySelector('.buzon-next');

    if (slides.length < 2) return;

    let slideActual = 0;
    let intervaloCarrusel = null;
    const tiempoCambio = 4000;

    function mostrarSlide(index) {
        slideActual = (index + slides.length) % slides.length;

        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === slideActual);
        });

        indicadores.forEach((indicador, i) => {
            indicador.classList.toggle('active', i === slideActual);
        });
    }

    function siguienteSlide() {
        mostrarSlide(slideActual + 1);
    }

    function anteriorSlide() {
        mostrarSlide(slideActual - 1);
    }

    function detenerCarrusel() {
        if (intervaloCarrusel !== null) {
            clearInterval(intervaloCarrusel);
            intervaloCarrusel = null;
        }
    }

    function iniciarCarrusel() {
        detenerCarrusel();
        intervaloCarrusel = setInterval(siguienteSlide, tiempoCambio);
    }

    function reiniciarCarrusel() {
        iniciarCarrusel();
    }

    btnSiguiente?.addEventListener('click', function () {
        siguienteSlide();
        reiniciarCarrusel();
    });

    btnAnterior?.addEventListener('click', function () {
        anteriorSlide();
        reiniciarCarrusel();
    });

    indicadores.forEach((indicador, index) => {
        indicador.addEventListener('click', function () {
            mostrarSlide(index);
            reiniciarCarrusel();
        });
    });

    /* Pausa solamente mientras el mouse está encima de la imagen */
    carrusel.addEventListener('mouseenter', detenerCarrusel);
    carrusel.addEventListener('mouseleave', iniciarCarrusel);

    /* Inicia al abrir el modal y se detiene al cerrarlo */
    if (modalBuzon) {
        modalBuzon.addEventListener('shown.bs.modal', function () {
            mostrarSlide(0);
            iniciarCarrusel();
        });

        modalBuzon.addEventListener('hidden.bs.modal', detenerCarrusel);
    } else {
        mostrarSlide(0);
        iniciarCarrusel();
    }

    mostrarSlide(0);
});
</script>