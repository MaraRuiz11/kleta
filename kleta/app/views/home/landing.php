<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KLETA - Sistema de Venta de Comida</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/landing.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/imagen.css">
</head>

<body>
    <div id="fadeOverlay"></div>

    <?php include __DIR__ . '/../layouts/header.php'; ?>

    <section class="stage">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="<?php echo BASE_URL; ?>/public/video/donde.mp4" type="video/mp4">
        </video>

        <nav class="navbar" id="navbar">
            <a class="brand" href="#">RESTAURANTE JUGUERIA "KLETA"</a>
            <button class="menu-btn" id="menuBtn" aria-label="Abrir menú">
                <i class="bi bi-list"></i>
            </button>
        </nav>

        <div class="hero-content">
            <button class="cta-btn demo-trigger" id="verDemo"
                onclick="window.location.href='<?php echo BASE_URL; ?>/login'">
                Ingresar al sistema
            </button>
        </div>

        <div class="scroll-indicator" id="scrollIndicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <section class="projects-section">
        <div class="project-card">
            <img src="<?php echo BASE_URL; ?>/app/image/gestion_de_clientes.jpg"
                alt="Gestión de Clientes"
                class="project-image">
            <h3 class="project-title">Gestión de Clientes</h3>
            <p class="project-desc">Registra clientes con modalidad de pago diaria, semanal o mensual. Consulta saldos pendientes en tiempo real.</p>
            <a href="<?php echo BASE_URL; ?>/login" class="project-link">Acceder <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="project-card">
            <img src="<?php echo BASE_URL; ?>/app/image/registro_de_consumo.png"
                alt="Registro de Consumos"
                class="project-image">
            <h3 class="project-title">Registro de Consumos</h3>
            <p class="project-desc">Registra qué platos consumió cada cliente por día. El precio se captura automáticamente del menú vigente.</p>
            <a href="<?php echo BASE_URL; ?>/login" class="project-link">Acceder <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="project-card">
            <img src="<?php echo BASE_URL; ?>/app/image/control_de_pagos.png"
                alt="Control de Pagos"
                class="project-image">
            <h3 class="project-title">Control de Pagos</h3>
            <p class="project-desc">Emite boletas o facturas y lleva un registro claro de lo cobrado vs lo consumido por cada cliente.</p>
            <a href="<?php echo BASE_URL; ?>/login" class="project-link">Acceder <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="project-card">
            <img src="<?php echo BASE_URL; ?>/app/image/plato_del_dia.png"
                alt="Platos del Día"
                class="project-image">
            <h3 class="project-title">Platos del Día</h3>
            <p class="project-desc">Gestiona los platos disponibles para el día actual y actualiza su disponibilidad en tiempo real.</p>
            <a href="<?php echo BASE_URL; ?>/login" class="project-link">Acceder <i class="bi bi-arrow-right"></i></a>
        </div>
    </section>

    <?php include __DIR__ . '/../layouts/footer.php'; ?>
    <script src="<?php echo BASE_URL; ?>/public/js/landing.js"></script>
</body>

</html>