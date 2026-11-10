<?php require_once __DIR__.'/../config/config.php';
require_role('universidad');
$uid=$_SESSION['user']['id'];
$st=$db->prepare('SELECT * FROM universidades WHERE id_universidad=?');
$st->bind_param('i',$uid);
$st->execute();
$u=$st->get_result()->fetch_assoc();
$pageTitle='Panel institucional';
require __DIR__.'/../includes/header.php';
?>
<section class="dashboard">
<div class="container">
<div class="dashboard-head">
<div>
<span class="eyebrow">Panel institucional</span>
<h1>Bienvenido, <?=e($u['nombre'])?>
</h1>
<p class="muted">Consulta la información pública de tu institución.</p>
</div>
<a class="btn btn-primary" href="/universidad.php?id=<?=$uid?>
">Ver perfil público</a>
</div>
<div class="panel-card">
<h2>Información registrada</h2>
<p>
<strong>Ubicación:</strong> <?=e($u['ciudad'])?>
, <?=e($u['departamento'])?>
</p>
<p>
<strong>Tipo:</strong> <?=e($u['tipo'])?>
</p>
<p>
<strong>Correo:</strong> <?=e($u['email'])?>
</p>
<p class="helper">Para modificar los datos institucionales, comunícate con el administrador de IntoUni.</p>
</div>
</div>
</section><?php require __DIR__.'/../includes/footer.php';
?>
