<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KLETA</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family: Arial, Helvetica, sans-serif; }

        body {
            background: #f0eeee;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-wrapper {
            width: 360px;
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
            padding: 28px 30px 10px;
            text-align: center;
            border-bottom: 2px solid #4361ee;
        }

        .logo-section img {
            width: 210px;
        }

        .form-section {
            padding: 22px 32px 26px;
        }

        .error-msg {
            background: #ffe5e5;
            color: #cc0000;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 14px;
        }

        .success-msg {
            background: #e5ffe9;
            color: #007a1f;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 14px;
        }

        .input-group {
            margin-bottom: 14px;
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

        .forgot {
            text-align: right;
            margin-bottom: 18px;
        }

        .forgot a {
            font-size: 11px;
            color: #555;
            text-decoration: none;
        }

        .forgot a:hover { text-decoration: underline; }

        .btn-primary {
            display: block;
            width: 60%;
            margin: 0 auto 10px;
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
            width: 60%;
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

        .divider {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px auto 14px;
            width: 110px;
        }

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

<div class="login-wrapper">

    <div class="logo-section">
        <img src="<?php echo BASE_URL; ?>/public/img/logo-kleta.png" alt="Restaurante Juguería Kleta">
    </div>

    <div class="form-section">

        <?php if (!empty($error)): ?>
            <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (isset($_GET['registered'])): ?>
            <div class="success-msg">¡Cuenta creada! Ya puedes iniciar sesión.</div>
        <?php endif; ?>

        <form method="POST" action="">

            <div class="input-group">
                <label>User:</label>
                <input type="text" name="user" placeholder="Correo electrónico" required
                       value="<?php echo htmlspecialchars($_POST['user'] ?? ''); ?>">
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="pass" placeholder="Contraseña" required>
            </div>

            <div class="forgot">
                <a href="#">¿Olvidaste la contraseña?</a>
            </div>

            <button type="submit" class="btn-primary">INGRESAR</button>

        </form>

        <a href="<?php echo BASE_URL; ?>/" class="btn-cancel">CANCELAR</a>

        <hr class="divider">

        <div class="bottom-link">
            ¿No tienes cuenta? <a href="<?php echo BASE_URL; ?>/register">Regístrate</a>
        </div>

    </div>
</div>

</body>
</html>
