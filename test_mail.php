<?php
// Script de prueba para envío de correo
require_once 'config/email_config.php';
require_once 'includes/smtp_mailer.php';

// Habilitar visualización de errores
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "<h1>Prueba de envío de correo</h1>";

// Crear instancia del mailer
$mailer = new SMTPMailer(
    SMTP_HOST,
    SMTP_PORT,
    SMTP_USERNAME,
    SMTP_PASSWORD,
    MAIL_FROM,
    MAIL_FROM_NAME
);

// Modo de depuración desactivado para evitar mostrar información sensible

// Destinatario (tu propio correo para la prueba)
$to = MAIL_REPLY_TO;

// Contenido del correo
$subject = "Prueba de envío desde XAMPP - " . date('Y-m-d H:i:s');
$message = "
<html>
<head>
    <title>Correo de prueba</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        h1 { color: #FF6600; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>¡Prueba exitosa!</h1>
        <p>Este es un correo de prueba enviado desde tu entorno local XAMPP.</p>
        <p>Fecha y hora: " . date('d/m/Y H:i:s') . "</p>
    </div>
</body>
</html>
";

echo "<p>Intentando enviar correo a: $to</p>";

// Intentar enviar el correo
try {
    $result = $mailer->send($to, $subject, $message);
    
    if ($result) {
        echo "<p style='color:green;'>¡Correo enviado correctamente!</p>";
        echo "<p>Verifica tu bandeja de entrada (y la carpeta de spam) para confirmar la recepción.</p>";
    } else {
        echo "<p style='color:red;'>Error al enviar el correo. Revisa los logs para más detalles.</p>";
    }
} catch (Exception $e) {
    echo "<p style='color:red;'>Excepción: " . $e->getMessage() . "</p>";
}

// Mostrar logs
echo "<h2>Logs de envío</h2>";
echo "<pre>";
if (file_exists('logs/mail_log.txt')) {
    echo htmlspecialchars(file_get_contents('logs/mail_log.txt'));
} else {
    echo "No hay logs disponibles.";
}
echo "</pre>";

// No se guardan vistas previas de los correos
echo "<h2>Envío de correo completado</h2>";
echo "<p>El sistema está configurado para no guardar copias de los correos enviados.</p>";
?>
