<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Poppins',sans-serif;background:#f5f5f5;min-height:100vh;display:flex;align-items:center;justify-content:center}
        .card{background:#fff;border-radius:16px;padding:40px 36px;width:100%;max-width:400px;box-shadow:0 4px 24px rgba(0,0,0,.08)}
        .logo{text-align:center;margin-bottom:28px}
        .logo h1{font-size:2rem;color:#4f46e5;font-weight:700}
        .logo p{color:#999;font-size:.875rem;margin-top:4px}
        label{display:block;font-size:.8rem;font-weight:600;color:#1a1a1a;margin-bottom:6px}
        input{width:100%;padding:10px 14px;border:1px solid #e0e0e0;border-radius:8px;font-size:.9rem;font-family:inherit;outline:none;transition:border .2s}
        input:focus{border-color:#4f46e5}
        .field{margin-bottom:18px}
        .btn{width:100%;padding:12px;background:#4f46e5;color:#fff;border:none;border-radius:8px;font-size:.95rem;font-weight:600;font-family:inherit;cursor:pointer;transition:background .2s;margin-top:8px}
        .btn:hover{background:#4338ca}
        .error{background:#fde8e8;color:#e74c3c;padding:10px 14px;border-radius:8px;font-size:.85rem;margin-bottom:16px}
    </style>
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
