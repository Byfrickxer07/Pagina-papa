<?php
/**
 * Funciones de ayuda para el envío de correos electrónicos
 */

// Incluir configuración de correo y clase mailer
require_once __DIR__ . '/../config/email_config.php';
require_once __DIR__ . '/smtp_mailer.php';

/**
 * Envía un correo electrónico utilizando la clase SMTPMailer
 * 
 * @param string $to Dirección de correo del destinatario
 * @param string $subject Asunto del correo
 * @param string $message Cuerpo del mensaje (HTML)
 * @param string $from_email Correo del remitente (opcional)
 * @param string $from_name Nombre del remitente (opcional)
 * @param array $attachments Archivos adjuntos (opcional)
 * @return bool True si se envió correctamente, False en caso contrario
 */
function send_email($to, $subject, $message, $from_email = '', $from_name = '', $attachments = []) {
    // Usar valores predeterminados si no se proporcionan
    $from_email = $from_email ?: MAIL_FROM;
    $from_name = $from_name ?: MAIL_FROM_NAME;
    
    // Asegurarse de que exista el directorio de logs
    ensure_log_directory();
    
    // Se ha desactivado el registro detallado de correos
    
    // Crear instancia del mailer con la configuración de SMTP
    $mailer = new SMTPMailer(
        SMTP_HOST,
        SMTP_PORT,
        SMTP_USERNAME,
        SMTP_PASSWORD,
        $from_email,
        $from_name
    );
    
    // Modo de depuración desactivado para evitar mostrar información sensible
    
    // Enviar el correo
    $success = $mailer->send($to, $subject, $message, MAIL_REPLY_TO);
    
    // Se ha desactivado el registro del resultado del envío
    
    return $success;
}

/**
 * Envía una notificación de nuevo contacto al administrador
 * 
 * @param array $contact_data Datos del contacto
 * @return bool True si se envió correctamente, False en caso contrario
 */
function send_contact_notification($contact_data) {
    // Si las notificaciones están desactivadas, retornar falso
    if (!NOTIFY_NEW_CONTACT) {
        return false;
    }
    
    // Preparar los datos
    $id = $contact_data['id'] ?? 'N/A';
    $nombre = $contact_data['nombre'] ?? '';
    $apellido = $contact_data['apellido'] ?? '';
    $email = $contact_data['email'] ?? '';
    $telefono = $contact_data['telefono'] ?? 'No proporcionado';
    $asunto = $contact_data['asunto'] ?? 'Sin asunto';
    $mensaje = $contact_data['mensaje'] ?? '';
    $fecha = $contact_data['fecha'] ?? date('Y-m-d H:i:s');
    
    // Crear el asunto del correo
    $subject = "Nuevo mensaje de contacto #$id: $asunto";
    
    // Crear el cuerpo del mensaje HTML
    $html_message = "
    <html>
    <head>
        <title>Nuevo mensaje de contacto</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
            h2 { color: #FF6600; }
            .info { margin-bottom: 20px; }
            .label { font-weight: bold; }
            .message-box { background-color: #f9f9f9; padding: 15px; border-radius: 5px; margin-top: 15px; }
            .footer { margin-top: 30px; font-size: 12px; color: #777; }
        </style>
    </head>
    <body>
        <div class='container'>
            <h2>Nuevo mensaje de contacto #$id</h2>
            
            <div class='info'>
                <p><span class='label'>Nombre:</span> $nombre $apellido</p>
                <p><span class='label'>Email:</span> <a href='mailto:$email'>$email</a></p>
                <p><span class='label'>Teléfono:</span> $telefono</p>
                <p><span class='label'>Asunto:</span> $asunto</p>
                <p><span class='label'>Fecha:</span> $fecha</p>
            </div>
            
            <div class='message-box'>
                <p><span class='label'>Mensaje:</span></p>
                <p>" . nl2br(htmlspecialchars($mensaje)) . "</p>
            </div>
            
            <div class='footer'>
                <p>Este es un mensaje automático del sistema de contacto de NSYSTEM.</p>
                <p>Para responder directamente a este contacto, simplemente responda a este correo.</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Enviar la notificación
    return send_email(EMAIL_ADMIN, $subject, $html_message, $email, "$nombre $apellido");
}

/**
 * Crea el directorio de logs si no existe
 */
function ensure_log_directory() {
    $log_dir = __DIR__ . '/../logs';
    if (!file_exists($log_dir)) {
        mkdir($log_dir, 0755, true);
    }
}

// Asegurarse de que exista el directorio de logs
ensure_log_directory();
