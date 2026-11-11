
<?php
require_once __DIR__ . '/config/config.php';

// Obtener el texto del buscador
$q = trim($_GET['q'] ?? '');

// Consultar únicamente universidades públicas
// desde la tabla Universidad de phpMyAdmin
$sql = "
    SELECT
        u.id_universidad,
        u.nombre,
        u.ciudad,
        u.departamento,
        u.tipo,
        u.pagina_web,
        (
            SELECT COUNT(*)
            FROM programas p
            WHERE p.id_universidad = u.id_universidad
        ) AS total_programas

    FROM Universidad u

    WHERE LOWER(TRIM(u.tipo)) IN (
        'publica',
        'pública',
        'publico',
        'público'
    )

    AND (
        ? = ''
        OR u.nombre LIKE CONCAT('%', ?, '%')
        OR u.ciudad LIKE CONCAT('%', ?, '%')
        OR u.departamento LIKE CONCAT('%', ?, '%')
    )

    ORDER BY u.nombre ASC
";

// Preparar consulta
$st = $db->prepare($sql);

if (!$st) {
    die('Error al preparar la consulta: ' . $db->error);
}

// Vincular parámetros del buscador
$st->bind_param(
    'ssss',
    $q,
    $q,
    $q,
    $q
);

// Ejecutar consulta
$st->execute();

// Obtener universidades
$items = $st->get_result();

$pageTitle = 'Universidades públicas';

require __DIR__ . '/includes/header.php';
?>

<!-- ENCABEZADO -->
<section class="page-hero">

    <div class="container">

        <span class="eyebrow">
            Explora tus opciones
        </span>

        <h1>Universidades públicas</h1>

        <p class="muted">
            Descubre universidades públicas de Colombia,
            conoce su ubicación y explora su oferta académica.
        </p>

        <!-- BUSCADOR -->
        <form
            class="searchbar"
            method="get"
            action="/IntoUni/universidades.php"
        >

            <input
                type="search"
                name="q"
                value="<?= e($q) ?>"
                placeholder="Busca por universidad, ciudad o departamento"
            >

            <button
                type="submit"
                class="btn btn-primary"
            >
                Buscar
            </button>

        </form>

    </div>

</section>

<!-- LISTADO DE UNIVERSIDADES -->
<section class="section">

    <div class="container">

        <div class="section-heading">

            <span class="eyebrow">
                Educación superior en Colombia
            </span>

            <h2>
                Encuentra tu próxima universidad
            </h2>

            <p>
                Explora las instituciones públicas
                registradas en IntoUni.
            </p>

        </div>

        <div class="card-grid">

            <?php if ($items->num_rows > 0): ?>

                <?php while ($u = $items->fetch_assoc()): ?>

                    <article class="uni-card">

                        <!-- PORTADA -->
                        <div class="uni-cover">
                            ✦
                        </div>

                        <!-- INFORMACIÓN -->
                        <div class="uni-content">

                            <span class="tag">
                                Pública
                            </span>

                            <h3>
                                <?= e($u['nombre']) ?>
                            </h3>

                            <div class="uni-meta">
                                Ubicación:
                                <?= e($u['ciudad']) ?>,
                                <?= e($u['departamento']) ?>
                            </div>

                            <div class="uni-meta">
                                Programas registrados:
                                <?= (int) $u['total_programas'] ?>
                            </div>

                            <!-- VER DETALLES -->
                            <a
                                class="card-link"
                                href="/IntoUni/universidad.php?id=<?= (int) $u['id_universidad'] ?>"
                            >
                                Ver universidad →
                            </a>

                            <!-- SITIO WEB OFICIAL -->
                            <?php if (!empty($u['pagina_web'])): ?>

                                <div style="margin-top: 12px;">

                                    <a
                                        href="<?= e($u['pagina_web']) ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="card-link"
                                    >
                                        Sitio web oficial →
                                    </a>

                                </div>

                            <?php endif; ?>

                        </div>

                    </article>

                <?php endwhile; ?>

            <?php else: ?>

                <!-- SIN RESULTADOS -->
                <div class="empty">

                    <h3>
                        No encontramos universidades
                    </h3>

                    <p>
                        Intenta buscar con otro nombre,
                        ciudad o departamento.
                    </p>

                    <a
                        href="/IntoUni/universidades.php"
                        class="btn btn-primary"
                    >
                        Ver todas las universidades
                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<?php
$st->close();

require __DIR__ . '/includes/footer.php';
?>

