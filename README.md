# IntoUni

Plataforma web académica para explorar universidades, programas y oportunidades de educación superior.

## Tecnologías
- PHP 8.1 o superior
- MySQL 5.7+ / MariaDB
- HTML5, CSS3 y JavaScript

## Instalación local (XAMPP)
1. Abre la carpeta `IntoUni-final` del ZIP. Copia **todo lo que está dentro** (index.php, assets, config, etc.) directamente a `C:\xampp\htdocs\` en Windows. No copies la carpeta `IntoUni-final` como subcarpeta.
2. Inicia Apache y MySQL desde XAMPP.
3. Abre phpMyAdmin e importa `BD/IntoUni.sql`.
4. Revisa `config/config.php`. Para XAMPP normalmente se usa `localhost`, usuario `root` y contraseña vacía.
5. Verifica primero `http://localhost/assets/css/styles.css` (debe mostrar reglas CSS, no un error 404). Después abre `http://localhost/` y presiona `Ctrl + Shift + R`.

> Las rutas de esta versión son absolutas (`/...`): el proyecto debe instalarse en la raíz del sitio, o debes configurar un VirtualHost.

## Acceso inicial de administración
- Correo: `admin@intouni.com`
- Contraseña temporal: `Cambiar123!`

Cambia esta contraseña antes de publicar el sitio. No reutilices credenciales de demostración.

## Publicación en InfinityFree
1. Crea la base de datos MySQL desde el panel de InfinityFree.
2. Importa `BD/IntoUni.sql` en phpMyAdmin remoto.
3. En InfinityFree, el SQL debe importarse dentro de la base de datos ya creada: elimina las dos primeras instrucciones (`CREATE DATABASE` y `USE`) del archivo SQL antes de importar. Copia los valores de host, nombre de base de datos, usuario y contraseña que proporciona InfinityFree.
4. Actualiza `config/config.php` con esos valores. En InfinityFree el host de MySQL no necesariamente es `localhost`.
5. Sube el contenido de esta carpeta a `htdocs` mediante el administrador de archivos o FTP.
6. Prueba registro, inicio de sesión, catálogo y paneles con cuentas de prueba.

## Funcionalidades incluidas
- Catálogo público de universidades con búsqueda por nombre y ubicación.
- Catálogo de programas académicos.
- Perfil público de cada universidad.
- Registro e inicio de sesión con contraseñas cifradas mediante `password_hash()`.
- Sesiones y validación de roles (administrador, aspirante y universidad).
- Panel de aspirante y panel institucional.
- Panel administrativo para registrar universidades y programas, y consultar aspirantes.
- Diseño responsive para móviles, tabletas y computadores.

## Antes de entregar
- Sustituye los datos de demostración por información real, verificada y autorizada.
- Cambia la contraseña del administrador y elimina cuentas de prueba.
- Configura HTTPS en el dominio.
- Configura copias de seguridad y revisa los permisos de archivos.
- Comprueba que la versión de PHP de hosting sea compatible.

## Alcance actual
Esta es una primera versión funcional (MVP). Los beneficios están preparados para mostrarse cuando se asocian a una universidad en la base de datos. Las funciones avanzadas de edición/eliminación, recuperación de contraseña, verificación de correo y comparación personalizada pueden añadirse en una siguiente iteración.

## Estado de validación
- Se revisó la sintaxis de los archivos PHP con `php -l`.
- No se ha verificado el funcionamiento de extremo a extremo con un servidor MySQL real ni se ha publicado en InfinityFree o GitHub.
- El acceso de demostración debe cambiarse antes de publicar.

## Si el sitio aparece sin colores
- Comprueba que existe `C:\xampp\htdocs\assets\css\styles.css`.
- Abre `http://localhost/assets/css/styles.css`. Si aparece 404, los archivos están en otra carpeta.
- En `includes/header.php` el enlace es `/assets/css/styles.css?v=2`.
- El ZIP tiene una carpeta contenedora `IntoUni-final`: **solo su contenido** debe ir dentro de `htdocs`.
- El código se entrega con saltos de línea; si tu editor lo sigue mostrando en una línea, confirma que abriste los archivos de esta versión.
