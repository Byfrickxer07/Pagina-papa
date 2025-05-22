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
('Lanzamiento de Inteligencia Artificial Avanzada', '<p>Hemos desarrollado una nueva plataforma de IA que revoluciona el análisis de datos empresariales. Esta tecnología permite a las empresas automatizar procesos complejos y obtener insights valiosos a partir de grandes volúmenes de información.</p><p>Nuestra plataforma de IA utiliza algoritmos de aprendizaje profundo para identificar patrones y tendencias que serían imposibles de detectar con métodos tradicionales. Esto permite a las empresas tomar decisiones más informadas y estratégicas.</p><p>La solución ya ha sido implementada con éxito en varias empresas líderes del sector, mejorando su eficiencia operativa en más de un 40% y reduciendo costos significativamente.</p>', 'img/news1.jpg', '2025-05-25'),
('Nueva Tecnología de Realidad Aumentada', '<p>Presentamos nuestra innovadora solución de Realidad Aumentada para el sector industrial. Esta tecnología permite a los técnicos visualizar componentes internos de maquinaria compleja en tiempo real, reduciendo los tiempos de mantenimiento y mejorando la precisión.</p><p>Utilizando gafas de RA especializadas, los técnicos pueden ver instrucciones superpuestas directamente sobre el equipo, acceder a manuales digitales y recibir asistencia remota de expertos. Esto ha demostrado reducir los errores en un 85% y aumentar la productividad en un 35%.</p><p>La tecnología también incluye capacidades de documentación automática, permitiendo registrar todo el proceso de mantenimiento para análisis posteriores y mejora continua.</p>', 'img/news2.jpg', '2025-05-15'),
('Avances en Ciberseguridad', '<p>Hemos desarrollado un nuevo sistema de protección contra amenazas cibernéticas que utiliza algoritmos de aprendizaje automático para detectar patrones de ataques desconocidos. Esta solución proporciona una capa adicional de seguridad para infraestructuras críticas.</p><p>Nuestro sistema analiza continuamente el tráfico de red, identificando comportamientos anómalos que podrían indicar un ataque, incluso si no coincide con firmas de malware conocidas. Esto permite detectar y neutralizar amenazas de día cero antes de que puedan causar daños.</p><p>Además, la solución incluye capacidades de respuesta automatizada que pueden aislar sistemas comprometidos, bloquear direcciones IP maliciosas y alertar al personal de seguridad, todo en cuestión de segundos.</p>', 'img/news3.jpg', '2025-05-05');
