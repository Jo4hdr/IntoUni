<?php require_once __DIR__.'/config/config.php';
 $q=trim($_GET['q']??'');
 $sql="SELECT u.*, COUNT(p.id_programa) total_programas FROM universidades u LEFT JOIN programas p ON p.id_universidad=u.id_universidad WHERE (?='' OR u.nombre LIKE CONCAT('%',?,'%') OR u.ciudad LIKE CONCAT('%',?,'%') OR u.departamento LIKE CONCAT('%',?,'%')) GROUP BY u.id_universidad ORDER BY u.nombre";
 $st=$db->prepare($sql);
$st->bind_param('ssss',$q,$q,$q,$q);
$st->execute();
$items=$st->get_result();
$pageTitle='Universidades';
require __DIR__.'/includes/header.php';
 ?>

<section class="page-hero">
<div class="container">
<span class="eyebrow">Explora tus opciones</span>
<h1>Universidades</h1>
<p class="muted">Encuentra instituciones y conoce su oferta académica.</p>
<form class="searchbar" method="get">
<input type="search" name="q" value="<?=e($q)?>
" placeholder="Busca por universidad, ciudad o departamento">
<button class="btn btn-primary">Buscar</button>
</form>
</div>
</section>
<section class="section">
<div class="container">
<div class="card-grid"><?php if($items->num_rows):while($u=$items->fetch_assoc()): ?>
<article class="uni-card">
<div class="uni-cover">✦</div>
<div class="uni-content">
<span class="tag"><?=e(ucfirst($u['tipo']))?>
</span>
<h3><?=e($u['nombre'])?>
</h3>
<div class="uni-meta">📍 <?=e($u['ciudad'])?>
, <?=e($u['departamento'])?>
</div>
<div class="uni-meta">📚 <?= (int)$u['total_programas'] ?>
 programas registrados</div>
<a class="card-link" href="/universidad.php?id=<?=(int)$u['id_universidad']?>
">Ver universidad →</a>
</div>
</article><?php endwhile;
else: ?>
<div class="empty">
<h3>No encontramos resultados</h3>
<p>Prueba con otro nombre o ubicación, o vuelve más tarde.</p>
</div><?php endif;
 ?>
</div>
</div>
</section><?php require __DIR__.'/includes/footer.php';
 ?>
