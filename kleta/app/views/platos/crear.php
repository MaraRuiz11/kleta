<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Nuevo Plato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>
<body>

<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<main>
    <nav class="breadcrumb">
        <span>Platos</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Nuevo Plato</span>
    </nav>

    <div class="main-content" style="max-width:520px">
        <p>Agregar plato al menú</p>

        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Nombre *</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio (S/) *</label>
                <input type="number" name="precio" step="0.01" min="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Disponible</label>
                <select name="disponible" class="form-select">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo BASE_URL; ?>/platos" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
