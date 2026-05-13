<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Editar Cliente</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>
<body>

<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<main>
    <nav class="breadcrumb">
        <span>Clientes</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Editar Cliente</span>
    </nav>

    <div class="main-content" style="max-width:520px">
        <p>Editar cliente: <?php echo htmlspecialchars($cliente['nombre']); ?></p>

        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text" name="nombre" class="form-control"
                       value="<?php echo htmlspecialchars($cliente['nombre']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control"
                       value="<?php echo htmlspecialchars($cliente['telefono'] ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control"
                       value="<?php echo htmlspecialchars($cliente['direccion'] ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Pago</label>
                <select name="tipo_pago" class="form-select">
                    <?php foreach (['diario', 'semanal', 'mensual'] as $tp): ?>
                        <option value="<?php echo $tp; ?>" <?php echo $cliente['tipo_pago'] === $tp ? 'selected' : ''; ?>>
                            <?php echo ucfirst($tp); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="<?php echo BASE_URL; ?>/clientes" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
