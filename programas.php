<?php require_once __DIR__.'/config/config.php';
$q=trim($_GET['q']??'');
$st=$db->prepare("SELECT p.*,u.nombre universidad,u.ciudad,u.departamento FROM programas p JOIN universidades u ON u.id_universidad=p.id_universidad WHERE (?='' OR p.nombre LIKE CONCAT('%',?,'%') OR u.nombre LIKE CONCAT('%',?,'%')) ORDER BY p.nombre");
$st->bind_param('sss',$q,$q,$q);
$st->execute();
$items=$st->get_result();
$pageTitle='Programas académicos';
require __DIR__.'/includes/header.php';
?>

<section class="page-hero">
<div class="container">
<span class="eyebrow">Encuentra lo que te apasiona</span>
<h1>Programas académicos</h1>
<p class="muted">Busca opciones de formación y conoce dónde puedes estudiarlas.</p>
<form class="searchbar" method="get">
<input type="search" name="q" value="<?=e($q)?>
" placeholder="Ej. Ingeniería, Música, Medicina">
<button class="btn btn-primary">Buscar</button>
</form>
</div>
</section>
<section class="section">
<div class="container">
<div class="card-grid"><?php if($items->num_rows):while($p=$items->fetch_assoc()):?>
<article class="uni-card">
<div class="uni-cover">📘</div>
<div class="uni-content">
<span class="tag"><?=e($p['modalidad'])?>
</span>
<h3><?=e($p['nombre'])?>
</h3>
<p class="uni-meta"><?=e($p['universidad'])?>
</p>
<p class="uni-meta">📍 <?=e($p['ciudad'])?>
 · <?= (int)$p['duracion'] ?>
 semestres</p>
<a class="card-link" href="/universidad.php?id=<?=(int)$p['id_universidad']?>
">Ver institución →</a><?php if(($_SESSION['user']['rol']??'')==='aspirante'):?>
<form method="post" action="/aspirante/guardar_interes.php" class="inline-form">
<input type="hidden" name="csrf" value="<?=e(csrf_token())?>
">
<input type="hidden" name="programa" value="<?=(int)$p['id_programa']?>
">
<button class="btn btn-outline btn-small">Guardar interés ♡</button>
</form><?php endif;
?>
</div>
</article><?php endwhile;
else:?>
<div class="empty">
<h3>Aún no hay programas para mostrar</h3>
<p>El catálogo se irá completando con información de las instituciones.</p>
</div><?php endif;
?>
</div>
</div>
</section><?php require __DIR__.'/includes/footer.php';
?>
