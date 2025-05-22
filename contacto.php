<?php
// Incluir archivo de configuración
require_once 'config/config.php';

$mensaje = '';
$error = '';

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar los campos del formulario
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);
    $asunto = trim($_POST['asunto']);
    $mensaje_texto = trim($_POST['mensaje']);
    
    // Validación básica
    if (empty($nombre) || empty($apellido) || empty($email) || empty($mensaje_texto)) {
        $error = "Por favor, complete todos los campos obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Por favor, ingrese un correo electrónico válido.";
    } else {
        // Insertar en la base de datos
        $sql = "INSERT INTO contactos (nombre, apellido, email, telefono, asunto, mensaje, fecha) 
                VALUES (?, ?, ?, ?, ?, ?, NOW())";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $nombre, $apellido, $email, $telefono, $asunto, $mensaje_texto);
        
        if ($stmt->execute()) {
            $contacto_id = $stmt->insert_id;
            
            // Enviar correo electrónico
            $para = "info@empresa.com"; // Cambiar por el correo de la empresa
            $asunto_email = "Nuevo mensaje de contacto #$contacto_id: $asunto";
            
            $mensaje_email = "
            <html>
            <head>
                <title>Nuevo mensaje de contacto</title>
            </head>
            <body>
                <h2>Nuevo mensaje de contacto #$contacto_id</h2>
                <p><strong>Nombre:</strong> $nombre $apellido</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Teléfono:</strong> $telefono</p>
                <p><strong>Asunto:</strong> $asunto</p>
                <p><strong>Mensaje:</strong><br>$mensaje_texto</p>
                <p><strong>Fecha:</strong> " . date('d/m/Y H:i:s') . "</p>
            </body>
            </html>
            ";
            
            // Cabeceras para el correo HTML
            $cabeceras = "MIME-Version: 1.0" . "\r\n";
            $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $cabeceras .= "From: $email" . "\r\n";
            
            // Enviar el correo
            if (mail($para, $asunto_email, $mensaje_email, $cabeceras)) {
                $mensaje = "¡Gracias por contactarnos! Tu mensaje ha sido enviado correctamente. Nos pondremos en contacto contigo pronto.";
                
                // Limpiar los campos del formulario después del envío exitoso
                $nombre = $apellido = $email = $telefono = $asunto = $mensaje_texto = "";
            } else {
                $error = "Hubo un problema al enviar el correo. Por favor, inténtelo de nuevo más tarde.";
            }
        } else {
            $error = "Error al guardar el mensaje: " . $conn->error;
        }
        
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa - Contacto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span class="text-orange">EMPRESA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="page-header bg-dark text-white py-5 text-center">
        <div class="container">
            <h1 class="display-4">Contacto</h1>
            <p class="lead">Estamos aquí para ayudarte. Contáctanos y te responderemos a la brevedad.</p>
        </div>
    </header>

    <!-- Contact Section -->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h2 class="section-title">Envíanos un Mensaje</h2>
                    
                    <?php if (!empty($mensaje)): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apellido" class="form-label">Apellido *</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo isset($apellido) ? htmlspecialchars($apellido) : ''; ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo isset($telefono) ? htmlspecialchars($telefono) : ''; ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="asunto" class="form-label">Asunto</label>
                            <input type="text" class="form-control" id="asunto" name="asunto" value="<?php echo isset($asunto) ? htmlspecialchars($asunto) : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje *</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required><?php echo isset($mensaje_texto) ? htmlspecialchars($mensaje_texto) : ''; ?></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="privacidad" required>
                            <label class="form-check-label" for="privacidad">Acepto la política de privacidad *</label>
                        </div>
                        <button type="submit" class="btn btn-orange">Enviar Mensaje</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title">Información de Contacto</h2>
                    <p>No dudes en ponerte en contacto con nosotros utilizando la información a continuación. Estamos disponibles para atenderte y responder a todas tus consultas.</p>
                    
                    <div class="contact-info mt-4">
                        <div class="d-flex mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Dirección</h5>
                                <p class="mb-0">Av. Principal 123, Ciudad, País</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Teléfono</h5>
                                <p class="mb-0">(123) 456-7890</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Email</h5>
                                <p class="mb-0">info@empresa.com</p>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-3">
                            <div class="contact-icon me-3">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">Horario de Atención</h5>
                                <p class="mb-0">Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                                <p class="mb-0">Sábados: 9:00 AM - 1:00 PM</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="social-media mt-4">
                        <h5>Síguenos en Redes Sociales</h5>
                        <div class="social-icons">
                            <a href="#" class="social-icon me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon me-2"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container-fluid p-0">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.952912260219!2d3.375295414770757!3d6.5276316249594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMzEnMzkuNSJOIDPCsDIyJzMxLjEiRQ!5e0!3m2!1sen!2sng!4v1627309850095!5m2!1sen!2sng" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="text-orange">EMPRESA</h5>
                    <p>Ofrecemos soluciones innovadoras y de alta calidad para satisfacer las necesidades de nuestros clientes.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="text-orange">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Inicio</a></li>
                        <li><a href="servicios.php" class="text-white">Servicios</a></li>
                        <li><a href="noticias.php" class="text-white">Noticias</a></li>
                        <li><a href="contacto.php" class="text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="text-orange">Contacto</h5>
                    <address>
                        <p><i class="fas fa-map-marker-alt me-2"></i> Dirección de la Empresa</p>
                        <p><i class="fas fa-phone me-2"></i> (123) 456-7890</p>
                        <p><i class="fas fa-envelope me-2"></i> info@empresa.com</p>
                    </address>
                    <div class="social-icons">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="text-center">
                <p>&copy; <?php echo date('Y'); ?> EMPRESA. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>
