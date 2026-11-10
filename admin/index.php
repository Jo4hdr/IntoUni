<?php require_once __DIR__.'/../config/config.php';
require_role('admin');
$counts=[];
foreach(['aspirantes'=>'Aspirantes','universidades'=>'Universidades','programas'=>'Programas'] as $t=>$label){$r=$db->query("SELECT COUNT(*) n FROM $t")->fetch_assoc();
$counts[$label]=(int)$r['n'];
}$pageTitle='Administración';
require __DIR__.'/../includes/header.php';
?>
<section class="dashboard">
<div class="container">
<div class="dashboard-head">
<div>
<span class="eyebrow">Administración</span>
<h1>Panel de control</h1>
<p class="muted">Gestiona la información que se muestra en IntoUni.</p>
</div>
</div>
<div class="feature-grid"><?php foreach($counts as $label=>$n):?>
<article class="feature">
<div class="feature-icon">✦</div>
<h3><?=$n?>
</h3>
<p class="muted"><?=$label?>
 registrados</p>
</article><?php endforeach;
?>
</div>
<div class="feature-grid" style="margin-top:22px">
<article class="panel-card">
<h3>Universidades</h3>
<p class="muted">Registra instituciones educativas en el catálogo.</p>
<a class="btn btn-primary" href="/admin/universidad_nueva.php">Agregar universidad</a>
</article>
<article class="panel-card">
<h3>Programas</h3>
<p class="muted">Añade carreras y programas académicos.</p>
<a class="btn btn-primary" href="/admin/programa_nuevo.php">Agregar programa</a>
</article>
<article class="panel-card">
<h3>Aspirantes</h3>
<p class="muted">Consulta las cuentas creadas en la plataforma.</p>
<a class="btn btn-outline" href="/admin/aspirantes.php">Ver aspirantes</a>
</article>
</div>
</div>
</section><?php require __DIR__.'/../includes/footer.php';
?>
