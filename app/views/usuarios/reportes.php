<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/table-responsive.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/botones.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/form.css">
</head>
<body>
<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>
<main>
    <nav class="breadcrumb">
        <span>Dashboard</span><i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Usuarios</span>
    </nav>
    <div class="main-content">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <p style="margin:0">Usuarios del Sistema</p>
            <a href="<?php echo BASE_URL; ?>/usuarios/registro" class="btn-guardar">
                <i class="fa-solid fa-user-plus"></i> Nuevo usuario
            </a>
        </div>
        <div class="table-responsive">
            <?php if (empty($usuarios)): ?>
                <p>No hay usuarios registrados.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Fecha Registro</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u): ?>
                        <tr>
                            <td><?php echo $u['id']; ?></td>
                            <td><?php echo htmlspecialchars($u['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($u['email']); ?></td>
                            <td><?php echo $u['creado_en']; ?></td>
                            <td class="acciones">
                                <a href="<?php echo BASE_URL; ?>/usuarios/eliminar/<?php echo $u['id']; ?>" class="btn-eliminar"
                                   onclick="return confirm('¿Eliminar usuario?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</main>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>
</html>
