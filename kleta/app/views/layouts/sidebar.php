<?php
$rutaActual = explode('/', trim($_GET['url'] ?? 'dashboard', '/'))[0] ?: 'dashboard';
?>

<!-- TOPBAR (solo visible en móvil) -->
<div class="topbar">
    <div class="title-business">
        <span><?php echo htmlspecialchars($usuario['nombre'] ?? 'Usuario'); ?></span>
    </div>
    <div class="btn-menu">
        <button class="hamburger" aria-label="Abrir menú">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
</div>

<!-- OVERLAY -->
<div class="overlay"></div>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">🍽️ KLETA</div>
    <ul>
        <li>
            <a href="<?php echo BASE_URL; ?>/dashboard"
               class="<?php echo $rutaActual === 'dashboard' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-house"></i>
                <span>Inicio</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>/clientes"
               class="<?php echo $rutaActual === 'clientes' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-users"></i>
                <span>Clientes</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>/platos"
               class="<?php echo $rutaActual === 'platos' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-utensils"></i>
                <span>Platos</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>/consumos"
               class="<?php echo $rutaActual === 'consumos' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-clipboard-list"></i>
                <span>Consumos</span>
            </a>
        </li>
        <li>
            <a href="<?php echo BASE_URL; ?>/pagos"
               class="<?php echo $rutaActual === 'pagos' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span>Pagos</span>
            </a>
        </li>
        <li class="nav-logout">
            <a href="<?php echo BASE_URL; ?>/logout" id="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Cerrar sesión</span>
            </a>
        </li>
    </ul>
</aside>
