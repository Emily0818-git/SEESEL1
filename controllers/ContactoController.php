<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class ContactoController
{

    /* =====================================================
       MOSTRAR PÁGINA DE CONTACTO
    ====================================================== */

    public function index()
    {

        require_once 'views/layout/header.php';
        require_once 'views/contacto/index.php';
        require_once 'views/layout/footer.php';

    }



    /* =====================================================
       ENVIAR FORMULARIO NORMAL DE CONTACTO
    ====================================================== */

    public function enviar()
    {

        header('Content-Type: application/json; charset=utf-8');


        /* =================================================
           SOLO PERMITIR POST
        ================================================== */

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            echo json_encode([
                'success' => false,
                'message' => 'Método no permitido.'
            ]);

            exit;
        }


        /* =================================================
           RECIBIR DATOS
        ================================================== */

        $nombre = trim($_POST['nombre'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $telefono = trim($_POST['telefono'] ?? '');
        $motivo = trim($_POST['motivo'] ?? '');
        $mensaje = trim($_POST['mensaje'] ?? '');
        $website = trim($_POST['website'] ?? '');


        /* =================================================
           HONEYPOT ANTISPAM
        ================================================== */

        if ($website !== '') {

            echo json_encode([
                'success' => false,
                'message' => 'Solicitud no válida.'
            ]);

            exit;
        }


        /* =================================================
           VALIDAR CAMPOS
        ================================================== */

        if (
            $nombre === '' ||
            $email === '' ||
            $motivo === '' ||
            $mensaje === ''
        ) {

            echo json_encode([
                'success' => false,
                'message' => 'Completa todos los campos obligatorios.'
            ]);

            exit;
        }


        /* =================================================
           VALIDAR CORREO
        ================================================== */

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            echo json_encode([
                'success' => false,
                'message' => 'El correo electrónico no es válido.'
            ]);

            exit;
        }


        /* =================================================
           CARGAR PHPMAILER
        ================================================== */

        $autoload = __DIR__ . '/../vendor/autoload.php';


        if (!file_exists($autoload)) {

            echo json_encode([
                'success' => false,
                'message' => 'No se encontró vendor/autoload.php.'
            ]);

            exit;
        }


        require_once $autoload;


        /* =================================================
           CREAR PHPMAILER
        ================================================== */

        $mail = new PHPMailer(true);


        try {


            /* =============================================
               CONFIGURACIÓN SMTP
            ============================================== */

            $mail->isSMTP();

            $mail->Host = 'smtp.gmail.com';

            $mail->SMTPAuth = true;


            /* =============================================
               CUENTA SMTP
            ============================================== */

            $correoSMTP = 'olguinemily503@gmail.com';

            $mail->Username = $correoSMTP;


            /*
             * IMPORTANTE:
             * COLOCA AQUÍ TU NUEVA CONTRASEÑA
             * DE APLICACIÓN DE GOOGLE.
             */

            $mail->Password =
                'smdv fkaw exgo opkm';


            /* =============================================
               SEGURIDAD
            ============================================== */

            $mail->SMTPSecure =
                PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Port = 587;

            $mail->CharSet = 'UTF-8';


            /* =============================================
               REMITENTE
            ============================================== */

            $mail->setFrom(
                $correoSMTP,
                'Sitio Web SEESEL'
            );


            /* =============================================
               DESTINATARIO CONTACTO
            ============================================== */

            $mail->addAddress(
                'negocios2@seeselqro.com.mx',
                'Contacto SEESEL'
            );


            /* =============================================
               RESPONDER AL CLIENTE
            ============================================== */

            $mail->addReplyTo(
                $email,
                $nombre
            );


            /* =============================================
               SANITIZAR DATOS
            ============================================== */

            $nombreSeguro = htmlspecialchars(
                $nombre,
                ENT_QUOTES,
                'UTF-8'
            );


            $emailSeguro = htmlspecialchars(
                $email,
                ENT_QUOTES,
                'UTF-8'
            );


            $telefonoSeguro = htmlspecialchars(
                $telefono,
                ENT_QUOTES,
                'UTF-8'
            );


            $motivoSeguro = htmlspecialchars(
                $motivo,
                ENT_QUOTES,
                'UTF-8'
            );


            $mensajeSeguro = nl2br(
                htmlspecialchars(
                    $mensaje,
                    ENT_QUOTES,
                    'UTF-8'
                )
            );


            /* =============================================
               ASUNTO
            ============================================== */

            $mail->isHTML(true);

            $mail->Subject =
                'Nueva solicitud web - ' .
                $motivo;


            /* =============================================
               CUERPO DEL CORREO
            ============================================== */

            $mail->Body = "

            <div style='
                max-width:650px;
                margin:30px auto;
                font-family:Arial,Helvetica,sans-serif;
                background:#ffffff;
                border:1px solid #e5e7eb;
                border-radius:12px;
                overflow:hidden;
            '>

                <div style='
                    background:#00233f;
                    padding:28px 30px;
                '>

                    <h2 style='
                        margin:0;
                        color:#8ee800;
                        font-size:24px;
                    '>
                        Nueva solicitud SEESEL
                    </h2>

                    <p style='
                        margin:8px 0 0;
                        color:#ffffff;
                        font-size:14px;
                    '>
                        Se recibió un nuevo mensaje
                        desde el formulario del sitio web.
                    </p>

                </div>


                <div style='
                    padding:30px;
                    color:#071a30;
                '>

                    <table
                        cellpadding='8'
                        cellspacing='0'
                        style='
                            width:100%;
                            border-collapse:collapse;
                        '
                    >

                        <tr>

                            <td style='
                                width:140px;
                                font-weight:bold;
                                color:#00233f;
                            '>
                                Nombre
                            </td>

                            <td>
                                {$nombreSeguro}
                            </td>

                        </tr>


                        <tr>

                            <td style='
                                font-weight:bold;
                                color:#00233f;
                            '>
                                Correo
                            </td>

                            <td>
                                {$emailSeguro}
                            </td>

                        </tr>


                        <tr>

                            <td style='
                                font-weight:bold;
                                color:#00233f;
                            '>
                                Teléfono
                            </td>

                            <td>
                                {$telefonoSeguro}
                            </td>

                        </tr>


                        <tr>

                            <td style='
                                font-weight:bold;
                                color:#00233f;
                            '>
                                Motivo
                            </td>

                            <td>
                                {$motivoSeguro}
                            </td>

                        </tr>

                    </table>


                    <div style='
                        margin-top:25px;
                        padding:20px;
                        background:#f7f9fb;
                        border-left:4px solid #8ee800;
                        border-radius:6px;
                    '>

                        <strong style='color:#00233f;'>
                            Mensaje:
                        </strong>


                        <p style='
                            margin:10px 0 0;
                            line-height:1.7;
                            color:#334155;
                        '>
                            {$mensajeSeguro}
                        </p>

                    </div>

                </div>


                <div style='
                    padding:15px 30px;
                    background:#f1f5f9;
                    color:#64748b;
                    font-size:12px;
                '>

                    Mensaje enviado desde el formulario
                    de contacto del sitio web de SEESEL.

                </div>

            </div>

            ";


            /* =============================================
               TEXTO PLANO
            ============================================== */

            $mail->AltBody =

                "Nueva solicitud SEESEL\n\n" .

                "Nombre: {$nombre}\n" .

                "Correo: {$email}\n" .

                "Teléfono: {$telefono}\n" .

                "Motivo: {$motivo}\n\n" .

                "Mensaje:\n{$mensaje}";


            /* =============================================
               ENVIAR
            ============================================== */

            $mail->send();


            echo json_encode([
                'success' => true,
                'message' =>
                    'Tu solicitud fue enviada correctamente.'
            ]);

        }


        catch (Exception $e) {

            error_log(
                'Error PHPMailer Contacto: ' .
                $mail->ErrorInfo
            );


            echo json_encode([
                'success' => false,
                'message' =>
                    'No fue posible enviar tu solicitud.'
            ]);

        }


        catch (\Throwable $e) {

            error_log(
                'Error PHP Contacto: ' .
                $e->getMessage()
            );


            echo json_encode([
                'success' => false,
                'message' =>
                    'Ocurrió un error interno del servidor.'
            ]);

        }


        exit;

    }



    /* =====================================================
       BUZÓN PARA SISTEMAS DE TIERRA
    ====================================================== */

    public function enviarBuzonTierras()
    {

        header('Content-Type: application/json; charset=utf-8');


        /* =================================================
           SOLO POST
        ================================================== */

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            echo json_encode([
                'success' => false,
                'message' => 'Método no permitido.'
            ]);

            exit;
        }


        /* =================================================
           HONEYPOT
        ================================================== */

        $website = trim(
            $_POST['website'] ?? ''
        );


        if ($website !== '') {

            echo json_encode([
                'success' => false,
                'message' => 'Solicitud no válida.'
            ]);

            exit;
        }


        /* =================================================
           RECIBIR DATOS
        ================================================== */

        $empresa = trim(
            $_POST['empresa'] ?? ''
        );


        $nombre = trim(
            $_POST['nombre'] ?? ''
        );


        $correo = trim(
            $_POST['correo'] ?? ''
        );


        $telefono = trim(
            $_POST['telefono'] ?? ''
        );


        $fecha = trim(
            $_POST['fecha'] ?? ''
        );


        $numeroReporte = trim(
            $_POST['numero_reporte'] ?? ''
        );


        $asunto = trim(
            $_POST['asunto'] ?? ''
        );


        $mensaje = trim(
            $_POST['mensaje'] ?? ''
        );


        /* =================================================
           VALIDAR CAMPOS
        ================================================== */

        if (
            $empresa === '' ||
            $nombre === '' ||
            $correo === '' ||
            $fecha === '' ||
            $asunto === '' ||
            $mensaje === ''
        ) {

            echo json_encode([
                'success' => false,
                'message' =>
                    'Completa todos los campos obligatorios.'
            ]);

            exit;
        }


        /* =================================================
           VALIDAR CORREO
        ================================================== */

        if (
            !filter_var(
                $correo,
                FILTER_VALIDATE_EMAIL
            )
        ) {

            echo json_encode([
                'success' => false,
                'message' =>
                    'El correo electrónico no es válido.'
            ]);

            exit;
        }


        /* =================================================
           SANITIZAR
        ================================================== */

        $empresaSeguro = htmlspecialchars(
            $empresa,
            ENT_QUOTES,
            'UTF-8'
        );


        $nombreSeguro = htmlspecialchars(
            $nombre,
            ENT_QUOTES,
            'UTF-8'
        );


        $correoSeguro = htmlspecialchars(
            $correo,
            ENT_QUOTES,
            'UTF-8'
        );


        $telefonoSeguro = htmlspecialchars(
            $telefono,
            ENT_QUOTES,
            'UTF-8'
        );


        $fechaSegura = htmlspecialchars(
            $fecha,
            ENT_QUOTES,
            'UTF-8'
        );


        $reporteSeguro = htmlspecialchars(
            $numeroReporte,
            ENT_QUOTES,
            'UTF-8'
        );


        $asuntoSeguro = htmlspecialchars(
            $asunto,
            ENT_QUOTES,
            'UTF-8'
        );


        $mensajeSeguro = nl2br(
            htmlspecialchars(
                $mensaje,
                ENT_QUOTES,
                'UTF-8'
            )
        );


        /* =================================================
           CARGAR PHPMAILER
        ================================================== */

        $autoload =
            __DIR__ .
            '/../vendor/autoload.php';


        if (!file_exists($autoload)) {

            echo json_encode([
                'success' => false,
                'message' =>
                    'No se encontró vendor/autoload.php.'
            ]);

            exit;
        }


        require_once $autoload;


        /* =================================================
           CREAR PHPMAILER
        ================================================== */

        $mail = new PHPMailer(true);


        try {


            /* =============================================
               SMTP
            ============================================== */

            $mail->isSMTP();

            $mail->Host =
                'smtp.gmail.com';

            $mail->SMTPAuth =
                true;


            /* =============================================
               CUENTA SMTP
            ============================================== */

            $correoSMTP =
                'olguinemily503@gmail.com';


            $mail->Username =
                $correoSMTP;


            /*
             * IMPORTANTE:
             * DEBE SER LA MISMA CONTRASEÑA
             * DE APLICACIÓN QUE ARRIBA.
             */

            $mail->Password =
                'smdv fkaw exgo opkm';


            /* =============================================
               SEGURIDAD
            ============================================== */

            $mail->SMTPSecure =
                PHPMailer::ENCRYPTION_STARTTLS;


            $mail->Port =
                587;


            $mail->CharSet =
                'UTF-8';


            /* =============================================
               REMITENTE
            ============================================== */

            $mail->setFrom(
                $correoSMTP,
                'SEESEL - Buzón Sistemas de Tierra'
            );


           /* =============================================
            DESTINATARIO PRINCIPAL - CALIDAD
            ============================================== */

            $mail->addAddress(
                'calidad@seeselqro.com.mx',
                'Calidad SEESEL'
            );


            /* =============================================
            COPIA - RECURSOS HUMANOS
            ============================================== */

            $mail->addCC(
                'recursoshumanos@seeselqro.com.mx',
                'Recursos Humanos SEESEL'
            );


            /* =============================================
            COPIA - DIRECCIÓN
            ============================================== */

            $mail->addCC(
                'adrian.solis@seeselqro.com.mx',
                'Dirección SEESEL'
            );


            /* =============================================
               RESPONDER A QUIEN LLENÓ EL FORMULARIO
            ============================================== */

            $mail->addReplyTo(
                $correo,
                $nombre
            );


            /* =============================================
               ASUNTO
            ============================================== */

            $mail->isHTML(true);


            $mail->Subject =
                'Buzón Sistemas de Tierra - ' .
                $asunto;


            /* =============================================
               CUERPO HTML
            ============================================== */

            $mail->Body = "

            <!DOCTYPE html>

            <html lang='es'>

            <head>

                <meta charset='UTF-8'>

            </head>


            <body style='
                margin:0;
                padding:0;
                background:#f3f7f5;
                font-family:Arial,Helvetica,sans-serif;
            '>


                <div style='
                    max-width:700px;
                    margin:30px auto;
                    background:#ffffff;
                    border:1px solid #e4ebe7;
                    border-radius:14px;
                    overflow:hidden;
                    box-shadow:
                        0 10px 35px
                        rgba(0,0,0,.08);
                '>


                    <!-- HEADER -->

                    <div style='
                        background:
                            linear-gradient(
                                135deg,
                                #08783f,
                                #16a34a
                            );

                        padding:30px 32px;

                        color:#ffffff;
                    '>


                        <div style='
                            font-size:11px;
                            font-weight:bold;
                            letter-spacing:2px;
                            opacity:.85;
                        '>

                            SEESEL

                        </div>


                        <h2 style='
                            margin:7px 0 0;
                            font-size:24px;
                            color:#ffffff;
                        '>

                            Buzón para Sistemas de Tierra

                        </h2>


                        <p style='
                            margin:8px 0 0;
                            font-size:13px;
                            color:#ffffff;
                            opacity:.9;
                        '>

                            Nuevo registro recibido
                            desde el sitio web.

                        </p>


                    </div>


                    <!-- CONTENIDO -->

                    <div style='
                        padding:30px 32px;
                    '>


                        <h3 style='
                            margin-top:0;
                            margin-bottom:18px;
                            color:#102a43;
                            font-size:19px;
                        '>

                            Información del reporte

                        </h3>


                        <table
                            cellpadding='10'
                            cellspacing='0'
                            style='
                                width:100%;
                                border-collapse:collapse;
                                font-size:14px;
                            '
                        >


                            <tr>

                                <td style='
                                    width:180px;
                                    font-weight:bold;
                                    color:#64748b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    Empresa

                                </td>


                                <td style='
                                    color:#1e293b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    {$empresaSeguro}

                                </td>

                            </tr>


                            <tr>

                                <td style='
                                    font-weight:bold;
                                    color:#64748b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    Nombre completo

                                </td>


                                <td style='
                                    color:#1e293b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    {$nombreSeguro}

                                </td>

                            </tr>


                            <tr>

                                <td style='
                                    font-weight:bold;
                                    color:#64748b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    Correo

                                </td>


                                <td style='
                                    color:#1e293b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    {$correoSeguro}

                                </td>

                            </tr>


                            <tr>

                                <td style='
                                    font-weight:bold;
                                    color:#64748b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    Teléfono

                                </td>


                                <td style='
                                    color:#1e293b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    " .
                                    (
                                        $telefonoSeguro !== ''
                                        ? $telefonoSeguro
                                        : 'No proporcionado'
                                    )
                                    . "

                                </td>

                            </tr>


                            <tr>

                                <td style='
                                    font-weight:bold;
                                    color:#64748b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    Fecha de reporte

                                </td>


                                <td style='
                                    color:#1e293b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    {$fechaSegura}

                                </td>

                            </tr>


                            <tr>

                                <td style='
                                    font-weight:bold;
                                    color:#64748b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    No. Reporte

                                </td>


                                <td style='
                                    color:#1e293b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    " .
                                    (
                                        $reporteSeguro !== ''
                                        ? $reporteSeguro
                                        : 'No proporcionado'
                                    )
                                    . "

                                </td>

                            </tr>


                            <tr>

                                <td style='
                                    font-weight:bold;
                                    color:#64748b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    Asunto

                                </td>


                                <td style='
                                    color:#1e293b;
                                    border-bottom:
                                        1px solid #edf1ef;
                                '>

                                    {$asuntoSeguro}

                                </td>

                            </tr>


                        </table>


                        <!-- DESCRIPCIÓN -->

                        <div style='
                            margin-top:27px;
                        '>


                            <div style='
                                margin-bottom:9px;
                                color:#102a43;
                                font-size:14px;
                                font-weight:bold;
                            '>

                                Descripción del reporte

                            </div>


                            <div style='
                                padding:19px;
                                background:#f6faf7;
                                border-left:
                                    4px solid #16a34a;
                                border-radius:8px;
                                color:#334155;
                                line-height:1.7;
                                font-size:14px;
                            '>

                                {$mensajeSeguro}

                            </div>


                        </div>


                        <!-- AVISO -->

                        <div style='
                            margin-top:25px;
                            padding:14px 17px;
                            background:#edf8f1;
                            border-radius:8px;
                            color:#527061;
                            font-size:12px;
                            line-height:1.6;
                        '>

                            Este registro fue generado
                            desde el Buzón para Sistemas
                            de Tierra del sitio web de
                            SEESEL.

                        </div>


                    </div>


                    <!-- FOOTER -->

                    <div style='
                        padding:17px 32px;
                        background:#f3f7f5;
                        border-top:
                            1px solid #e8eeeb;
                        color:#718096;
                        font-size:11px;
                        text-align:center;
                    '>

                        SEESEL · Atención y seguimiento
                        de reportes

                    </div>


                </div>


            </body>

            </html>

            ";


            /* =============================================
               TEXTO PLANO
            ============================================== */

            $mail->AltBody =

                "BUZÓN PARA SISTEMAS DE TIERRA\n\n" .

                "Empresa: {$empresa}\n" .

                "Nombre: {$nombre}\n" .

                "Correo: {$correo}\n" .

                "Teléfono: {$telefono}\n" .

                "Fecha de reporte: {$fecha}\n" .

                "No. Reporte: {$numeroReporte}\n" .

                "Asunto: {$asunto}\n\n" .

                "Descripción:\n{$mensaje}";


            /* =============================================
               ENVIAR
            ============================================== */

            $mail->send();


            /* =============================================
               RESPUESTA CORRECTA
            ============================================== */

            echo json_encode([
                'success' => true,
                'message' =>
                    'Tu reporte fue enviado correctamente. Nuestro equipo dará seguimiento a tu solicitud.'
            ]);

        }


        /* =================================================
           ERROR PHPMAILER
        ================================================== */

        catch (Exception $e) {


            error_log(
                'Error PHPMailer Buzón Sistemas de Tierra: ' .
                $mail->ErrorInfo
            );


            echo json_encode([
                'success' => false,
                'message' =>
                    'No fue posible enviar el reporte. Por favor intenta nuevamente.'
            ]);

        }


        /* =================================================
           ERROR GENERAL PHP
        ================================================== */

        catch (\Throwable $e) {


            error_log(
                'Error PHP Buzón Sistemas de Tierra: ' .
                $e->getMessage()
            );


            echo json_encode([
                'success' => false,
                'message' =>
                    'Ocurrió un error interno al procesar el reporte.'
            ]);

        }


        exit;

    }

}