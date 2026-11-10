<?php require_once __DIR__.'/config/config.php';
$id=(int)($_GET['id']??0);
$st=$db->prepare('SELECT * FROM universidades WHERE id_universidad=?');
$st->bind_param('i',$id);
$st->execute();
$u=$st->get_result()->fetch_assoc();
if(!$u){http_response_code(404);
$pageTitle='Universidad no encontrada';
require __DIR__.'/includes/header.php';
echo '<div class="container section"><h1>Universidad no encontrada</h1><a href="/universidades.php">Volver al catálogo</a></div>';
require __DIR__.'/includes/footer.php';
exit;
}$ps=$db->prepare('SELECT * FROM programas WHERE id_universidad=? ORDER BY nombre');
$ps->bind_param('i',$id);
$ps->execute();
$programas=$ps->get_result();
$bs=$db->prepare('SELECT b.nombre,b.descripcion FROM universidad_beneficios ub JOIN beneficios b ON b.id_beneficio=ub.id_beneficio WHERE ub.id_universidad=?');
$bs->bind_param('i',$id);
$bs->execute();
$beneficios=$bs->get_result();
$pageTitle=$u['nombre'];
require __DIR__.'/includes/header.php';
?>

<section class="page-hero">
<div class="container">
<span class="eyebrow">Institución educativa</span>
<h1><?=e($u['nombre'])?>
</h1>
<p class="muted">📍 <?=e($u['ciudad'])?>
, <?=e($u['departamento'])?>
 · <?=e(ucfirst($u['tipo']))?>
</p><?php if($u['sitio_web']):?>
<a class="btn btn-primary" target="_blank" rel="noopener" href="<?=e($u['sitio_web'])?>
">Visitar sitio oficial ↗</a><?php endif;
?>
</div>
</section>
<section class="section">
<div class="container detail-layout">
<div class="panel-card">
<h2>Programas académicos</h2><?php if($programas->num_rows):?>
<div class="table-wrap">
<table class="data-table">
<thead>
<tr>
<th>Programa</th>
<th>Modalidad</th>
<th>Duración</th>
</tr>
</thead>
<tbody><?php while($p=$programas->fetch_assoc()):?>
<tr>
<td><?=e($p['nombre'])?>
</td>
<td><?=e($p['modalidad'])?>
</td>
<td><?= (int)$p['duracion']?>
 semestres</td>
</tr><?php endwhile;
?>
</tbody>
</table>
</div><?php else:?>
<p class="muted">Esta institución aún no tiene programas registrados.</p><?php endif;
?>
</div>
<aside class="panel-card">
<h2>Beneficios</h2><?php if($beneficios->num_rows):while($b=$beneficios->fetch_assoc()):?>
<p>
<strong><?=e($b['nombre'])?>
</strong>
<br>
<span class="muted"><?=e($b['descripcion'])?>
</span>
</p><?php endwhile;
else:?>
<p class="muted">No hay beneficios registrados para esta institución.</p><?php endif;
?>
</aside>
</div>
</section><?php require __DIR__.'/includes/footer.php';
?>
