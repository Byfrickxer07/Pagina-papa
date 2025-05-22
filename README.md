# Página Web Empresarial

Este proyecto es una página web empresarial completa con diseño responsivo en colores negro y naranja. Incluye un carrusel en la página de inicio, sección de noticias y un formulario de contacto que guarda los datos en una base de datos y envía correos electrónicos.

## Características

- Diseño moderno y responsivo
- Esquema de colores negro y naranja
- Carrusel en la página de inicio
- Sección de noticias (3 noticias destacadas)
- Formulario de contacto con almacenamiento en base de datos
- Envío de correos electrónicos desde el formulario de contacto
- Compatible con XAMPP (PHP y MySQL)

## Requisitos

- XAMPP (Apache, MySQL, PHP)
- Navegador web moderno

## Instalación

1. Clona o descarga este repositorio en tu directorio `htdocs` de XAMPP (generalmente en `C:\xampp\htdocs\`)
2. Inicia los servicios de Apache y MySQL desde el panel de control de XAMPP
3. Importa la base de datos:
   - Abre phpMyAdmin (http://localhost/phpmyadmin)
   - Crea una nueva base de datos llamada `empresa_db`
   - Importa el archivo `empresa_db.sql` incluido en este proyecto

## Estructura de archivos

```
Pagina_PAPA/
├── config/
│   └── config.php         # Configuración de la base de datos
├── css/
│   └── styles.css         # Estilos CSS personalizados
├── img/                   # Directorio para imágenes
├── js/
│   └── main.js            # JavaScript personalizado
├── index.php              # Página de inicio
├── servicios.php          # Página de servicios
├── noticias.php           # Página de listado de noticias
├── noticia.php            # Página de detalle de noticia
├── contacto.php           # Página de contacto
├── empresa_db.sql         # Archivo SQL para importar la base de datos
└── README.md              # Este archivo
```

## Configuración

### Base de datos
La configuración de la base de datos se encuentra en el archivo `config/config.php`. Por defecto, está configurada para funcionar con XAMPP con los siguientes parámetros:

- Host: localhost
- Usuario: root
- Contraseña: (vacía)
- Nombre de la base de datos: empresa_db

Si necesitas cambiar estos valores, edita el archivo `config/config.php`.

### Correo electrónico
Para que el formulario de contacto envíe correos electrónicos, debes configurar el servidor de correo en tu instalación de XAMPP. Puedes modificar el destinatario del correo en el archivo `contacto.php`.

## Personalización

### Imágenes
Reemplaza las imágenes en el directorio `img/` con tus propias imágenes. Asegúrate de mantener los mismos nombres de archivo o actualiza las referencias en el código.

### Contenido
Puedes editar el contenido de las páginas modificando los archivos PHP correspondientes.

### Estilos
Los estilos personalizados se encuentran en `css/styles.css`. Puedes modificarlos según tus preferencias.

## Uso

1. Accede al sitio web a través de http://localhost/Pagina_PAPA/
2. Navega por las diferentes secciones del sitio
3. Los mensajes enviados a través del formulario de contacto se almacenarán en la base de datos y se enviarán por correo electrónico

## Administración

Para gestionar los mensajes de contacto y las noticias, puedes acceder directamente a la base de datos a través de phpMyAdmin (http://localhost/phpmyadmin).

---

Desarrollado para [Nombre de la Empresa] © 2025
