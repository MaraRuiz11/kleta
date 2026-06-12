-- ============================================================
-- BASE DE DATOS: Sistema de Venta de Comida "KLETA"
-- Proyecto Final PHP Web - SENATI
-- ============================================================

CREATE DATABASE IF NOT EXISTS kleta;
USE kleta;

-- ============================================================
-- TABLA 1: usuarios
-- Guarda el administrador o cobrador del sistema
-- ============================================================
CREATE TABLE usuarios (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    nombre     VARCHAR(100) NOT NULL,
    email      VARCHAR(100) UNIQUE NOT NULL,
    password   VARCHAR(255) NOT NULL,  -- guardado como MD5
    creado_en  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================================
-- TABLA 2: clientes
-- Cada persona que come o pide en KLETA
-- ============================================================
CREATE TABLE clientes (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    nombre     VARCHAR(100) NOT NULL,
    telefono   VARCHAR(15),
    direccion  VARCHAR(200),
    tipo_pago  ENUM('diario', 'semanal', 'mensual') NOT NULL DEFAULT 'diario',
    creado_en  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================================
-- TABLA 3: platos
-- Menú de comidas disponibles con su precio
-- ============================================================
CREATE TABLE platos (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nombre      VARCHAR(100) NOT NULL,
    descripcion VARCHAR(200),
    precio      DECIMAL(8, 2) NOT NULL,
    disponible  TINYINT(1) NOT NULL DEFAULT 1  -- 1=sí, 0=no
);

-- ============================================================
-- TABLA 4: consumos
-- Registra qué platos consumió cada cliente por día.
-- ============================================================
CREATE TABLE consumos (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id  INT NOT NULL,
    plato_id    INT NOT NULL,
    cantidad    INT NOT NULL DEFAULT 1,
    precio_unit DECIMAL(8, 2) NOT NULL,  -- precio al momento del consumo
    fecha       DATE NOT NULL,
    notas       VARCHAR(200),
    creado_en   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (plato_id)   REFERENCES platos(id)
);

-- ============================================================
-- TABLA 5: pagos
-- Registra cada pago que realiza un cliente
-- ============================================================
CREATE TABLE pagos (
    id               INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id       INT NOT NULL,
    monto            DECIMAL(8, 2) NOT NULL,
    tipo_comprobante ENUM('boleta', 'factura', 'ninguno') NOT NULL DEFAULT 'ninguno',
    fecha_pago       DATE NOT NULL,
    observacion      VARCHAR(200),
    creado_en        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

-- ============================================================
-- DATOS DE PRUEBA
-- ============================================================

-- Usuario administrador (contraseña: admin123)
-- La contraseña se guarda con MD5, igual que en Login.php
INSERT INTO usuarios (nombre, email, password) VALUES
('Administrador KLETA',   'admin@kleta.com',   MD5('admin123')),
('Carlos Admin',          'carlos@kleta.com',  MD5('carlos123')),
('María Caja',            'maria@kleta.com',   MD5('maria123')),
('Luis Supervisor',       'luis@kleta.com',    MD5('luis123'));

-- Clientes de ejemplo
INSERT INTO clientes (nombre, telefono, direccion, tipo_pago) VALUES
('Juan Pérez',       '987654321',  'Av. Lima 123',         'mensual'),
('María García',     '912345678',  'Jr. Cusco 456',        'semanal'),
('Carlos López',     '955555555',  'Calle Arequipa 789',   'diario'),
('Ana Torres',       '944111222',  'Av. Primavera 101',    'mensual'),
('Pedro Ramírez',    '955222333',  'Jr. Los Olivos 202',   'semanal'),
('Lucía Fernández',  '966333444',  'Calle San Martín 55',  'diario'),
('Miguel Castro',    '977444555',  'Av. Grau 890',         'mensual'),
('Rosa Mendoza',     '988555666',  'Jr. Libertad 450',     'semanal');

-- Platos del menú
INSERT INTO platos (nombre, descripcion, precio) VALUES
('Menú del día',        'Sopa + segundo + refresco',   8.50),   
('Lomo saltado',        'Con arroz y papas fritas',    12.00),  
('Pollo a la brasa',    '1/4 de pollo con papas',      10.00),  
('Jugo de naranja',     'Vaso grande natural',         3.00),   
('Agua mineral',        'Botella 625ml',               2.00),   
('Arroz Chaufa',        'Pollo y verduras salteadas',  11.00),  
('Tallarines Verdes',   'Con bistec apanado',          13.50),  
('Ají de Gallina',      'Con arroz blanco y huevo',    12.50),  
('Ceviche',             'Pescado fresco con camote',   15.00),  
('Inca Kola',           'Botella personal 500ml',      3.50),  
('Chicha Morada',       'Vaso grande helado',          2.50); 

-- Consumos de prueba (Juan Pérez comió hoy)
INSERT INTO consumos (cliente_id, plato_id, cantidad, precio_unit, fecha) VALUES
(1, 1, 1, 8.50, CURDATE()),
(1, 4, 1, 3.00, CURDATE()),
(5, 7, 2, 13.50, CURDATE());

-- Pago de prueba
INSERT INTO pagos (cliente_id, monto, tipo_comprobante, fecha_pago, observacion) VALUES
(1, 11.50, 'boleta', CURDATE(), 'Pago del consumo del día'),
(2, 11.50, 'boleta', CURDATE(), 'Pago del consumo del día'),
(3, 11.50, 'boleta', CURDATE(), 'Pago del consumo del día');