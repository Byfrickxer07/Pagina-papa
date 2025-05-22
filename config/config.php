<?php
/**
 * Archivo de configuración para la conexión a la base de datos
 * y otras configuraciones generales del sitio
 */

// Información de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nsystem');

// Configuración de correo electrónico
define('EMAIL_ADMIN', 'info@empresa.com');

// Conexión a la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql) === TRUE) {
    // Seleccionar la base de datos
    $conn->select_db(DB_NAME);
    
    // Crear tabla de contactos si no existe
    $sql_contactos = "CREATE TABLE IF NOT EXISTS contactos (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        apellido VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        telefono VARCHAR(20),
        asunto VARCHAR(200),
        mensaje TEXT NOT NULL,
        fecha DATETIME NOT NULL,
        leido TINYINT(1) DEFAULT 0
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    
    if (!$conn->query($sql_contactos)) {
        echo "Error al crear la tabla contactos: " . $conn->error;
    }
    
    // Crear tabla de noticias si no existe
    $sql_noticias = "CREATE TABLE IF NOT EXISTS noticias (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(200) NOT NULL,
        contenido TEXT NOT NULL,
        imagen VARCHAR(255) NOT NULL,
        fecha DATE NOT NULL,
        autor VARCHAR(100) DEFAULT 'Admin'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    
    if (!$conn->query($sql_noticias)) {
        echo "Error al crear la tabla noticias: " . $conn->error;
    }
    
    // Insertar noticias de ejemplo si la tabla está vacía
    $result = $conn->query("SELECT COUNT(*) as total FROM noticias");
    $row = $result->fetch_assoc();
    
    if ($row['total'] == 0) {
        // Insertar noticias de ejemplo
        $sql_insert_noticias = "INSERT INTO noticias (titulo, contenido, imagen, fecha) VALUES 
        ('Lanzamiento de Nuevo Servicio', '<p>Estamos emocionados de anunciar el lanzamiento de nuestro nuevo servicio que revolucionará el mercado. Este servicio ha sido desarrollado después de meses de investigación y desarrollo para satisfacer las necesidades cambiantes de nuestros clientes.</p><p>Nuestro equipo ha trabajado incansablemente para asegurar que este nuevo servicio cumpla con los más altos estándares de calidad y eficiencia. Estamos seguros de que superará sus expectativas y le proporcionará un valor excepcional.</p><p>Para más información sobre este nuevo servicio, no dude en ponerse en contacto con nuestro equipo de ventas.</p>', 'img/news1.jpg', '2025-05-22'),
        ('Expansión de Operaciones', '<p>Nos complace informar que estamos expandiendo nuestras operaciones a nuevas regiones para servir mejor a nuestros clientes. Esta expansión estratégica nos permitirá llegar a más mercados y ofrecer nuestros servicios a una base de clientes más amplia.</p><p>La expansión incluye la apertura de nuevas oficinas en ubicaciones clave y la contratación de personal adicional para apoyar nuestro crecimiento. Estamos comprometidos a mantener el mismo nivel de excelencia en el servicio que nuestros clientes esperan de nosotros.</p><p>Agradecemos su continuo apoyo y esperamos servirle en estas nuevas regiones.</p>', 'img/news2.jpg', '2025-05-15'),
        ('Reconocimiento del Sector', '<p>Nuestra empresa ha sido reconocida como líder en innovación por la asociación del sector, destacando nuestro compromiso con la excelencia y la calidad. Este reconocimiento es un testimonio del arduo trabajo y la dedicación de nuestro equipo.</p><p>El premio reconoce específicamente nuestras contribuciones a la industria a través de nuestras soluciones innovadoras y nuestro enfoque centrado en el cliente. Estamos honrados de recibir este prestigioso reconocimiento y seguiremos esforzándonos por mantener los más altos estándares en todo lo que hacemos.</p><p>Queremos agradecer a nuestros clientes por su confianza y apoyo, que han sido fundamentales para nuestro éxito.</p>', 'img/news3.jpg', '2025-05-05')";
        
        if (!$conn->multi_query($sql_insert_noticias)) {
            echo "Error al insertar noticias de ejemplo: " . $conn->error;
        }
    }
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Configuración de zona horaria
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Función para limpiar datos de entrada
function limpiarDato($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

// Función para verificar si una página está activa
function paginaActiva($pagina) {
    $ruta_actual = basename($_SERVER['PHP_SELF']);
    if ($ruta_actual == $pagina) {
        return 'active';
    }
    return '';
}
?>
