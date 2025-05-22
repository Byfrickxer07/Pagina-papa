<?php
// Incluir archivo de configuración
require_once 'config/config.php';

// Verificar si se proporcionó un ID de noticia
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Obtener la noticia de la base de datos
    $sql = "SELECT * FROM noticias WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $noticia = $result->fetch_assoc();
    } else {
        // Si no se encuentra la noticia, redirigir a la página de noticias
        header("Location: noticias.php");
        exit();
    }
    
    $stmt->close();
} else {
    // Si no se proporcionó un ID válido, redirigir a la página de noticias
    header("Location: noticias.php");
    exit();
}

// Obtener noticias relacionadas (excluyendo la noticia actual)
$sql_relacionadas = "SELECT * FROM noticias WHERE id != ? ORDER BY fecha DESC LIMIT 3";
$stmt_relacionadas = $conn->prepare($sql_relacionadas);
$stmt_relacionadas->bind_param("i", $id);
$stmt_relacionadas->execute();
$result_relacionadas = $stmt_relacionadas->get_result();
$noticias_relacionadas = [];

if ($result_relacionadas->num_rows > 0) {
    while ($row = $result_relacionadas->fetch_assoc()) {
        $noticias_relacionadas[] = $row;
    }
}

$stmt_relacionadas->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa - <?php echo $noticia['titulo']; ?></title>
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
                        <a class="nav-link active" href="noticias.php">Noticias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Noticia Detail Section -->
    <section class="noticia-detail py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <article class="noticia-article">
                        <h1 class="noticia-title mb-3"><?php echo $noticia['titulo']; ?></h1>
                        <div class="noticia-meta mb-4">
                            <span class="me-3"><i class="far fa-calendar-alt me-2"></i><?php echo date('d/m/Y', strtotime($noticia['fecha'])); ?></span>
                            <span><i class="far fa-user me-2"></i>Admin</span>
                        </div>
                        <div class="noticia-featured-img mb-4">
                            <img src="<?php echo $noticia['imagen']; ?>" alt="<?php echo $noticia['titulo']; ?>" class="img-fluid rounded">
                        </div>
                        <div class="noticia-content">
                            <?php echo $noticia['contenido']; ?>
                        </div>
                        
                        <div class="noticia-share mt-4">
                            <h5>Compartir:</h5>
                            <div class="social-share">
                                <a href="#" class="btn btn-outline-dark me-2"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="btn btn-outline-dark me-2"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="btn btn-outline-dark me-2"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="btn btn-outline-dark me-2"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget mb-4">
                            <h4 class="widget-title">Noticias Recientes</h4>
                            <?php
                            if (!empty($noticias_relacionadas)) {
                                foreach ($noticias_relacionadas as $noticia_rel) {
                                    ?>
                                    <div class="recent-post d-flex mb-3">
                                        <div class="recent-post-img me-3">
                                            <img src="<?php echo $noticia_rel['imagen']; ?>" alt="<?php echo $noticia_rel['titulo']; ?>" class="img-fluid rounded" width="80">
                                        </div>
                                        <div class="recent-post-info">
                                            <h6><a href="noticia.php?id=<?php echo $noticia_rel['id']; ?>"><?php echo $noticia_rel['titulo']; ?></a></h6>
                                            <span class="text-muted small"><?php echo date('d/m/Y', strtotime($noticia_rel['fecha'])); ?></span>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                // Mostrar noticias de ejemplo si no hay en la base de datos
                                ?>
                                <div class="recent-post d-flex mb-3">
                                    <div class="recent-post-img me-3">
                                        <img src="img/news1.jpg" alt="Noticia 1" class="img-fluid rounded" width="80">
                                    </div>
                                    <div class="recent-post-info">
                                        <h6><a href="#">Lanzamiento de Nuevo Servicio</a></h6>
                                        <span class="text-muted small">22/05/2025</span>
                                    </div>
                                </div>
                                <div class="recent-post d-flex mb-3">
                                    <div class="recent-post-img me-3">
                                        <img src="img/news2.jpg" alt="Noticia 2" class="img-fluid rounded" width="80">
                                    </div>
                                    <div class="recent-post-info">
                                        <h6><a href="#">Expansión de Operaciones</a></h6>
                                        <span class="text-muted small">15/05/2025</span>
                                    </div>
                                </div>
                                <div class="recent-post d-flex mb-3">
                                    <div class="recent-post-img me-3">
                                        <img src="img/news3.jpg" alt="Noticia 3" class="img-fluid rounded" width="80">
                                    </div>
                                    <div class="recent-post-info">
                                        <h6><a href="#">Reconocimiento del Sector</a></h6>
                                        <span class="text-muted small">05/05/2025</span>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        
                        <div class="sidebar-widget mb-4">
                            <h4 class="widget-title">Contáctanos</h4>
                            <p>¿Tienes alguna pregunta sobre nuestros servicios? No dudes en contactarnos.</p>
                            <a href="contacto.php" class="btn btn-orange">Contactar Ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related News Section -->
    <section class="related-news py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Noticias Relacionadas</h2>
            <div class="row">
                <?php
                if (!empty($noticias_relacionadas)) {
                    foreach ($noticias_relacionadas as $noticia_rel) {
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="card news-card h-100">
                                <img src="<?php echo $noticia_rel['imagen']; ?>" class="card-img-top" alt="<?php echo $noticia_rel['titulo']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $noticia_rel['titulo']; ?></h5>
                                    <p class="card-text"><?php echo substr($noticia_rel['contenido'], 0, 100); ?>...</p>
                                    <p class="text-muted"><small>Publicado: <?php echo date('d/m/Y', strtotime($noticia_rel['fecha'])); ?></small></p>
                                    <a href="noticia.php?id=<?php echo $noticia_rel['id']; ?>" class="btn btn-orange">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <?php
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
