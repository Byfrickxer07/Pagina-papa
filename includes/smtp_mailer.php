<?php
/**
 * Clase para enviar correos electrónicos a través de SMTP
 * Implementación simplificada para entornos de desarrollo
 */

class SMTPMailer {
    private $host;
    private $port;
    private $username;
    private $password;
    private $from_email;
    private $from_name;
    private $debug = false;
    
    /**
     * Constructor
     */
    public function __construct($host, $port, $username, $password, $from_email, $from_name) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->from_email = $from_email;
        $this->from_name = $from_name;
    }
    
    /**
     * Habilitar o deshabilitar el modo de depuración
     * (Desactivado para evitar mostrar información sensible)
     */
    public function setDebug($debug) {
        // Modo de depuración desactivado permanentemente
        $this->debug = false;
    }
    
    /**
     * Enviar un correo electrónico usando SMTP directo
     */
    public function send($to, $subject, $message, $reply_to = '') {
        // Desactivado el registro y la salida de depuración
        
        // Intentar enviar el correo usando socket directo a SMTP
        try {
            // Abrir conexión al servidor SMTP
            // Desactivada la salida de depuración
            $smtp_conn = fsockopen($this->host, $this->port, $errno, $errstr, 30);
            
            if (!$smtp_conn) {
                throw new Exception("No se pudo conectar al servidor SMTP: $errstr ($errno)");
            }
            
            // Leer respuesta inicial del servidor
            $this->getResponse($smtp_conn);
            
            // Enviar comando EHLO
            fputs($smtp_conn, "EHLO " . $_SERVER['SERVER_NAME'] . "\r\n");
            $this->getResponse($smtp_conn);
            
            // Iniciar TLS
            fputs($smtp_conn, "STARTTLS\r\n");
            $this->getResponse($smtp_conn);
            
            // Actualizar la conexión para usar TLS
            stream_socket_enable_crypto($smtp_conn, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            
            // Enviar EHLO nuevamente después de TLS
            fputs($smtp_conn, "EHLO " . $_SERVER['SERVER_NAME'] . "\r\n");
            $this->getResponse($smtp_conn);
            
            // Autenticación
            fputs($smtp_conn, "AUTH LOGIN\r\n");
            $this->getResponse($smtp_conn);
            
            fputs($smtp_conn, base64_encode($this->username) . "\r\n");
            $this->getResponse($smtp_conn);
            
            fputs($smtp_conn, base64_encode($this->password) . "\r\n");
            $this->getResponse($smtp_conn);
            
            // Establecer remitente
            fputs($smtp_conn, "MAIL FROM:<{$this->from_email}>\r\n");
            $this->getResponse($smtp_conn);
            
            // Establecer destinatario
            fputs($smtp_conn, "RCPT TO:<{$to}>\r\n");
            $this->getResponse($smtp_conn);
            
            // Iniciar datos
            fputs($smtp_conn, "DATA\r\n");
            $this->getResponse($smtp_conn);
            
            // Preparar cabeceras y cuerpo del mensaje
            $headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
            $headers .= "To: {$to}\r\n";
            $headers .= "Subject: {$subject}\r\n";
            if ($reply_to) {
                $headers .= "Reply-To: {$reply_to}\r\n";
            }
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "\r\n";
            
            // Enviar mensaje
            fputs($smtp_conn, $headers . $message . "\r\n.\r\n");
            $this->getResponse($smtp_conn);
            
            // Finalizar sesión
            fputs($smtp_conn, "QUIT\r\n");
            $this->getResponse($smtp_conn);
            
            // Cerrar conexión
            fclose($smtp_conn);
            
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    
    /**
     * Obtener y procesar respuesta del servidor SMTP
     */
    private function getResponse($conn) {
        $response = '';
        while ($line = fgets($conn, 515)) {
            $response .= $line;
            if (substr($line, 3, 1) == ' ') {
                break;
            }
        }
        
        // Desactivada la salida de depuración
        
        $code = substr($response, 0, 3);
        if ($code < 200 || $code >= 400) {
            throw new Exception("Error SMTP: " . trim($response));
        }
        
        return $response;
    }
    
    /**
     * Registrar un mensaje en el log
     */
    private function log($message) {
        // Desactivado el logging detallado de SMTP
        if ($this->debug) {
            echo date('Y-m-d H:i:s') . " - " . $message . "\n";
        }
    }
    
    // La función logEmail ha sido eliminada para evitar guardar información de los correos
    
    // La función createPreviewEmail ha sido eliminada para evitar guardar copias de los correos
}
