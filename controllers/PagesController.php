<?php

class PagesController
{
  // ✅ Página por defecto para /index.php?c=pages
  // Se usa cuando el router hace $pages->index()
  public function index()
  {
    require_once 'views/layout/header.php';
    require_once 'views/pages/inicio.php'; // tu home existe en views/home/index.php
    require_once 'views/layout/footer.php';
  }

  public function nosotros()
  {
    require_once 'views/layout/header.php';
    require_once 'views/pages/nosotros.php';
    require_once 'views/layout/footer.php';
  }

  // ✅ Esto te faltaba para: index.php?c=pages&a=servicios
  public function servicios()
  {
    require_once 'views/layout/header.php';
    require_once 'views/pages/servicios.php';
    require_once 'views/layout/footer.php';
  }

  public function contacto()
  {
    require_once 'views/layout/header.php';
    require_once 'views/pages/contacto.php';
    require_once 'views/layout/footer.php';
  }

  public function proyectos()
{
  require_once 'views/layout/header.php';
  require_once 'views/pages/proyectos.php';
  require_once 'views/layout/footer.php';
}

public function capacitaciones()
{
    require_once 'views/layout/header.php';
    require_once 'views/pages/capacitaciones.php';
    require_once 'views/layout/footer.php';
}

  // ✅ Acción que recibe el POST del formulario y responde JSON
  public function contacto_enviar()
  {
    header('Content-Type: application/json; charset=utf-8');

    $respond = function ($ok, $message, $status = 200) {
      http_response_code($status);
      echo json_encode(['ok' => $ok, 'message' => $message]);
      exit;
    };

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $respond(false, 'Método no permitido.', 405);
    }

    session_start();

    // Rate limit simple por IP (30s)
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $now = time();
    if (!isset($_SESSION['last_contact'])) $_SESSION['last_contact'] = [];
    $last = $_SESSION['last_contact'][$ip] ?? 0;

    if (($now - $last) < 30) {
      $respond(false, 'Espera unos segundos antes de enviar de nuevo.', 429);
    }
    $_SESSION['last_contact'][$ip] = $now;

    // Honeypot
    if (!empty($_POST['website'] ?? '')) {
      $respond(false, 'Solicitud inválida.', 400);
    }

    // Sanitizar / validar
    $email    = trim($_POST['email'] ?? '');
    $nombre   = trim($_POST['nombre'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $mensaje  = trim($_POST['mensaje'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $respond(false, 'Correo inválido.', 400);
    if (mb_strlen($nombre) < 2) $respond(false, 'Nombre inválido.', 400);
    if (!preg_match('/^[0-9+()\s-]{7,20}$/', $telefono)) $respond(false, 'Teléfono inválido.', 400);
    if (mb_strlen($mensaje) < 10) $respond(false, 'Mensaje muy corto.', 400);

    // Envío (mail) — en localhost puede fallar por SMTP
    $to = 'contacto@seesel.com';
    $subject = "Nuevo contacto SEESEL - " . $nombre;

    $body =
      "Nuevo mensaje desde el sitio SEESEL\n\n" .
      "Nombre: $nombre\n" .
      "Email: $email\n" .
      "Teléfono: $telefono\n\n" .
      "Mensaje:\n$mensaje\n";

    $headers = [];
    $headers[] = "From: SEESEL Web <no-reply@seesel.com>";
    $headers[] = "Reply-To: $nombre <$email>";
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-Type: text/plain; charset=UTF-8";

    $sent = mail($to, $subject, $body, implode("\r\n", $headers));

    if ($sent) {
      $respond(true, '¡Gracias! Tu mensaje fue enviado correctamente.');
    } else {
      $respond(false, 'No se pudo enviar el correo. En localhost necesitas SMTP o PHPMailer.', 500);
    }
  }
}