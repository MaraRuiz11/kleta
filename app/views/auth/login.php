<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/login.css">

</head>

<body>
    <div class="card">
        <div class="logo">
            <h1>🍽️ KLETA</h1>
            <p>Sistema de Venta de Comida</p>
        </div>

        <?php if (isset($error) && $error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="field">
                <label for="user">Correo electrónico</label>
                <input id="user" type="text" name="user" placeholder="admin@kleta.com" required>
            </div>
            <div class="field">
                <label for="pass">Contraseña</label>
                <input id="pass" type="password" name="pass" placeholder="••••••••" required>
            </div>
            <button class="btn" type="submit">Ingresar</button>
        </form>
    </div>
</body>

</html>