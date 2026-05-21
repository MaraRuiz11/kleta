<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Platos</title>
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
        <span id="breadcrumb-page">Platos</span>
    </nav>
    <div class="main-content">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <p style="margin:0">Menú de Platos</p>
            <a href="<?php echo BASE_URL; ?>/platos/registro" class="btn-guardar">
                <i class="fa-solid fa-plus"></i> Nuevo plato
            </a>
        </div>
        <div class="table-responsive">
            <?php if (empty($platos)): ?>
                <p>No hay platos registrados.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Disponible</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($platos as $p): ?>
                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo htmlspecialchars($p['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($p['descripcion']); ?></td>
                            <td>S/ <?php echo number_format($p['precio'], 2); ?></td>
                            <td>
                                <span class="badge badge-<?php echo $p['disponible'] ? 'si' : 'no'; ?>">
                                    <?php echo $p['disponible'] ? 'Sí' : 'No'; ?>
                                </span>
                            </td>
                            <td class="acciones">
                                <a href="<?php echo BASE_URL; ?>/platos/editar/<?php echo $p['id']; ?>" class="btn-editar"><i class="fa-solid fa-pen"></i></a>
                                <a href="<?php echo BASE_URL; ?>/platos/eliminar/<?php echo $p['id']; ?>" class="btn-eliminar"
                                   onclick="return confirm('¿Eliminar plato?')"><i class="fa-solid fa-trash"></i></a>
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
