
<?php
require_once __DIR__ . '/config/config.php';

$pageTitle = 'Encuentra tu futuro universitario';
require __DIR__ . '/includes/header.php';
?>

<!-- SECCIÓN PRINCIPAL -->
<section class="hero">
    <div class="container hero-grid">

        <div class="hero-content">

            <span class="eyebrow">
                Tu próximo capítulo empieza aquí
            </span>

            <h1>
                Elige tu futuro.<br>
                <span>Encuentra tu lugar.</span>
            </h1>

            <p>
                Explora universidades, descubre programas
                académicos y conoce oportunidades para dar
                el siguiente paso en tu educación.
            </p>

            <div class="hero-actions">

                <a href="/IntoUni/universidades.php"
                   class="btn btn-primary">
                    Explorar universidades →
                </a>

                <a href="/IntoUni/auth/registro.php"
                   class="btn btn-outline">
                    Crear mi cuenta
                </a>

            </div>

        </div>

        <!-- TARJETA DECORATIVA -->
        <div class="hero-art">

            <div class="art-card">

                <div class="art-icon">🎓</div>

                <span class="tag">
                    Tu futuro, tus decisiones
                </span>

                <h3>Hay un camino para ti.</h3>

                <p>
                    Compara opciones y encuentra la
                    formación que conecta con tus metas.
                </p>

                <div class="art-pills">
                    <span>Universidades</span>
                    <span>Programas</span>
                    <span>Beneficios</span>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- ¿CÓMO FUNCIONA INTOUNI? -->
<section class="section" id="como-funciona">

    <div class="container">

        <div class="section-heading">

            <span class="eyebrow">
                Empieza fácil
            </span>

            <h2>
                Una búsqueda más clara.
                Un futuro con más posibilidades.
            </h2>

            <p>
                IntoUni reúne información útil para
                que tomes decisiones sobre tu educación superior.
            </p>

        </div>

        <div class="feature-grid">

            <!-- UNIVERSIDADES -->
            <article class="feature">

                <div class="feature-icon">🏛️</div>

                <h3>Explora universidades</h3>

                <p class="muted">
                    Consulta instituciones, ubicación,
                    tipo y canales oficiales de contacto.
                </p>

                <a href="/IntoUni/universidades.php"
                   class="card-link">
                    Ver universidades →
                </a>

            </article>

            <!-- PROGRAMAS -->
            <article class="feature">

                <div class="feature-icon">📚</div>

                <h3>Descubre programas</h3>

                <p class="muted">
                    Encuentra carreras, modalidades y
                    duración de los programas disponibles.
                </p>

                <a href="/IntoUni/programas.php"
                   class="card-link">
                    Ver programas →
                </a>

            </article>

            <!-- BENEFICIOS -->
            <article class="feature">

                <div class="feature-icon">🌱</div>

                <h3>Conoce oportunidades</h3>

                <p class="muted">
                    Identifica beneficios educativos
                    asociados a las instituciones.
                </p>

                <a href="/IntoUni/universidades.php"
                   class="card-link">
                    Explorar oportunidades →
                </a>

            </article>

        </div>

    </div>

</section>

<!-- PASOS PARA UTILIZAR INTOUNI -->
<section class="stats">

    <div class="container stats-grid">

        <div>
            <strong>01</strong>
            <span>Explora opciones</span>
        </div>

        <div>
            <strong>02</strong>
            <span>Compara alternativas</span>
        </div>

        <div>
            <strong>03</strong>
            <span>Decide con información</span>
        </div>

    </div>

</section>

<!-- INVITACIÓN AL REGISTRO -->
<section class="section">

    <div class="container">

        <div class="section-heading">

            <span class="eyebrow">
                Tu búsqueda comienza hoy
            </span>

            <h2>
                Las oportunidades están esperando.
            </h2>

            <p>
                Crea una cuenta para guardar los programas
                que te interesan y organizar tu búsqueda.
            </p>

            <a href="/IntoUni/auth/registro.php"
               class="btn btn-primary">
                Comenzar ahora →
            </a>

        </div>

    </div>

</section>

<?php
require __DIR__ . '/includes/footer.php';
?>
