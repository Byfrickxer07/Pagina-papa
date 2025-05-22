-- Base de datos para la página web empresarial
-- Creado: 22/05/2025

-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS nsystem;
USE nsystem;

-- Tabla de contactos
CREATE TABLE IF NOT EXISTS contactos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    asunto VARCHAR(200),
    mensaje TEXT NOT NULL,
    fecha DATETIME NOT NULL,
    leido TINYINT(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de noticias
CREATE TABLE IF NOT EXISTS noticias (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    contenido TEXT NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    fecha DATE NOT NULL,
    autor VARCHAR(100) DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar noticias de ejemplo
INSERT INTO noticias (titulo, contenido, imagen, fecha) VALUES 
('Lanzamiento de Nuevo Servicio', '<p>Estamos emocionados de anunciar el lanzamiento de nuestro nuevo servicio que revolucionará el mercado. Este servicio ha sido desarrollado después de meses de investigación y desarrollo para satisfacer las necesidades cambiantes de nuestros clientes.</p><p>Nuestro equipo ha trabajado incansablemente para asegurar que este nuevo servicio cumpla con los más altos estándares de calidad y eficiencia. Estamos seguros de que superará sus expectativas y le proporcionará un valor excepcional.</p><p>Para más información sobre este nuevo servicio, no dude en ponerse en contacto con nuestro equipo de ventas.</p>', 'img/news1.jpg', '2025-05-22'),
('Expansión de Operaciones', '<p>Nos complace informar que estamos expandiendo nuestras operaciones a nuevas regiones para servir mejor a nuestros clientes. Esta expansión estratégica nos permitirá llegar a más mercados y ofrecer nuestros servicios a una base de clientes más amplia.</p><p>La expansión incluye la apertura de nuevas oficinas en ubicaciones clave y la contratación de personal adicional para apoyar nuestro crecimiento. Estamos comprometidos a mantener el mismo nivel de excelencia en el servicio que nuestros clientes esperan de nosotros.</p><p>Agradecemos su continuo apoyo y esperamos servirle en estas nuevas regiones.</p>', 'img/news2.jpg', '2025-05-15'),
('Reconocimiento del Sector', '<p>Nuestra empresa ha sido reconocida como líder en innovación por la asociación del sector, destacando nuestro compromiso con la excelencia y la calidad. Este reconocimiento es un testimonio del arduo trabajo y la dedicación de nuestro equipo.</p><p>El premio reconoce específicamente nuestras contribuciones a la industria a través de nuestras soluciones innovadoras y nuestro enfoque centrado en el cliente. Estamos honrados de recibir este prestigioso reconocimiento y seguiremos esforzándonos por mantener los más altos estándares en todo lo que hacemos.</p><p>Queremos agradecer a nuestros clientes por su confianza y apoyo, que han sido fundamentales para nuestro éxito.</p>', 'img/news3.jpg', '2025-05-05');
