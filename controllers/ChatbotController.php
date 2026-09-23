<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

header('Content-Type: application/json; charset=utf-8');

/*
|--------------------------------------------------------------------------
| Respuesta JSON
|--------------------------------------------------------------------------
*/

function responderJson(
    bool $success,
    string $message,
    int $statusCode = 200
): never {
    http_response_code($statusCode);

    echo json_encode(
        [
            'success' => $success,
            'message' => $message
        ],
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

/*
|--------------------------------------------------------------------------
| Rutas
|--------------------------------------------------------------------------
*/

$rutaRaiz = dirname(__DIR__);

$rutaAutoload = $rutaRaiz . '/vendor/autoload.php';
$rutaConfiguracion = $rutaRaiz . '/config/chatbot_mail.php';

/*
|--------------------------------------------------------------------------
| Comprobar PHPMailer
|--------------------------------------------------------------------------
*/

if (!file_exists($rutaAutoload)) {
    responderJson(
        false,
        'PHPMailer no está instalado correctamente.',
        500
    );
}

require_once $rutaAutoload;

/*
|--------------------------------------------------------------------------
| Comprobar configuración
|--------------------------------------------------------------------------
*/

if (!file_exists($rutaConfiguracion)) {
    responderJson(
        false,
        'No se encontró la configuración del correo.',
        500
    );
}

$config = require $rutaConfiguracion;

if (!is_array($config)) {
    responderJson(
        false,
        'La configuración del correo no es válida.',
        500
    );
}

/*
|--------------------------------------------------------------------------
| Validar método HTTP
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    responderJson(
        false,
        'Método no permitido.',
        405
    );
}

/*
|--------------------------------------------------------------------------
| Obtener y limpiar datos
|--------------------------------------------------------------------------
*/

$servicio = trim((string) ($_POST['servicio'] ?? ''));
$tipoSolicitud = trim(
    (string) ($_POST['tipoSolicitud'] ?? '')
);
$nombre = trim((string) ($_POST['nombre'] ?? ''));
$empresa = trim((string) ($_POST['empresa'] ?? ''));
$telefono = trim((string) ($_POST['telefono'] ?? ''));
$correo = trim((string) ($_POST['correo'] ?? ''));
$descripcion = trim((string) ($_POST['descripcion'] ?? ''));

/*
|--------------------------------------------------------------------------
| Validaciones
|--------------------------------------------------------------------------
*/

if (
    $servicio === '' ||
    $tipoSolicitud === '' ||
    $nombre === '' ||
    $telefono === '' ||
    $descripcion === ''
) {
    responderJson(
        false,
        'Completa el nombre, teléfono y descripción de la solicitud.',
        422
    );
}

// El correo y la empresa son opcionales en el flujo rápido.
if ($correo !== '' && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    responderJson(
        false,
        'El correo electrónico no es válido.',
        422
    );
}

if (mb_strlen($nombre) > 120) {
    responderJson(
        false,
        'El nombre es demasiado largo.',
        422
    );
}

if (mb_strlen($empresa) > 150) {
    responderJson(
        false,
        'El nombre de la empresa es demasiado largo.',
        422
    );
}

if (mb_strlen($telefono) > 30) {
    responderJson(
        false,
        'El teléfono no es válido.',
        422
    );
}

if (mb_strlen($descripcion) > 2000) {
    responderJson(
        false,
        'La descripción supera el límite permitido.',
        422
    );
}

/*
|--------------------------------------------------------------------------
| Validar datos de configuración
|--------------------------------------------------------------------------
*/

$camposConfiguracion = [
    'host',
    'port',
    'encryption',
    'username',
    'password',
    'from_email',
    'from_name',
    'to_email',
    'to_name',
    'cc'
];

foreach ($camposConfiguracion as $campo) {
    if (!array_key_exists($campo, $config)) {
        responderJson(
            false,
            'La configuración del correo está incompleta.',
            500
        );
    }
}

if (
    !filter_var($config['username'], FILTER_VALIDATE_EMAIL) ||
    !filter_var($config['from_email'], FILTER_VALIDATE_EMAIL) ||
    !filter_var($config['to_email'], FILTER_VALIDATE_EMAIL)
) {
    responderJson(
        false,
        'Los correos configurados no son válidos.',
        500
    );
}

/*
|--------------------------------------------------------------------------
| Escapar contenido para HTML
|--------------------------------------------------------------------------
*/

$servicioHtml = htmlspecialchars(
    $servicio,
    ENT_QUOTES,
    'UTF-8'
);

$tipoSolicitudHtml = htmlspecialchars(
    $tipoSolicitud,
    ENT_QUOTES,
    'UTF-8'
);

$nombreHtml = htmlspecialchars(
    $nombre,
    ENT_QUOTES,
    'UTF-8'
);

$empresaHtml = htmlspecialchars(
    $empresa,
    ENT_QUOTES,
    'UTF-8'
);

$telefonoHtml = htmlspecialchars(
    $telefono,
    ENT_QUOTES,
    'UTF-8'
);

$correoHtml = htmlspecialchars(
    $correo,
    ENT_QUOTES,
    'UTF-8'
);

if ($empresaHtml === '') {
    $empresaHtml = 'No proporcionada';
}

if ($correoHtml === '') {
    $correoHtml = 'No proporcionado';
}

$descripcionHtml = nl2br(
    htmlspecialchars(
        $descripcion,
        ENT_QUOTES,
        'UTF-8'
    )
);

/*
|--------------------------------------------------------------------------
| Crear contenido del correo
|--------------------------------------------------------------------------
*/

$asunto = 'Nueva solicitud desde el chatbot SEESEL';

$cuerpoHtml = <<<HTML
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{$asunto}</title>
</head>

<body style="
    margin: 0;
    padding: 30px 15px;
    background-color: #f1f5f3;
    font-family: Arial, Helvetica, sans-serif;
    color: #243247;
">

    <div style="
        max-width: 680px;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.10);
    ">

        <div style="
            padding: 28px 32px;
            background-color: #08733f;
            color: #ffffff;
        ">
            <h1 style="
                margin: 0;
                font-size: 25px;
                line-height: 1.3;
            ">
                Nueva solicitud SEESEL
            </h1>

            <p style="
                margin: 8px 0 0;
                font-size: 14px;
                opacity: 0.9;
            ">
                Solicitud recibida desde el chatbot del sitio web
            </p>
        </div>

        <div style="padding: 32px;">

            <p style="
                margin: 0 0 22px;
                font-size: 16px;
                line-height: 1.6;
            ">
                Se recibió una nueva solicitud de información.
                Los datos proporcionados por el cliente son:
            </p>

            <table style="
                width: 100%;
                border-collapse: collapse;
                font-size: 15px;
            ">

                <tr>
                    <td style="
                        width: 38%;
                        padding: 13px;
                        background-color: #edf8f2;
                        border-bottom: 1px solid #dcece3;
                    ">
                        <strong>Servicio</strong>
                    </td>

                    <td style="
                        padding: 13px;
                        background-color: #edf8f2;
                        border-bottom: 1px solid #dcece3;
                    ">
                        {$servicioHtml}
                    </td>
                </tr>

                <tr>
                    <td style="
                        padding: 13px;
                        border-bottom: 1px solid #e8ecea;
                    ">
                        <strong>Tipo de solicitud</strong>
                    </td>

                    <td style="
                        padding: 13px;
                        border-bottom: 1px solid #e8ecea;
                    ">
                        {$tipoSolicitudHtml}
                    </td>
                </tr>



                <tr>
                    <td style="
                        padding: 13px;
                        border-bottom: 1px solid #e8ecea;
                    ">
                        <strong>Nombre</strong>
                    </td>

                    <td style="
                        padding: 13px;
                        border-bottom: 1px solid #e8ecea;
                    ">
                        {$nombreHtml}
                    </td>
                </tr>

                <tr>
                    <td style="
                        padding: 13px;
                        background-color: #edf8f2;
                        border-bottom: 1px solid #dcece3;
                    ">
                        <strong>Empresa</strong>
                    </td>

                    <td style="
                        padding: 13px;
                        background-color: #edf8f2;
                        border-bottom: 1px solid #dcece3;
                    ">
                        {$empresaHtml}
                    </td>
                </tr>

                <tr>
                    <td style="
                        padding: 13px;
                        border-bottom: 1px solid #e8ecea;
                    ">
                        <strong>Teléfono</strong>
                    </td>

                    <td style="
                        padding: 13px;
                        border-bottom: 1px solid #e8ecea;
                    ">
                        {$telefonoHtml}
                    </td>
                </tr>

                <tr>
                    <td style="
                        padding: 13px;
                        background-color: #edf8f2;
                        border-bottom: 1px solid #dcece3;
                    ">
                        <strong>Correo</strong>
                    </td>

                    <td style="
                        padding: 13px;
                        background-color: #edf8f2;
                        border-bottom: 1px solid #dcece3;
                    ">
                        {$correoHtml}
                    </td>
                </tr>

            </table>

            <div style="
                margin-top: 25px;
                padding: 20px;
                background-color: #f7faf8;
                border-left: 5px solid #16a34a;
                border-radius: 10px;
            ">
                <p style="
                    margin: 0 0 10px;
                    font-weight: bold;
                ">
                    Descripción de la solicitud
                </p>

                <p style="
                    margin: 0;
                    line-height: 1.7;
                ">
                    {$descripcionHtml}
                </p>
            </div>

            <p style="
                margin: 26px 0 0;
                color: #607068;
                font-size: 13px;
                line-height: 1.6;
            ">
                Para responder al cliente, utiliza la opción
                “Responder” de tu correo. La respuesta será dirigida
                automáticamente al correo proporcionado por el usuario.
            </p>

        </div>

        <div style="
            padding: 19px 30px;
            background-color: #07572f;
            color: #ffffff;
            text-align: center;
            font-size: 12px;
        ">
            Servicios Especiales Eléctricos · SEESEL
        </div>

    </div>

</body>
</html>
HTML;

$cuerpoTexto = <<<TEXT
NUEVA SOLICITUD DESDE EL CHATBOT SEESEL

Servicio:
{$servicio}

Tipo de solicitud:
{$tipoSolicitud}

Nombre:
{$nombre}

Empresa:
{$empresa}

Teléfono:
{$telefono}

Correo:
{$correo}

Descripción:
{$descripcion}
TEXT;

/*
|--------------------------------------------------------------------------
| Configurar PHPMailer
|--------------------------------------------------------------------------
*/

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();

    $mail->Host = (string) $config['host'];
    $mail->SMTPAuth = true;

    $mail->Username = (string) $config['username'];
    $mail->Password = (string) $config['password'];

    $mail->Port = (int) $config['port'];

    if ($config['encryption'] === 'tls') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    } elseif ($config['encryption'] === 'ssl') {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    }

    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    /*
    |--------------------------------------------------------------------------
    | Remitente
    |--------------------------------------------------------------------------
    */

    $mail->setFrom(
        (string) $config['from_email'],
        (string) $config['from_name']
    );

    /*
    |--------------------------------------------------------------------------
    | Destinatario principal
    |--------------------------------------------------------------------------
    */

    $mail->addAddress(
        (string) $config['to_email'],
        (string) $config['to_name']
    );

    /*
    |--------------------------------------------------------------------------
    | Copias
    |--------------------------------------------------------------------------
    */

    foreach ($config['cc'] as $copia) {
        $correoCopia = trim(
            (string) ($copia['email'] ?? '')
        );

        $nombreCopia = trim(
            (string) ($copia['name'] ?? '')
        );

        if (
            $correoCopia !== '' &&
            filter_var($correoCopia, FILTER_VALIDATE_EMAIL)
        ) {
            $mail->addCC(
                $correoCopia,
                $nombreCopia
            );
        }
    }
/*
|--------------------------------------------------------------------------
| Responder al cliente
|--------------------------------------------------------------------------
*/

if (
    $correo !== '' &&
    filter_var($correo, FILTER_VALIDATE_EMAIL)
) {
    $mail->addReplyTo(
        $correo,
        $nombre
    );
}

    /*
    |--------------------------------------------------------------------------
    | Contenido
    |--------------------------------------------------------------------------
    */

    $mail->isHTML(true);

    $mail->Subject = $asunto;
    $mail->Body = $cuerpoHtml;
    $mail->AltBody = $cuerpoTexto;

    /*
    |--------------------------------------------------------------------------
    | Enviar
    |--------------------------------------------------------------------------
    */

    $mail->send();

    responderJson(
        true,
        'La solicitud fue enviada correctamente.'
    );

}  catch (Exception $exception) {

    $detalleError = $mail->ErrorInfo !== ''
        ? $mail->ErrorInfo
        : $exception->getMessage();

    error_log(
        'Error SMTP del chatbot SEESEL: ' .
        $detalleError
    );

    responderJson(
        false,
        'Error al enviar: ' . $detalleError,
        500
    );
}