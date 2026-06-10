# 🍽️ KLETA — Sistema de Venta de Comida

Proyecto Final PHP Web — SENATI  
Arquitectura MVC sin frameworks externos.

---

## Requisitos

- PHP 8.1 o superior
- MySQL 8.0 o superior
- Servidor web con `mod_rewrite` habilitado (Apache / XAMPP / Laragon)

---

## Instalación

### 1. Coloca el proyecto en tu servidor

Copia la carpeta `kleta/` dentro de tu directorio web, por ejemplo:

```
C:/xampp/htdocs/kleta/
```

### 2. Crea la base de datos

Abre phpMyAdmin (o tu cliente MySQL favorito) e importa el archivo:

```
kleta.sql
```

Esto creará la base de datos `kleta` con sus 5 tablas y datos de prueba.

### 3. Configura el archivo `.env`

Copia `.env.example` como `.env`:

```bash
cp .env.example .env
```

Edita `.env` con tus credenciales:

```
DB_HOST="localhost"
DB_PORT=3306
DB_DATABASE=kleta
DB_USERNAME=root
DB_PASSWORD=

APP_URL=http://localhost/kleta
```

> `APP_URL` debe coincidir exactamente con la URL desde la que accedes al proyecto (sin barra al final).

### 4. Accede al sistema

Abre tu navegador en:

```
http://localhost/kleta
```

**Credenciales de prueba:**

| Campo    | Valor           |
|----------|-----------------|
| Correo   | admin@kleta.com |
| Contraseña | admin123      |

---

## Estructura del proyecto

```
kleta/
├── .env.example          ← Plantilla de configuración
├── .env                  ← Tu configuración local (no subir a Git)
├── .htaccess             ← Reescritura de URLs para el Router
├── kleta.sql             ← Script completo de base de datos
│
├── app/
│   ├── index.php         ← Punto de entrada de la app
│   ├── config/
│   │   └── config.php    ← Carga .env y define constantes
│   ├── core/
│   │   ├── App.php       ← Arranca sesión y Router
│   │   ├── Router.php    ← Lee la URL y despacha al controller
│   │   ├── Controller.php← Clase base con view() y requiereLogin()
│   │   └── Database.php  ← Singleton PDO
│   ├── models/
│   │   ├── Login.php     ← Autenticación sobre tabla usuarios
│   │   ├── Cliente.php   ← CRUD + saldos
│   │   ├── Plato.php     ← CRUD del menú
│   │   ├── Consumo.php   ← Registro de consumos diarios
│   │   └── Pago.php      ← Registro de pagos
│   ├── controllers/
│   │   ├── HomeController.php
│   │   ├── LoginController.php
│   │   ├── LogoutController.php
│   │   ├── DashboardController.php
│   │   ├── ClientesController.php
│   │   ├── PlatosController.php
│   │   ├── ConsumosController.php
│   │   └── PagosController.php
│   └── views/
│       ├── layouts/
│       │   ├── sidebar.php
│       │   ├── header.php
│       │   └── footer.php
│       ├── auth/login.php
│       ├── home/landing.php
│       ├── dashboard/index.php
│       ├── clientes/{index, crear, editar}.php
│       ├── platos/{index, crear, editar}.php
│       ├── consumos/{index, registrar}.php
│       └── pagos/{index, registrar}.php
│
└── public/
    ├── css/
    │   ├── dashboard.css
    │   └── landing.css
    ├── js/
    │   ├── dashboard.js
    │   └── landing.js
    └── video/
        └── donde.mp4     ← Pon aquí tu video de fondo
```

---

## Rutas disponibles

| URL                      | Descripción                        |
|--------------------------|------------------------------------|
| `/`                      | Landing page                       |
| `/login`                 | Iniciar sesión                     |
| `/logout`                | Cerrar sesión                      |
| `/dashboard`             | Panel con estadísticas del día     |
| `/clientes`              | Lista de clientes con saldos       |
| `/clientes/crear`        | Nuevo cliente                      |
| `/clientes/editar/{id}`  | Editar cliente                     |
| `/clientes/eliminar/{id}`| Eliminar cliente                   |
| `/platos`                | Lista del menú                     |
| `/platos/crear`          | Nuevo plato                        |
| `/platos/editar/{id}`    | Editar plato                       |
| `/platos/eliminar/{id}`  | Eliminar plato                     |
| `/consumos`              | Lista de consumos                  |
| `/consumos/registrar`    | Registrar consumo                  |
| `/consumos/eliminar/{id}`| Eliminar consumo                   |
| `/pagos`                 | Lista de pagos                     |
| `/pagos/registrar`       | Registrar pago                     |
| `/pagos/eliminar/{id}`   | Eliminar pago                      |

---

## Base de datos — 5 tablas

| Tabla      | Descripción                                      |
|------------|--------------------------------------------------|
| `usuarios` | Administradores del sistema                      |
| `clientes` | Personas que consumen en KLETA                   |
| `platos`   | Menú con precios                                 |
| `consumos` | Qué comió cada cliente y cuándo                  |
| `pagos`    | Pagos realizados por cada cliente                |

---

## Notas de seguridad

- Las contraseñas se guardan con `MD5()` (compatible con los datos de prueba del SQL).
- Todas las consultas usan **PDO con sentencias preparadas** para evitar SQL Injection.
- Las vistas usan `htmlspecialchars()` para evitar XSS.
- Las rutas protegidas verifican la sesión antes de mostrar contenido.
