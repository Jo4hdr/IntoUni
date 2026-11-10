<?php require_once __DIR__.'/../config/config.php';
$pageTitle='Crear cuenta';
require __DIR__.'/../includes/header.php';
?>
<section class="auth-wrap">
<div class="form-card">
<span class="eyebrow">Tu camino comienza aquí</span>
<h1>Crea tu cuenta</h1>
<p class="muted">Regístrate como aspirante para guardar programas de tu interés.</p>
<form method="post" action="/auth/registro_process.php">
<input type="hidden" name="csrf" value="<?=e(csrf_token())?>
">
<div class="form-row">
<label>Nombre</label>
<input name="nombre" maxlength="80" required>
</div>
<div class="form-row">
<label>Apellidos</label>
<input name="apellidos" maxlength="100" required>
</div>
<div class="form-row">
<label>Correo electrónico</label>
<input type="email" name="email" maxlength="120" required>
</div>
<div class="form-row">
<label>Teléfono</label>
<input name="telefono" maxlength="20">
</div>
<div class="form-row">
<label>Ciudad</label>
<input name="ciudad" maxlength="80">
</div>
<div class="form-row">
<label>Institución educativa de origen</label>
<input name="colegio" maxlength="120">
</div>
<div class="form-row">
<label>Contraseña (mínimo 8 caracteres)</label>
<input type="password" name="password" minlength="8" required autocomplete="new-password">
</div>
<button class="btn btn-primary">Crear mi cuenta</button>
</form>
<p class="helper">¿Ya tienes cuenta? <a href="/auth/login.php">Inicia sesión</a>.</p>
</div>
</section><?php require __DIR__.'/../includes/footer.php';
?>
