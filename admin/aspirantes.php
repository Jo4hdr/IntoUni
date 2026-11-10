<?php require_once __DIR__.'/../config/config.php';
require_role('admin');
$items=$db->query('SELECT id_aspirante,nombre,apellidos,email,ciudad FROM aspirantes ORDER BY id_aspirante DESC');
$pageTitle='Aspirantes';
require __DIR__.'/../includes/header.php';
?>
<section class="dashboard">
<div class="container">
<div class="dashboard-head">
<div>
<span class="eyebrow">Administración</span>
<h1>Aspirantes registrados</h1>
</div>
<a class="btn btn-outline" href="/admin/index.php">Volver</a>
</div>
<div class="table-wrap">
<table class="data-table">
<thead>
<tr>
<th>Nombre</th>
<th>Correo</th>
<th>Ciudad</th>
</tr>
</thead>
<tbody><?php while($a=$items->fetch_assoc()):?>
<tr>
<td><?=e($a['nombre'].' '.$a['apellidos'])?>
</td>
<td><?=e($a['email'])?>
</td>
<td><?=e($a['ciudad'])?>
</td>
</tr><?php endwhile;
?>
</tbody>
</table>
</div>
</div>
</section><?php require __DIR__.'/../includes/footer.php';
?>
