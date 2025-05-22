<?php
// Incluir archivo de configuración
require_once 'config/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa - Inicio</title>
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
                        <a class="nav-link active" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel Section -->
    <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slide1.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h2>Soluciones Innovadoras</h2>
                    <p>Ofrecemos servicios de alta calidad para su empresa</p>
                    <a href="servicios.php" class="btn btn-orange">Nuestros Servicios</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slide2.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h2>Experiencia y Profesionalismo</h2>
                    <p>Contamos con un equipo altamente capacitado</p>
                    <a href="contacto.php" class="btn btn-orange">Contáctanos</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/slide3.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h2>Compromiso con la Excelencia</h2>
                    <p>Trabajamos para superar sus expectativas</p>
                    <a href="noticias.php" class="btn btn-orange">Últimas Noticias</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- About Section -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-title">Sobre Nosotros</h2>
                    <p>Somos una empresa líder en el sector, comprometida con la excelencia y la innovación. Nuestro objetivo es proporcionar soluciones de alta calidad que satisfagan las necesidades de nuestros clientes.</p>
                    <p>Con años de experiencia en el mercado, hemos desarrollado un enfoque único que combina tecnología de vanguardia con un servicio personalizado.</p>
                    <a href="servicios.php" class="btn btn-orange">Conoce Nuestros Servicios</a>
                </div>
                <div class="col-lg-6">
                    <img src="img/about.jpg" alt="Sobre Nosotros" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview -->
    <section class="services-preview py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Nuestros Servicios</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-cogs service-icon"></i>
                            <h3 class="card-title">Servicio 1</h3>
                            <p class="card-text">Descripción breve del servicio 1 que ofrece la empresa. Este servicio está diseñado para satisfacer necesidades específicas.</p>
                            <a href="servicios.php" class="btn btn-outline-orange">Más Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line service-icon"></i>
                            <h3 class="card-title">Servicio 2</h3>
                            <p class="card-text">Descripción breve del servicio 2 que ofrece la empresa. Este servicio está diseñado para satisfacer necesidades específicas.</p>
                            <a href="servicios.php" class="btn btn-outline-orange">Más Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card service-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-users service-icon"></i>
                            <h3 class="card-title">Servicio 3</h3>
                            <p class="card-text">Descripción breve del servicio 3 que ofrece la empresa. Este servicio está diseñado para satisfacer necesidades específicas.</p>
                            <a href="servicios.php" class="btn btn-outline-orange">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="latest-news py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Últimas Noticias</h2>
            <div class="row">
                <?php
                // Obtener las 3 últimas noticias
                $sql = "SELECT * FROM noticias ORDER BY fecha DESC LIMIT 3";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4 mb-4">';
                        echo '<div class="card news-card h-100">';
                        echo '<img src="' . $row['imagen'] . '" class="card-img-top" alt="' . $row['titulo'] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row['titulo'] . '</h5>';
                        echo '<p class="card-text">' . substr($row['contenido'], 0, 100) . '...</p>';
                        echo '<p class="text-muted"><small>Publicado: ' . date('d/m/Y', strtotime($row['fecha'])) . '</small></p>';
                        echo '<a href="noticia.php?id=' . $row['id'] . '" class="btn btn-orange">Leer Más</a>';
                        echo '</div></div></div>';
                    }
                } else {
                    // Mostrar noticias de ejemplo si no hay en la base de datos
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card news-card h-100">
                            <img src="img/news1.jpg" class="card-img-top" alt="Noticia 1">
                            <div class="card-body">
                                <h5 class="card-title">Lanzamiento de Nuevo Servicio</h5>
                                <p class="card-text">Estamos emocionados de anunciar el lanzamiento de nuestro nuevo servicio que revolucionará el mercado...</p>
                                <p class="text-muted"><small>Publicado: 22/05/2025</small></p>
                                <a href="#" class="btn btn-orange">Leer Más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card news-card h-100">
                            <img src="img/news2.jpg" class="card-img-top" alt="Noticia 2">
                            <div class="card-body">
                                <h5 class="card-title">Expansión de Operaciones</h5>
                                <p class="card-text">Nos complace informar que estamos expandiendo nuestras operaciones a nuevas regiones para servir mejor a nuestros clientes...</p>
                                <p class="text-muted"><small>Publicado: 15/05/2025</small></p>
                                <a href="#" class="btn btn-orange">Leer Más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card news-card h-100">
                            <img src="img/news3.jpg" class="card-img-top" alt="Noticia 3">
                            <div class="card-body">
                                <h5 class="card-title">Reconocimiento del Sector</h5>
                                <p class="card-text">Nuestra empresa ha sido reconocida como líder en innovación por la asociación del sector, destacando nuestro compromiso...</p>
                                <p class="text-muted"><small>Publicado: 05/05/2025</small></p>
                                <a href="#" class="btn btn-orange">Leer Más</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="text-center mt-4">
                <a href="noticias.php" class="btn btn-outline-orange">Ver Todas las Noticias</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5 bg-dark text-white text-center">
        <div class="container">
            <h2 class="mb-4">¿Listo para trabajar con nosotros?</h2>
            <p class="mb-4">Contáctanos hoy mismo para discutir cómo podemos ayudarte a alcanzar tus objetivos.</p>
            <a href="contacto.php" class="btn btn-orange btn-lg">Contáctanos Ahora</a>
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
