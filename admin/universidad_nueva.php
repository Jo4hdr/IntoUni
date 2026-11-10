<?php require_once __DIR__.'/../config/config.php';
require_role('admin');
$pageTitle='Registrar universidad';
require __DIR__.'/../includes/header.php';
?>
<section class="auth-wrap">
<div class="form-card">
<h1>Registrar universidad</h1>
<form method="post" action="/admin/universidad_guardar.php">
<input type="hidden" name="csrf" value="<?=e(csrf_token())?>
"><?php foreach(['nombre'=>'Nombre','ciudad'=>'Ciudad','departamento'=>'Departamento','email'=>'Correo institucional','sitio_web'=>'Sitio web oficial'] as $name=>$label):?>
<div class="form-row">
<label><?=e($label)?>
</label>
<input name="<?=$name?>
" <?= $name==='email'?'type="email"':($name==='sitio_web'?'type="url"':'type="text"')?>
 required maxlength="160">
</div><?php endforeach;
?>
<div class="form-row">
<label>Tipo de institución</label>
<select name="tipo">
<option value="publica">Pública</option>
<option value="privada">Privada</option>
</select>
</div>
<div class="form-row">
<label>Contraseña de acceso institucional</label>
<input type="password" name="password" minlength="8" required>
</div>
<button class="btn btn-primary">Guardar universidad</button>
</form>
<p>
<a href="/admin/index.php">← Volver al panel</a>
</p>
</div>
</section><?php require __DIR__.'/../includes/footer.php';
?>
