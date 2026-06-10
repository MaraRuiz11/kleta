<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registrar Plato</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/form.css">
</head>
<body>
<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>
<main>
    <nav class="breadcrumb">
        <span>Dashboard</span><i class="fa-solid fa-chevron-right"></i>
        <a href="<?php echo BASE_URL; ?>/platos">Platos</a><i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Registrar</span>
    </nav>
    <div class="main-content">
        <section class="registro-form">
            <h1>Registrar Plato</h1>
            <form action="<?php echo BASE_URL; ?>/platos/guardar" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre del plato</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="form-group">
                    <label for="precio">Precio (S/)</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0" required>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" name="disponible" value="1" checked> Disponible
                    </label>
                </div>
                <button type="submit" class="btn-guardar">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar plato
                </button>
            </form>
        </section>
    </div>
</main>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>
</html>
