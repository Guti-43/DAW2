CREATE DATABASE IF NOT EXISTS peluqueria;
USE peluqueria;
-- Tabla de usuarios 
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    avatar VARCHAR(255) NOT NULL,
    hashp VARCHAR(255) NOT NULL,
    rol ENUM('administrador', 'cliente') NOT NULL
);
-- Tabla de intervalos 
CREATE TABLE IF NOT EXISTS intervalos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(50) NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL
);
-- Tabla de citas 
CREATE TABLE IF NOT EXISTS citas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    intervalo_id INT NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (intervalo_id) REFERENCES intervalos(id)
);
-- Insertar registros en la tabla de usuarios
-- juan123 maria123 carlos123 ana123
INSERT INTO usuarios (nombre, email, avatar, hashp, rol)
VALUES (
        'Juan Perez',
        'juan.perez@ejemplo.com',
        'avatar1.png',
        '$2y$10$1RQHhlBm1o71XdkuPhb/yOUKPr46BUjsyrRVTKlb1Iu2xgnTq0tNi',
        'administrador'
    ),
    (
        'Maria Lopez',
        'maria.lopez@ejemplo.com',
        'avatar2.png',
        '$2y$10$cchdpfzq02nQu4lNzboD0OYuETXEnGnbvo2WlBkL21l7Oc17njgwm',
        'cliente'
    ),
    (
        'Carlos Sanchez',
        'carlos.sanchez@ejemplo.com',
        'avatar3.png',
        '$2y$10$8NwRclypOUJSKLZAC4XwU.EbNnthYBDXLdB8jJ3./O3tiPTI6DiZ.',
        'cliente'
    ),
    (
        'Ana Martinez',
        'ana.martinez@ejemplo.com',
        'avatar4.png',
        '$2y$10$EhG10i89VORveDziYxcOwu8zmOfCtL4dfKxn9GURS/GHeQyg.43WW',
        'cliente'
    );
-- Insertar registros en la tabla de intervalos por horas
INSERT INTO intervalos (descripcion, hora_inicio, hora_fin)
VALUES ('09:00 - 10:00', '09:00:00', '10:00:00'),
    ('10:00 - 11:00', '10:00:00', '11:00:00'),
    ('11:00 - 12:00', '11:00:00', '12:00:00'),
    ('12:00 - 13:00', '12:00:00', '13:00:00'),
    ('13:00 - 14:00', '13:00:00', '14:00:00'),
    ('14:00 - 15:00', '14:00:00', '15:00:00'),
    ('15:00 - 16:00', '15:00:00', '16:00:00'),
    ('16:00 - 17:00', '16:00:00', '17:00:00');
-- Insertar registros en la tabla de citas
INSERT INTO citas (usuario_id, intervalo_id, fecha)
VALUES (1, 1, '2024-11-14'),
    (2, 2, '2024-11-15'),
    (3, 3, '2024-11-16'),
    (4, 4, '2024-11-17'),
    (1, 5, '2024-11-18'),
    (2, 6, '2024-11-19'),
    (3, 7, '2024-11-20'),
    (4, 8, '2024-11-21'),
    (1, 1, '2024-11-22'),
    (2, 2, '2025-01-23');