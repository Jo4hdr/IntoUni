<?php require_once __DIR__.'/../config/config.php';
require_role('admin');
$universidades=$db->query('SELECT id_universidad,nombre FROM universidades ORDER BY nombre');
$pageTitle='Registrar programa';
require __DIR__.'/../includes/header.php';
?>
<section class="auth-wrap">
<div class="form-card">
<h1>Registrar programa</h1>
<form method="post" action="/admin/programa_guardar.php">
<input type="hidden" name="csrf" value="<?=e(csrf_token())?>
">
<div class="form-row">
<label>Nombre del programa</label>
<input name="nombre" required maxlength="140">
</div>
<div class="form-row">
<label>Modalidad</label>
<select name="modalidad">
<option>Presencial</option>
<option>Virtual</option>
<option>Distancia</option>
<option>Híbrida</option>
</select>
</div>
<div class="form-row">
<label>Duración (semestres)</label>
<input type="number" name="duracion" min="1" max="30" required>
</div>
<div class="form-row">
<label>Universidad</label>
<select name="universidad" required><?php while($u=$universidades->fetch_assoc()):?>
<option value="<?=(int)$u['id_universidad']?>
"><?=e($u['nombre'])?>
</option><?php endwhile;
?>
</select>
</div>
<button class="btn btn-primary">Guardar programa</button>
</form>
<p>
<a href="/admin/index.php">← Volver al panel</a>
</p>
</div>
</section><?php require __DIR__.'/../includes/footer.php';
?>
