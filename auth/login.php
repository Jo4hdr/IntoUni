<?php require_once __DIR__.'/../config/config.php';
if(!empty($_SESSION['user']))redirect('/dashboard.php');
$pageTitle='Iniciar sesión';
require __DIR__.'/../includes/header.php';
?>

<section class="auth-wrap">
<div class="form-card">
<span class="eyebrow">Qué bueno tenerte aquí</span>
<h1>Inicia sesión</h1>
<p class="muted">Continúa explorando oportunidades para tu futuro.</p>
<form method="post" action="/auth/login_process.php">
<input type="hidden" name="csrf" value="<?=e(csrf_token())?>
">
<div class="form-row">
<label for="email">Correo electrónico</label>
<input id="email" type="email" name="email" required autocomplete="email">
</div>
<div class="form-row">
<label for="password">Contraseña</label>
<input id="password" type="password" name="password" required autocomplete="current-password">
</div>
<button class="btn btn-primary">Iniciar sesión</button>
</form>
<p class="helper">¿Aún no tienes cuenta? <a href="/auth/registro.php">Regístrate aquí</a>.</p>
</div>
</section><?php require __DIR__.'/../includes/footer.php';
?>
