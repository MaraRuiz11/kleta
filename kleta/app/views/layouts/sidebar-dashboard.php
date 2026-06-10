<?php
$rutaActual = explode('/', trim($_GET['url'] ?? 'dashboard', '/'))[0] ?: 'dashboard';
?>
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
<div class="overlay"></div>
<aside class="sidebar">
    <div class="sidebar-logo">KLETA</div>
    <ul>
        <li>
            <a href="<?php echo BASE_URL; ?>/dashboard" class="<?php echo $rutaActual === 'dashboard' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-house"></i><span>Inicio</span>
            </a>
        </li>
        <li class="<?php echo $rutaActual === 'clientes' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'clientes' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-users"></i><span>Clientes</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/clientes"><i class="fa-solid fa-clipboard-list"></i> Reporte</a>
                <a href="<?php echo BASE_URL; ?>/clientes/registro"><i class="fa-solid fa-user-plus"></i> Registrar</a>
            </div>
        </li>
        <li class="<?php echo $rutaActual === 'platos' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'platos' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-utensils"></i><span>Platos</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/platos"><i class="fa-solid fa-clipboard-list"></i> Reporte</a>
                <a href="<?php echo BASE_URL; ?>/platos/registro"><i class="fa-solid fa-plus"></i> Registrar</a>
            </div>
        </li>
        <li class="<?php echo $rutaActual === 'consumos' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'consumos' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-bowl-food"></i><span>Consumos</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/consumos"><i class="fa-solid fa-clipboard-list"></i> Reporte</a>
                <a href="<?php echo BASE_URL; ?>/consumos/registro"><i class="fa-solid fa-plus"></i> Registrar</a>
            </div>
        </li>
        <li class="<?php echo $rutaActual === 'pagos' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'pagos' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-money-bill-wave"></i><span>Pagos</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/pagos"><i class="fa-solid fa-clipboard-list"></i> Reporte</a>
                <a href="<?php echo BASE_URL; ?>/pagos/registro"><i class="fa-solid fa-plus"></i> Registrar</a>
            </div>
        </li>
        <li class="<?php echo $rutaActual === 'usuarios' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'usuarios' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-user-cog"></i><span>Usuarios</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/usuarios"><i class="fa-solid fa-clipboard-list"></i> Reporte</a>
                <a href="<?php echo BASE_URL; ?>/usuarios/registro"><i class="fa-solid fa-user-plus"></i> Registrar</a>
            </div>
        </li>
        <li class="nav-logout">
            <a href="<?php echo BASE_URL; ?>/logout" id="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i><span>Cerrar sesión</span>
            </a>
        </li>
    </ul>
</aside>
<script src="<?php echo BASE_URL; ?>/public/js/dropdown.js"></script>
