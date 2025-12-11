<?php
// Incluir archivo de configuración
require_once 'config/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa - Servicios</title>
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
                <span class="text-orange">NSYSTEM</span>
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
                        <a class="nav-link active" href="servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <header class="page-header bg-dark text-white py-5 text-center">
        <div class="container">
            <h1 class="display-4">Nuestros Servicios</h1>
            <p class="lead">Soluciones innovadoras para impulsar tu negocio</p>
        </div>
    </header>

    <!-- Services Section -->
    <section class="services-section py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="service-img-container">
                        <img src="img/service1.jpg" alt="Servicio 1" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <div class="service-content">
                        <h2 class="section-title">Servicio 1</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor mauris molestie elit, et lacinia ipsum quam nec dui.</p>
                        <p>Donec interdum, metus et hendrerit aliquet, dolor diam sagittis ligula, eget egestas libero turpis vel mi. Nunc feugiat vel tellus vel dignissim. Aenean auctor gravida sem, et pulvinar nisl tempor non.</p>
                        <ul class="service-features">
                            <li><i class="fas fa-check text-orange me-2"></i> Característica 1 del servicio</li>
                            <li><i class="fas fa-check text-orange me-2"></i> Característica 2 del servicio</li>
                            <li><i class="fas fa-check text-orange me-2"></i> Característica 3 del servicio</li>
                            <li><i class="fas fa-check text-orange me-2"></i> Característica 4 del servicio</li>
                        </ul>
                        <a href="contacto.php" class="btn btn-orange mt-3">Solicitar Información</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">¿Por Qué Elegirnos?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-medal fa-3x text-orange"></i>
                        </div>
                        <h3>Calidad Garantizada</h3>
                        <p>Nos comprometemos a ofrecer servicios de la más alta calidad, respaldados por nuestra garantía de satisfacción.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-users fa-3x text-orange"></i>
                        </div>
                        <h3>Equipo Profesional</h3>
                        <p>Contamos con un equipo de profesionales altamente capacitados y con amplia experiencia en el sector.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-headset fa-3x text-orange"></i>
                        </div>
                        <h3>Soporte Personalizado</h3>
                        <p>Ofrecemos atención personalizada y soporte continuo para asegurar la satisfacción de nuestros clientes.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-rocket fa-3x text-orange"></i>
                        </div>
                        <h3>Innovación Constante</h3>
                        <p>Nos mantenemos a la vanguardia de las últimas tendencias y tecnologías para ofrecer soluciones innovadoras.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-clock fa-3x text-orange"></i>
                        </div>
                        <h3>Puntualidad</h3>
                        <p>Valoramos tu tiempo y nos comprometemos a cumplir con los plazos establecidos para cada proyecto.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-hand-holding-usd fa-3x text-orange"></i>
                        </div>
                        <h3>Precios Competitivos</h3>
                        <p>Ofrecemos servicios de alta calidad a precios competitivos, garantizando el mejor valor por tu inversión.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="text-orange">NSYSTEM</h5>
                    <p>Ofrecemos soluciones innovadoras y de alta calidad para satisfacer las necesidades de nuestros clientes.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="text-orange">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Inicio</a></li>
                        <li><a href="servicios.php" class="text-white">Servicios</a></li>
                        <li><a href="contacto.php" class="text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="text-orange">Contacto</h5>
                    <address>
                        <p><i class="fas fa-envelope me-2"></i> info@empresa.com</p>
                    </address>
                   
                </div>
            </div>
            <hr class="bg-secondary">
            <div class="text-center">
                <p>&copy; <?php echo date('Y'); ?> NSYSTEM. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>
