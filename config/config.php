<?php
// En InfinityFree reemplaza estos valores por los datos de MySQL que aparecen en tu panel.
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');

define('DB_NAME', getenv('DB_NAME') ?: 'IntoUni');

define('DB_USER', getenv('DB_USER') ?: 'root');

define('DB_PASS', getenv('DB_PASS') ?: '');

define('APP_NAME', 'IntoUni');

if (session_status() === PHP_SESSION_NONE) {
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');

    session_set_cookie_params(['httponly'=>true, 'secure'=>$https, 'samesite'=>'Lax']);

    session_start();

}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $db->set_charset('utf8mb4');

} catch (mysqli_sql_exception $e) {
    http_response_code(500);

    exit('No fue posible conectar con la base de datos. Revisa config/config.php y la importación de BD/IntoUni.sql.');

}
function e($value): string { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
 }
function redirect(string $to): never { header('Location: '.$to);
 exit;
 }
function require_login(): void { if (empty($_SESSION['user'])) redirect('/auth/login.php');
 }
function require_role(string $role): void { require_login();
 if (($_SESSION['user']['rol'] ?? '') !== $role) { http_response_code(403);
 exit('No tienes permiso para acceder a esta sección.');
 } }
function csrf_token(): string { if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
 return $_SESSION['csrf'];
 }
function verify_csrf(): void { if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) { http_response_code(419);
 exit('Solicitud no válida. Recarga la página e inténtalo de nuevo.');
 } }
function flash(string $message, string $type='success'): void { $_SESSION['flash']=['message'=>$message,'type'=>$type];
 }
function get_flash(): ?array { $f=$_SESSION['flash']??null;
 unset($_SESSION['flash']);
 return $f;
 }
