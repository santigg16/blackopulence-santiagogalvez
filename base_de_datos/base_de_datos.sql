-- Tabla para sudaderas
CREATE TABLE sudaderas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    color VARCHAR(50),
    talla VARCHAR(10),
    precio DECIMAL(10, 2)
);

-- Insertar algunos datos de ejemplo
INSERT INTO sudaderas (nombre, color, talla, precio) VALUES
('Sudadera 1', 'Negro', 'M', 39.99),
('Sudadera 2', 'Blanco', 'L', 44.99),
('Sudadera 3', 'Rojo', 'S', 49.99),
('Sudadera 4', 'Azul', 'XL', 54.99),
('Sudadera 5', 'Verde', 'XS', 59.99);

-- Tabla para gorras
CREATE TABLE gorras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    color VARCHAR(50),
    talla VARCHAR(10),
    precio DECIMAL(10, 2)
);

-- Insertar algunos datos de ejemplo
INSERT INTO gorras (nombre, color, talla, precio) VALUES
('Gorra 1', 'Negro', 'Única', 14.99),
('Gorra 2', 'Blanco', 'Única', 19.99),
('Gorra 3', 'Rojo', 'Única', 24.99),
('Gorra 4', 'Azul', 'Única', 29.99),
('Gorra 5', 'Verde', 'Única', 34.99);

-- Tabla para chaquetas
CREATE TABLE chaquetas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    color VARCHAR(50),
    talla VARCHAR(10),
    precio DECIMAL(10, 2)
);

-- Insertar algunos datos de ejemplo
INSERT INTO chaquetas (nombre, color, talla, precio) VALUES
('Chaqueta 1', 'Negro', 'M', 79.99),
('Chaqueta 2', 'Blanco', 'L', 84.99),
('Chaqueta 3', 'Rojo', 'S', 89.99),
('Chaqueta 4', 'Azul', 'XL', 94.99),
('Chaqueta 5', 'Verde', 'XS', 99.99);
