<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - KLETA</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family: Arial, Helvetica, sans-serif; }

        body {
            background: #f0eeee;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-wrapper {
            width: 380px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.13);
            overflow: hidden;
            animation: fadeUp 0.45s ease;
        }

        @keyframes fadeUp {
            from { opacity:0; transform:translateY(18px); }
            to   { opacity:1; transform:translateY(0); }
        }

        .logo-section {
            background: #fff;
            padding: 26px 30px 10px;
            text-align: center;
            border-bottom: 2px solid #4361ee;
        }

        .logo-section img { width: 200px; }

        .form-section {
            padding: 20px 32px 28px;
        }

        .form-section h2 {
            font-size: 13px;
            font-weight: 700;
            color: #444;
            text-align: center;
            letter-spacing: 1px;
            margin-bottom: 18px;
            text-transform: uppercase;
        }

        .error-msg {
            background: #ffe5e5;
            color: #cc0000;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 14px;
        }

        .input-group {
            margin-bottom: 13px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .input-group input {
            width: 100%;
            padding: 11px 16px;
            border: none;
            border-radius: 20px;
            background: #d9d9d9;
            outline: none;
            font-size: 14px;
            transition: background 0.2s;
        }

        .input-group input:focus { background: #c8c8c8; }

        .btn-primary {
            display: block;
            width: 65%;
            margin: 18px auto 10px;
            padding: 11px;
            border: none;
            border-radius: 25px;
            background: #2d00ff;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: 1px;
            transition: background 0.25s, transform 0.2s;
        }

        .btn-primary:hover { background: #1f00b8; transform: scale(1.04); }

        .btn-cancel {
            display: block;
            width: 65%;
            margin: 0 auto;
            padding: 10px;
            border: 2px solid #bbb;
            border-radius: 25px;
            background: transparent;
            color: #666;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: 0.5px;
            text-align: center;
            text-decoration: none;
            transition: border-color 0.2s, color 0.2s;
        }

        .btn-cancel:hover { border-color: #888; color: #333; }

        .bottom-link {
            text-align: center;
            font-size: 12px;
            color: #555;
            margin-top: 14px;
        }

        .bottom-link a {
            color: #2d00ff;
            font-weight: 700;
            text-decoration: none;
        }

        .bottom-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="register-wrapper">

    <div class="logo-section">
        <img src="<?php echo BASE_URL; ?>/public/img/logo-kleta.png" alt="Restaurante Juguería Kleta">
    </div>

    <div class="form-section">

        <h2>Crear Cuenta</h2>

        <?php if (!empty($error)): ?>
            <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="">

            <div class="input-group">
                <label>Name</label>
                <input type="text" name="nombre" placeholder="Tu nombre completo" required
                       value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>">
            </div>

            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="correo@ejemplo.com" required
                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Mínimo 6 caracteres" required>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirm" placeholder="Repite tu contraseña" required>
            </div>

            <button type="submit" class="btn-primary">REGISTRARSE</button>

        </form>

        <a href="<?php echo BASE_URL; ?>/" class="btn-cancel">CANCELAR</a>

        <div class="bottom-link">
            ¿Ya tienes cuenta? <a href="<?php echo BASE_URL; ?>/login">Inicia sesión</a>
        </div>

    </div>
</div>

</body>
</html>
