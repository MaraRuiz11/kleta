# KLETA — Sistema de Gestión de Restaurante

---

## Autenticación

El sistema requiere inicio de sesión para acceder a cualquier módulo. Todas las rutas están protegidas mediante `requiereLogin()`, que verifica si existe una sesión activa. Si el usuario no está logueado, es redirigido automáticamente al login.

---

## CRUD por Módulo

---

### 1. Clientes (`/clientes`)

Gestiona los clientes del negocio.

| Operación | Método | Ruta | Descripción |
|-----------|--------|------|-------------|
| Listar | GET | `/clientes` | Muestra todos los clientes con sus saldos pendientes |
| Crear | GET/POST | `/clientes/crear` | Formulario para registrar un nuevo cliente |
| Editar | GET/POST | `/clientes/editar/{id}` | Formulario para modificar los datos de un cliente existente |
| Eliminar | GET | `/clientes/eliminar/{id}` | Elimina un cliente por su ID |

---

### 2. Platos (`/platos`)

Gestiona el menú o carta de platos disponibles.

| Operación | Método | Ruta | Descripción |
|-----------|--------|------|-------------|
| Listar | GET | `/platos` | Muestra todos los platos registrados |
| Crear | GET/POST | `/platos/crear` | Formulario para agregar un nuevo plato al menú |
| Editar | GET/POST | `/platos/editar/{id}` | Formulario para modificar un plato existente |
| Eliminar | GET | `/platos/eliminar/{id}` | Elimina un plato por su ID |

---

### 3. Consumos (`/consumos`)

Registra qué platos ha consumido cada cliente.

| Operación | Método | Ruta | Descripción |
|-----------|--------|------|-------------|
| Listar | GET | `/consumos` | Muestra todos los consumos registrados |
| Registrar | GET/POST | `/consumos/registrar` | Formulario para registrar un nuevo consumo |
| Eliminar | GET | `/consumos/eliminar/{id}` | Elimina un consumo por su ID |

Nota: Los consumos no tienen edición directa. Si hay un error, se elimina y se vuelve a registrar.

---

### 4. Pagos (`/pagos`)

Registra los pagos realizados por los clientes.

| Operación | Método | Ruta | Descripción |
|-----------|--------|------|-------------|
| Listar | GET | `/pagos` | Muestra todos los pagos registrados |
| Registrar | GET/POST | `/pagos/registrar` | Formulario para registrar un nuevo pago |
| Eliminar | GET | `/pagos/eliminar/{id}` | Elimina un pago por su ID |

Nota: Los pagos tampoco tienen edición directa, solo registro y eliminación.

---

### 5. Usuarios (`/usuarios`)

Gestiona los usuarios del sistema (administradores).

| Operación | Método | Ruta | Descripción |
|-----------|--------|------|-------------|
| Listar | GET | `/usuarios` | Muestra el reporte de todos los usuarios registrados |
| Registrar | GET | `/usuarios/registro` | Formulario para crear un nuevo usuario |
| Guardar | POST | `/usuarios/guardar` | Procesa y guarda el nuevo usuario en la base de datos |
| Eliminar | GET | `/usuarios/eliminar/{id}` | Elimina un usuario por su ID |

---

## Estructura del Proyecto

```
kleta/
├── app/
│   ├── config/         -> Configuración de base de datos y URL base
│   ├── controllers/    -> Lógica de cada módulo (CRUD)
│   ├── core/           -> App, Controller base, Database, Router
│   ├── models/         -> Acceso a datos (Cliente, Plato, Consumo, Pago, Usuario)
│   └── views/          -> Vistas HTML de cada módulo
├── public/
│   └── css/            -> Estilos del sistema
├── .env                -> Variables de entorno (BD, URL)
└── .htaccess           -> Redirección de rutas
```

---

## Configuración

Copiar el archivo `.env.example` a `.env` y configurar los valores:

```env
APP_URL=http://localhost/kleta
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=kleta
DB_USERNAME=root
DB_PASSWORD=
```

---

## Tecnologías

- PHP 8+ (sin frameworks)
- MySQL / MariaDB
- Arquitectura MVC artesanal
- PDO para conexión a base de datos
- Sesiones nativas de PHP para autenticación
