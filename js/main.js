/**
 * JavaScript principal para la página web empresarial
 * Con mejoras para dispositivos móviles y responsividad
 */

// Detectar si es dispositivo móvil
const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

document.addEventListener('DOMContentLoaded', function() {
    // Inicializar todos los tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Inicializar todos los popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
    
    // Añadir clase 'active' a los enlaces de navegación según la página actual
    const currentLocation = window.location.pathname;
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const navbarToggler = document.querySelector('.navbar-toggler');
    
    navLinks.forEach(link => {
        // Marcar el enlace activo
        if (link.getAttribute('href') === currentLocation || 
            (currentLocation.includes(link.getAttribute('href')) && link.getAttribute('href') !== 'index.php')) {
            link.classList.add('active');
        } else if (currentLocation === '/' && link.getAttribute('href') === 'index.php') {
            link.classList.add('active');
        }
        
        // Cerrar menú al hacer clic en un enlace (para móviles)
        link.addEventListener('click', function() {
            if (window.innerWidth < 992 && navbarCollapse && navbarCollapse.classList.contains('show')) {
                const bsCollapse = new bootstrap.Collapse(navbarCollapse);
                bsCollapse.hide();
            }
        });
    });
    
    // Animación de desplazamiento suave para enlaces internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Validación del formulario de contacto
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = contactForm.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });
            
            // Validación específica para el email
            const emailField = contactForm.querySelector('input[type="email"]');
            if (emailField && emailField.value.trim()) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(emailField.value.trim())) {
                    isValid = false;
                    emailField.classList.add('is-invalid');
                }
            }
            
            if (!isValid) {
                e.preventDefault();
                
                // Mostrar mensaje de error
                const errorAlert = document.createElement('div');
                errorAlert.className = 'alert alert-danger mt-3';
                errorAlert.textContent = 'Por favor, complete todos los campos obligatorios correctamente.';
                
                // Eliminar alertas anteriores
                const previousAlerts = contactForm.querySelectorAll('.alert');
                previousAlerts.forEach(alert => alert.remove());
                
                contactForm.prepend(errorAlert);
                
                // Desplazarse al formulario
                contactForm.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
        
        // Eliminar clase is-invalid al escribir
        contactForm.querySelectorAll('input, textarea').forEach(field => {
            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('is-invalid');
                }
            });
        });
    }
    
    // Animación para elementos al hacer scroll
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementPosition < windowHeight - 100) {
                element.classList.add('animated');
            }
        });
    };
    
    // Inicializar animaciones
    animateOnScroll();
    window.addEventListener('scroll', animateOnScroll);
    
    // Inicializar carrusel con autoplay y ajustes para móviles
    var carousel = document.querySelector('#mainCarousel');
    if (carousel) {
        // Ajustar intervalo según el dispositivo
        var interval = isMobile ? 7000 : 5000; // Más tiempo en móviles para mejor lectura
        
        var carouselInstance = new bootstrap.Carousel(carousel, {
            interval: interval,
            touch: true // Habilitar gestos táctiles
        });
        
        // Pausar carrusel al mantener presionado en dispositivos táctiles
        if ('ontouchstart' in window) {
            carousel.addEventListener('touchstart', function() {
                carouselInstance.pause();
            });
            
            carousel.addEventListener('touchend', function() {
                carouselInstance.cycle();
            });
        }
    }
});

// Función para volver arriba
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Mostrar/ocultar botón de volver arriba
window.addEventListener('scroll', function() {
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    if (scrollTopBtn) {
        if (window.pageYOffset > 300) {
            scrollTopBtn.style.display = 'flex';
            scrollTopBtn.classList.add('show');
        } else {
            scrollTopBtn.style.display = 'none';
            scrollTopBtn.classList.remove('show');
        }
    }
});
