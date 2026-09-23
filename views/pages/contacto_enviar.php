<?php
header('Content-Type: application/json; charset=utf-8');

function respond($ok, $message, $status = 200, $extra = []) {
  http_response_code($status);
  echo json_encode(array_merge(['ok' => $ok, 'message' => $message], $extra));
  exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  respond(false, 'Método no permitido.', 405);
}

session_start();

// Rate limit simple por IP (30s)
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$now = time();
if (!isset($_SESSION['last_contact'])) $_SESSION['last_contact'] = [];
$last = $_SESSION['last_contact'][$ip] ?? 0;

if (($now - $last) < 30) {
  respond(false, 'Espera unos segundos antes de enviar de nuevo.', 429);
}
$_SESSION['last_contact'][$ip] = $now;

// Honeypot anti-spam
if (!empty($_POST['website'] ?? '')) {
  respond(false, 'Solicitud inválida.', 400);
}

// Sanitizar / validar
$email    = trim($_POST['email'] ?? '');
$nombre   = trim($_POST['nombre'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$mensaje  = trim($_POST['mensaje'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) respond(false, 'Correo inválido.', 400);
if (mb_strlen($nombre) < 2) respond(false, 'Nombre inválido.', 400);
if (!preg_match('/^[0-9+()\s-]{7,20}$/', $telefono)) respond(false, 'Teléfono inválido.', 400);
if (mb_strlen($mensaje) < 10) respond(false, 'Mensaje muy corto.', 400);

// Config
$to = 'contacto@seesel.com'; // destino real (ajústalo)
$subject = "Nuevo contacto SEESEL - " . $nombre;

$body =
"Nuevo mensaje desde el sitio SEESEL\n\n" .
"Nombre: $nombre\n" .
"Email: $email\n" .
"Teléfono: $telefono\n\n" .
"Mensaje:\n$mensaje\n";

// IMPORTANTE:
// En muchos servidores, el From debe ser un correo del mismo dominio.
// Si aún no tienes correo real, deja no-reply@seesel.com pero en hosting real ajústalo.
$fromEmail = 'no-reply@seesel.com';
$fromName  = 'SEESEL Web';

$headers = [];
$headers[] = "From: $fromName <$fromEmail>";
$headers[] = "Reply-To: $nombre <$email>";
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-Type: text/plain; charset=UTF-8";

// Intenta enviar
$sent = mail($to, $subject, $body, implode("\r\n", $headers));

if ($sent) {
  respond(true, '¡Gracias! Tu mensaje fue enviado correctamente.');
} else {
  // En localhost casi siempre es SMTP faltante
  respond(false, 'No se pudo enviar el correo. En localhost necesitas configurar SMTP o usar PHPMailer.', 500, [
    'hint' => 'Si estás en XAMPP/Laragon/WAMP, mail() suele fallar sin SMTP.'
  ]);
}