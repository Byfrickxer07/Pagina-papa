<?php
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    header("Location: index.html");
    exit;
}

require 'src/PHPMailer.php';
require 'src/Exception.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$nombre   = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$email    = $_POST['email'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$asunto   = $_POST['asunto'] ?? '';
$mensaje  = $_POST['mensaje'] ?? '';

if (empty(trim($nombre)))   $nombre = 'anonimo';
if (empty(trim($apellido))) $apellido = '';

$body = <<<HTML
    <p>De: $nombre $apellido / $email</p>
    <p>Telefono:$telefono</p>
    <h2>Mensaje:</h2>
    <p>$mensaje</p>
HTML;

$mailer = new PHPMailer();
//$mailer->SMTPDebug = 2; // Descomenta para ver logs de SMTP en pantalla (solo para pruebas)

$mailer->isSMTP();
$mailer->Host       = 'smtp.gmail.com';
$mailer->SMTPAuth   = true;
$mailer->Username   = 'byfrickxer@gmail.com';
$mailer->Password   = 'wnvw iqky xixh hdht'; // Reemplaza por tu App Password de Gmail
$mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS
$mailer->Port       = 587;

// Si prefieres SSL en vez de TLS (opcional):
// $mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
// $mailer->Port       = 465;

$mailer->CharSet = 'UTF-8';

// Remitente (tu Gmail) y Reply-To (del usuario del formulario)
$mailer->setFrom('byfrickxer@gmail.com', 'NSYSTEM');
$mailer->addReplyTo($email, "$nombre $apellido");

// Destinatario: tu Gmail personal
$mailer->addAddress('byfrickxer@gmail.com', 'Sitio web');

$mailer->Subject = "Mensaje web: $asunto";
$mailer->msgHTML($body);
$mailer->AltBody = strip_tags($body);

try {
    $mailer->send();
    header("Location: contacto.php");
    exit;
} catch (Exception $e) {
    http_response_code(500);
    echo "Error al enviar: {$mailer->ErrorInfo}";
}