CREATE DATABASE IF NOT EXISTS probando;
USE probando;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);
INSERT INTO usuarios (nombre, email)
VALUES ('Juan Perez', 'juan.perez@example.com'),
    ('Maria Gomez', 'maria.gomez@example.com');
INSERT INTO productos (nombre, precio)
VALUES ('Producto A', 10.50),
    ('Producto B', 20.75);