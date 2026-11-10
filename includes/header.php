<?php $pageTitle = $pageTitle ?? 'Encuentra tu futuro';
 $user = $_SESSION['user'] ?? null;
 ?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="IntoUni te ayuda a descubrir universidades, programas académicos y oportunidades para continuar tus estudios.">
<title><?= e($pageTitle) ?>
 | IntoUni</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/IntoUni/assets/css/styles.css">

</head>
<body>
<header class="site-header">
<div class="container nav-wrap">
<a class="brand" href="/index.php">
<span class="brand-mark">I</span>
<span>Into<span class="brand-accent">Uni</span>
<small>Tu futuro comienza aquí</small>
</span>
</a>
<button class="menu-toggle" aria-label="Abrir menú" aria-expanded="false">☰</button>
<nav class="main-nav">
<a href="/universidades.php">Universidades</a>
<a href="/programas.php">Programas</a>
<a href="/index.php#como-funciona">Cómo funciona</a><?php if($user): ?>
<a class="nav-user" href="/dashboard.php">Mi espacio</a>
<a class="btn btn-outline btn-small" href="/auth/logout.php">Salir</a><?php else: ?>
<a href="/auth/login.php">Iniciar sesión</a>
<a class="btn btn-primary btn-small" href="/auth/registro.php">Crear cuenta</a><?php endif;
 ?>
</nav>
</div>
</header>
<main>
<?php if($f=get_flash()): ?>
<div class="container">
<div class="alert alert-<?= e($f['type']) ?>
"><?= e($f['message']) ?>
</div>
</div><?php endif;
 ?>
