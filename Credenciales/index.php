<?php

/* ============================================================
   SEESEL - CREDENCIAL DIGITAL
============================================================ */

$codigo = strtoupper(trim($_GET['id'] ?? ''));


/* ============================================================
   VALIDAR CÓDIGO
============================================================ */

if (!preg_match('/^[A-Z0-9\-]+$/', $codigo)) {
    $codigo = '';
}


$empleado = null;


/* ============================================================
   LEER JSON DEL EMPLEADO
============================================================ */

if ($codigo !== '') {

    $archivo = __DIR__ . '/datos/' . $codigo . '.json';

    if (file_exists($archivo)) {

        $contenido = file_get_contents($archivo);

        if ($contenido !== false) {

            $empleado = json_decode(
                $contenido,
                true
            );

        }

    }

}


/* ============================================================
   VALIDAR EMPLEADO
============================================================ */

if (!is_array($empleado)) {
    $empleado = null;
}


/* ============================================================
   FUNCIÓN SEGURA
============================================================ */

function e($valor)
{
    return htmlspecialchars(
        (string)$valor,
        ENT_QUOTES,
        'UTF-8'
    );
}


/* ============================================================
   DATOS DEL EMPLEADO
============================================================ */

$codigoEmpleado   = $empleado['codigo'] ?? '';
$nombre           = $empleado['nombre'] ?? '';
$puesto           = $empleado['puesto'] ?? '';
$empresa          = $empleado['empresa'] ?? '';
$correo           = $empleado['correo'] ?? '';
$telefono         = $empleado['telefono'] ?? '';

$fechaNacimiento  = $empleado['fecha_nacimiento'] ?? '';

$curp              = $empleado['curp'] ?? '';
$nss               = $empleado['nss'] ?? '';
$tipoSangre        = $empleado['tipo_sangre'] ?? '';
$alergias          = $empleado['alergias'] ?? '';
$ubicacion         = $empleado['ubicacion'] ?? '';
$vigencia          = $empleado['vigencia'] ?? '';
$estatus           = $empleado['estatus'] ?? '';
$foto              = $empleado['foto'] ?? '';


/* ============================================================
   EDAD
============================================================ */

$edad = '';

if (!empty($fechaNacimiento)) {

    try {

        $nacimiento = new DateTime($fechaNacimiento);
        $hoy = new DateTime();

        if ($nacimiento <= $hoy) {

            $edad = $hoy
                ->diff($nacimiento)
                ->y;

        }

    } catch (Exception $ex) {

        $edad = '';

    }

}


/* ============================================================
   FECHA DE NACIMIENTO
============================================================ */

$fechaNacimientoMostrar = '';

if (!empty($fechaNacimiento)) {

    try {

        $fechaObj = new DateTime(
            $fechaNacimiento
        );

        $fechaNacimientoMostrar =
            $fechaObj->format('d/m/Y');

    } catch (Exception $ex) {

        $fechaNacimientoMostrar = '';

    }

}


/* ============================================================
   ESTATUS
============================================================ */

$activo =
    strtolower(trim($estatus)) === 'activo';


/* ============================================================
   TELÉFONO PARA ENLACE
============================================================ */

$telefonoLink = '';

if (!empty($telefono)) {

    $telefonoLink = preg_replace(
        '/[^0-9\+]/',
        '',
        $telefono
    );

}


/* ============================================================
   INDICAR SI EXISTEN DATOS PERSONALES
============================================================ */

$tieneDatosPersonales =

    !empty($fechaNacimientoMostrar) ||
    $edad !== '' ||
    !empty($curp) ||
    !empty($nss) ||
    !empty($tipoSangre) ||
    !empty($alergias) ||
    !empty($ubicacion) ||
    !empty($vigencia);

?>

<!DOCTYPE html>

<html lang="es">


<head>

    <meta charset="UTF-8">


    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >


    <title>

        <?= $nombre
            ? 'Credencial | ' . e($nombre)
            : 'Credencial SEESEL'
        ?>

    </title>


    <!-- ======================================================
         CSS DE LA CREDENCIAL
    ======================================================= -->

    <link
        rel="stylesheet"
        href="assets/css/credencial.css"
    >


    <!-- ======================================================
         FONT AWESOME
    ======================================================= -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- ======================================================
         MONTSERRAT
    ======================================================= -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >


</head>


<body>


<div class="pagina">


<?php if (!$empleado): ?>


    <!-- ======================================================
         CREDENCIAL NO ENCONTRADA
    ======================================================= -->

    <div class="error-card">


        <div class="error-icono">

            <i class="fa-solid fa-id-card"></i>

        </div>


        <h1>
            Credencial no encontrada
        </h1>


        <p>

            El código ingresado no corresponde
            a una credencial registrada.

        </p>


        <strong>

            <?= e(
                $codigo ?: 'Sin código'
            ) ?>

        </strong>


    </div>


<?php else: ?>


<!-- ==========================================================
     CREDENCIAL
=========================================================== -->

<main class="credencial">



    <!-- ======================================================
         HERO
    ======================================================= -->

    <section class="credencial-hero">


        <!--
        ========================================================
        IMAGEN INDUSTRIAL

        Guarda tu imagen por ejemplo en:

        img/fondo-credencial.jpg
        ========================================================
        -->

        <img
            src="img/219.png"
            alt="SEESEL Servicios Especiales Eléctricos"
            class="hero-fondo"
        >


        <!-- CAPAS -->

        <div class="hero-overlay"></div>

        <div class="hero-degradado"></div>



        <!-- DECORACIONES -->

        <div class="hero-shape hero-shape-1"></div>

        <div class="hero-shape hero-shape-2"></div>

        <div class="hero-shape hero-shape-3"></div>



        <!-- ==================================================
             LOGO
        =================================================== -->

        <div class="hero-logo">


            <img
                src="img/1.1.png"
                alt="SEESEL"
            >


            <div class="hero-logo-texto">

                <strong>
                    SERVICIOS ESPECIALES
                </strong>

                <span>
                    ELÉCTRICOS S.A. DE C.V.
                </span>

            </div>


        </div>



        <!-- ==================================================
             FRASE
        =================================================== -->

        <div class="hero-frase">

            <span>
                SOLUCIONES ELÉCTRICAS
            </span>

            <span>
                PARA UN FUTURO
            </span>

            <strong>
                MÁS SEGURO
            </strong>

            <div class="hero-frase-linea"></div>

        </div>



       


    </section>



    <!-- ======================================================
         FOTOGRAFÍA DEL EMPLEADO
    ======================================================= -->

    <?php if (!empty($foto)): ?>


        <div class="foto-empleado">


            <div class="foto-borde">


                <img
                    src="img/<?= e($foto) ?>"
                    alt="<?= e($nombre) ?>"
                >


            </div>


        </div>


    <?php else: ?>


        <!-- SI NO TIENE FOTO -->

        <div class="foto-empleado foto-sin-imagen">


            <div class="foto-borde">

                <div class="foto-placeholder">

                    <i class="fa-solid fa-user"></i>

                </div>

            </div>


        </div>


    <?php endif; ?>



    <!-- ======================================================
         CONTENIDO
    ======================================================= -->

    <div class="credencial-contenido">



        <!-- ==================================================
             IDENTIDAD
        =================================================== -->

        <section class="identidad">


            <!-- ESTATUS -->

            <?php if (!empty($estatus)): ?>


                <div
                    class="
                        estatus
                        <?= $activo
                            ? 'vigente'
                            : 'no-vigente'
                        ?>
                    "
                >


                    <span class="estatus-punto"></span>


                    <?= $activo
                        ? 'CREDENCIAL VIGENTE'
                        : 'CREDENCIAL NO VIGENTE'
                    ?>


                </div>


            <?php endif; ?>



            <!-- NOMBRE -->

            <?php if (!empty($nombre)): ?>


                <h1>

                    <?= e($nombre) ?>

                </h1>


            <?php endif; ?>



            <!-- PUESTO -->

            <?php if (!empty($puesto)): ?>


                <h2>

                    <?= e($puesto) ?>

                </h2>


            <?php endif; ?>



            <!-- EMPRESA -->

            <?php if (!empty($empresa)): ?>


                <p class="empresa">

                    <?= e($empresa) ?>

                </p>


            <?php else: ?>


                <p class="empresa">

                    SERVICIOS ESPECIALES ELÉCTRICOS S.A. DE C.V.

                </p>


            <?php endif; ?>



            <div class="identidad-linea"></div>


        </section>



        <!-- ==================================================
             INFORMACIÓN PRINCIPAL
        =================================================== -->

        <section class="datos-card">



            <!-- =================================================
                 NÚMERO EMPLEADO
            ================================================== -->

            <?php if (!empty($codigoEmpleado)): ?>


                <div class="dato-fila">


                    <div class="dato-icono">

                        <i class="fa-solid fa-user"></i>

                    </div>


                    <div class="dato-contenido">


                        <span>
                            Número de empleado
                        </span>


                        <strong>

                            <?= e($codigoEmpleado) ?>

                        </strong>


                    </div>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 PUESTO
            ================================================== -->

            <?php if (!empty($puesto)): ?>


                <div class="dato-fila">


                    <div class="dato-icono">

                        <i class="fa-solid fa-briefcase"></i>

                    </div>


                    <div class="dato-contenido">


                        <span>
                            Puesto
                        </span>


                        <strong>

                            <?= e($puesto) ?>

                        </strong>


                    </div>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 CORREO
            ================================================== -->

            <?php if (!empty($correo)): ?>


                <div class="dato-fila">


                    <div class="dato-icono">

                        <i class="fa-solid fa-envelope"></i>

                    </div>


                    <div class="dato-contenido">


                        <span>
                            Correo
                        </span>


                        <strong>

                            <?= e($correo) ?>

                        </strong>


                    </div>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 TELÉFONO
            ================================================== -->

            <?php if (!empty($telefono)): ?>


                <div class="dato-fila">


                    <div class="dato-icono">

                        <i class="fa-solid fa-phone"></i>

                    </div>


                    <div class="dato-contenido">


                        <span>
                            Teléfono
                        </span>


                        <strong>

                            <?= e($telefono) ?>

                        </strong>


                    </div>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 FECHA / EDAD
            ================================================== -->

            <?php if (
                !empty($fechaNacimientoMostrar) ||
                $edad !== ''
            ): ?>


                <div class="dato-doble">


                    <?php if (!empty($fechaNacimientoMostrar)): ?>


                        <div class="dato-fila">


                            <div class="dato-icono">

                                <i class="fa-solid fa-calendar-days"></i>

                            </div>


                            <div class="dato-contenido">


                                <span>
                                    Fecha de nacimiento
                                </span>


                                <strong>

                                    <?= e(
                                        $fechaNacimientoMostrar
                                    ) ?>

                                </strong>


                            </div>


                        </div>


                    <?php endif; ?>



                    <?php if ($edad !== ''): ?>


                        <div class="dato-fila">


                            <div class="dato-icono">

                                <i class="fa-solid fa-cake-candles"></i>

                            </div>


                            <div class="dato-contenido">


                                <span>
                                    Edad
                                </span>


                                <strong>

                                    <?= e($edad) ?> años

                                </strong>


                            </div>


                        </div>


                    <?php endif; ?>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 CURP
            ================================================== -->

            <?php if (!empty($curp)): ?>


                <div class="dato-fila">


                    <div class="dato-icono">

                        <i class="fa-solid fa-id-card"></i>

                    </div>


                    <div class="dato-contenido">


                        <span>
                            CURP
                        </span>


                        <strong>

                            <?= e($curp) ?>

                        </strong>


                    </div>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 NSS / TIPO DE SANGRE
            ================================================== -->

            <?php if (
                !empty($nss) ||
                !empty($tipoSangre)
            ): ?>


                <div class="dato-doble dato-doble-medico">



                    <!-- NSS -->

                    <?php if (!empty($nss)): ?>


                        <div class="dato-fila">


                            <div class="dato-icono">

                                <i class="fa-solid fa-shield-heart"></i>

                            </div>


                            <div class="dato-contenido">


                                <span>
                                    NSS
                                </span>


                                <strong>

                                    <?= e($nss) ?>

                                </strong>


                            </div>


                        </div>


                    <?php endif; ?>



                    <!-- SANGRE -->

                    <?php if (!empty($tipoSangre)): ?>


                        <div class="dato-fila">


                            <div class="dato-icono">

                                <i class="fa-solid fa-droplet"></i>

                            </div>


                            <div class="dato-contenido">


                                <span>
                                    Tipo de sangre
                                </span>


                                <strong>

                                    <?= e($tipoSangre) ?>

                                </strong>


                            </div>


                        </div>


                    <?php endif; ?>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 ALERGIAS
            ================================================== -->

            <?php if (!empty($alergias)): ?>


                <div class="dato-fila">


                    <div class="dato-icono">

                        <i class="fa-solid fa-heart-pulse"></i>

                    </div>


                    <div class="dato-contenido">


                        <span>
                            Alergias
                        </span>


                        <strong>

                            <?= e($alergias) ?>

                        </strong>


                    </div>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 UBICACIÓN
            ================================================== -->

            <?php if (!empty($ubicacion)): ?>


                <div class="dato-fila">


                    <div class="dato-icono">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>


                    <div class="dato-contenido">


                        <span>
                            Ubicación
                        </span>


                        <strong>

                            <?= e($ubicacion) ?>

                        </strong>


                    </div>


                </div>


            <?php endif; ?>



            <!-- =================================================
                 VIGENCIA
            ================================================== -->

            <?php if (!empty($vigencia)): ?>


                <div class="dato-fila">


                    <div class="dato-icono">

                        <i class="fa-solid fa-calendar-check"></i>

                    </div>


                    <div class="dato-contenido">


                        <span>
                            Vigencia
                        </span>


                        <strong>

                            <?= e($vigencia) ?>

                        </strong>


                    </div>


                </div>


            <?php endif; ?>


        </section>



        <!-- ==================================================
             BOTONES LLAMAR / CORREO
        =================================================== -->

        <?php if (
            !empty($telefono) ||
            !empty($correo)
        ): ?>


            <section class="acciones">



                <!-- =============================================
                     LLAMAR
                ============================================== -->

                <?php if (
                    !empty($telefono) &&
                    !empty($telefonoLink)
                ): ?>


                    <a
                        href="tel:<?= e($telefonoLink) ?>"
                        class="btn btn-telefono"
                    >


                        <span class="btn-icono">

                            <i class="fa-solid fa-phone"></i>

                        </span>


                        <span>

                            Llamar

                        </span>


                    </a>


                <?php endif; ?>



                <!-- =============================================
                     CORREO
                ============================================== -->

                <?php if (!empty($correo)): ?>


                    <a
                        href="mailto:<?= e($correo) ?>"
                        class="btn btn-correo"
                    >


                        <span class="btn-icono">

                            <i class="fa-solid fa-envelope"></i>

                        </span>


                        <span>

                            Enviar correo

                        </span>


                    </a>


                <?php endif; ?>


            </section>


        <?php endif; ?>


    </div>



    <!-- ======================================================
         FOOTER
    ======================================================= -->

    <footer class="footer-credencial">


        <!-- ONDAS DECORATIVAS -->

        <div class="footer-onda footer-onda-1"></div>

        <div class="footer-onda footer-onda-2"></div>



        <div class="footer-contenido">



            <!-- PERSONAS -->

            <div class="footer-item">


                <div class="footer-icono">

                    <i class="fa-solid fa-helmet-safety"></i>

                </div>


                <span>

                    PERSONAS<br>
                    SEGURAS

                </span>


            </div>



            <div class="footer-divisor"></div>



            <!-- ENTORNOS -->

            <div class="footer-item">


                <div class="footer-icono">

                    <i class="fa-solid fa-leaf"></i>

                </div>


                <span>

                    ENTORNOS<br>
                    SUSTENTABLES

                </span>


            </div>



            <div class="footer-divisor"></div>



            <!-- SOLUCIONES -->

            <div class="footer-item">


                <div class="footer-icono">

                    <i class="fa-solid fa-gear"></i>

                </div>


                <span>

                    SOLUCIONES<br>
                    CON VALOR

                </span>


            </div>


        </div>


    </footer>


</main>


<?php endif; ?>


</div>


</body>

</html>