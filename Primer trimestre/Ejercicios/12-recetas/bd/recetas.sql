-- Creación de la base de datos
CREATE DATABASE recetas;
USE recetas;
-- Tabla de Usuarios
CREATE TABLE Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(50) NOT NULL
);
-- Tabla de Recetas
CREATE TABLE Recetas (
    id_receta INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nombre_receta VARCHAR(100) NOT NULL,
    ingredientes VARCHAR(255) NOT NULL,
    tiempo_preparacion INT NOT NULL,
    dificultad ENUM('Fácil', 'Intermedia', 'Difícil') NOT NULL,
    likes INT DEFAULT 0,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Tabla de LikesRecetas
CREATE TABLE LikesRecetas (
    id_like INT AUTO_INCREMENT PRIMARY KEY,
    id_receta INT NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_receta) REFERENCES Recetas(id_receta) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Insertar usuarios de ejemplo
INSERT INTO Usuarios (nombre_usuario, email, contrasena)
VALUES ('JuanPerez', 'juanperez@example.com', 'juan123'),
    (
        'MariaLopez',
        'marialopez@example.com',
        'maria123'
    ),
    (
        'CarlosDiaz',
        'carlosdiaz@example.com',
        'carlos123'
    );
-- Insertar recetas de ejemplo
INSERT INTO Recetas (
        id_usuario,
        nombre_receta,
        ingredientes,
        tiempo_preparacion,
        dificultad,
        likes
    )
VALUES (
        1,
        'Paella Valenciana',
        'Arroz, pollo, conejo, judía verde, garrofó, tomate, aceite de oliva, sal, agua, azafrán',
        60,
        'Difícil',
        5
    ),
    (
        2,
        'Tacos al Pastor',
        'Tortillas, carne de cerdo, piña, cebolla, cilantro, salsa de chipotle',
        30,
        'Intermedia',
        3
    ),
    (
        3,
        'Sushi Básico',
        'Arroz, alga nori, salmón, pepino, aguacate',
        40,
        'Intermedia',
        8
    );
-- Insertar likes 
INSERT INTO LikesRecetas (id_receta, id_usuario)
VALUES (1, 2),
    (1, 3),
    (2, 1),
    (3, 1),
    (3, 2);