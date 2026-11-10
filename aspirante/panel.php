<?php require_once __DIR__.'/../config/config.php';
require_role('aspirante');
$uid=$_SESSION['user']['id'];
$st=$db->prepare('SELECT i.fecha,p.nombre programa,u.nombre universidad FROM intereses i JOIN programas p ON p.id_programa=i.id_programa JOIN universidades u ON u.id_universidad=p.id_universidad WHERE i.id_aspirante=? ORDER BY i.fecha DESC');
$st->bind_param('i',$uid);
$st->execute();
$items=$st->get_result();
$pageTitle='Mi espacio';
require __DIR__.'/../includes/header.php';
?>
<section class="dashboard">
<div class="container">
<div class="dashboard-head">
<div>
<span class="eyebrow">Panel de aspirante</span>
<h1>Hola, <?=e($_SESSION['user']['nombre'])?>
 👋</h1>
<p class="muted">Aquí puedes organizar las opciones que te interesan.</p>
</div>
<a class="btn btn-primary" href="/programas.php">Explorar programas</a>
</div>
<div class="panel-card">
<h2>Mis programas de interés</h2><?php if($items->num_rows):?>
<div class="table-wrap">
<table class="data-table">
<thead>
<tr>
<th>Programa</th>
<th>Universidad</th>
<th>Fecha guardado</th>
</tr>
</thead>
<tbody><?php while($r=$items->fetch_assoc()):?>
<tr>
<td><?=e($r['programa'])?>
</td>
<td><?=e($r['universidad'])?>
</td>
<td><?=e($r['fecha'])?>
</td>
</tr><?php endwhile;
?>
</tbody>
</table>
</div><?php else:?>
<p class="muted">Todavía no has guardado programas. Explora el catálogo y guarda tus favoritos.</p><?php endif;
?>
</div>
</div>
</section><?php require __DIR__.'/../includes/footer.php';
?>
