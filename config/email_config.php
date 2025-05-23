<?php
/**
 * Configuración para el envío de correos electrónicos
 */

// Configuración del servidor SMTP para Gmail
define('SMTP_HOST', 'smtp.gmail.com');  // Servidor SMTP de Gmail
define('SMTP_PORT', 587);               // Puerto para TLS
define('SMTP_SECURE', 'tls');           // Usar TLS
define('SMTP_AUTH', true);              // Requiere autenticación

// IMPORTANTE: Para usar Gmail, necesitas una "Contraseña de aplicación"
// Sigue estos pasos para crear una:
// 1. Ve a tu cuenta de Google -> Seguridad
// 2. Activa la verificación en dos pasos si no está activada
// 3. Busca "Contraseñas de aplicación" y crea una nueva para "Otra aplicación personalizada"
// 4. Copia la contraseña generada y pégala abajo

define('SMTP_USERNAME', 'byfrickxer@gmail.com'); // Tu dirección de Gmail
define('SMTP_PASSWORD', 'xpms qunr uoza tggw'); // La contraseña de aplicación generada

// Configuración de correo para el formulario de contacto
define('MAIL_FROM', 'byfrickxer@gmail.com');     // Debe ser la misma que SMTP_USERNAME para Gmail
define('MAIL_FROM_NAME', 'NSYSTEM Contacto');    // Nombre que aparecerá como remitente
define('MAIL_REPLY_TO', 'byfrickxer@gmail.com'); // Dirección de respuesta

// Configuración de notificaciones
define('NOTIFY_NEW_CONTACT', true);              // Enviar notificación por correo para nuevos contactos
