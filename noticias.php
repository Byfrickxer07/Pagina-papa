<?php
// Incluir archivo de configuración
require_once 'config/config.php';

// Obtener todas las noticias ordenadas por fecha
$sql = "SELECT * FROM noticias ORDER BY fecha DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa - Noticias</title>
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
                        <a class="nav-link" href="servicios.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="noticias.php">Noticias</a>
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
            <h1 class="display-4">Noticias</h1>
            <p class="lead">Mantente informado sobre las últimas novedades de nuestra empresa</p>
        </div>
    </header>

    <!-- News Section -->
    <section class="news-section py-5">
        <div class="container">
            <div class="row">
                <?php
                if ($result && $result->num_rows > 0) {
                    // Mostrar noticias de la base de datos
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card news-card h-100">
                                <img src="<?php echo $row['imagen']; ?>" class="card-img-top" alt="<?php echo $row['titulo']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
                                    <p class="card-text"><?php echo substr($row['contenido'], 0, 150); ?>...</p>
                                    <p class="text-muted"><small>Publicado: <?php echo date('d/m/Y', strtotime($row['fecha'])); ?></small></p>
                                    <a href="noticia.php?id=<?php echo $row['id']; ?>" class="btn btn-orange">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // Mostrar noticias de ejemplo si no hay en la base de datos
                    ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card h-100">
                            <img src="img/news1.jpg" class="card-img-top" alt="Noticia 1">
                            <div class="card-body">
                                <h5 class="card-title">Lanzamiento de Inteligencia Artificial Avanzada</h5>
                                <p class="card-text">Hemos desarrollado una nueva plataforma de IA que revoluciona el análisis de datos empresariales. Esta tecnología permite a las empresas automatizar procesos complejos y obtener insights valiosos a partir de grandes volúmenes de información...</p>
                                <p class="text-muted"><small>Publicado: 25/05/2025</small></p>
                                <a href="#" class="btn btn-orange">Leer Más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card h-100">
                            <img src="img/news2.jpg" class="card-img-top" alt="Noticia 2">
                            <div class="card-body">
                                <h5 class="card-title">Nueva Tecnología de Realidad Aumentada</h5>
                                <p class="card-text">Presentamos nuestra innovadora solución de Realidad Aumentada para el sector industrial. Esta tecnología permite a los técnicos visualizar componentes internos de maquinaria compleja en tiempo real, reduciendo los tiempos de mantenimiento y mejorando la precisión...</p>
                                <p class="text-muted"><small>Publicado: 15/05/2025</small></p>
                                <a href="#" class="btn btn-orange">Leer Más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card h-100">
                            <img src="img/news3.jpg" class="card-img-top" alt="Noticia 3">
                            <div class="card-body">
                                <h5 class="card-title">Avances en Ciberseguridad</h5>
                                <p class="card-text">Hemos desarrollado un nuevo sistema de protección contra amenazas cibernéticas que utiliza algoritmos de aprendizaje automático para detectar patrones de ataques desconocidos. Esta solución proporciona una capa adicional de seguridad para infraestructuras críticas...</p>
                                <p class="text-muted"><small>Publicado: 05/05/2025</small></p>
                                <a href="#" class="btn btn-orange">Leer Más</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
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
                        <li><a href="noticias.php" class="text-white">Noticias</a></li>
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

    <!-- Botón Volver Arriba -->
    <button id="scrollTopBtn" class="btn btn-orange scroll-top-btn" onclick="scrollToTop()" aria-label="Volver arriba">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>
