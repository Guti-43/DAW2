CREATE DATABASE intercambio;
USE intercambio;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    hashp VARCHAR(255) NOT NULL,
    rol ENUM('usuario', 'admin') DEFAULT 'usuario',
    foto VARCHAR(255) DEFAULT 'usuario_default.png' -- Imagen predeterminada usuario
);
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);
CREATE TABLE articulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_categoria INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    puntos INT NOT NULL,
    imagen VARCHAR(255) DEFAULT 'producto_default.png',
    disponible BOOLEAN DEFAULT FALSE,
    -- Indica si el artículo está disponible para intercambio
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_categoria) REFERENCES categorias(id)
);
CREATE TABLE intercambios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario_ofrece INT NOT NULL,
    id_usuario_recibe INT NOT NULL,
    id_articulo_ofrecido INT NOT NULL,
    id_articulo_recibido INT NOT NULL,
    fecha_intercambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario_ofrece) REFERENCES usuarios(id),
    FOREIGN KEY (id_usuario_recibe) REFERENCES usuarios(id),
    FOREIGN KEY (id_articulo_ofrecido) REFERENCES articulos(id),
    FOREIGN KEY (id_articulo_recibido) REFERENCES articulos(id)
);
CREATE TABLE mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_intercambio INT NOT NULL,
    id_usuario INT NOT NULL,
    tipo_mensaje ENUM('ofrece', 'recibe') NOT NULL,
    FOREIGN KEY (id_intercambio) REFERENCES intercambios(id),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);
-- Insertar datos de prueba
INSERT INTO usuarios (nombre, hashp, rol, foto)
VALUES (
        'CarlosGomez',
        '$2y$10$SGBCWS4gWP3YKmvqAk5IvesSYfDW0EcAaiOwF0JfodUZX0Q4FmqWy',
        -- c123
        'usuario',
        'carlos.png'
    ),
    (
        'MariaLopez',
        '$2y$10$zgJ9qpt9ilPtkezw1Swo0Ovq8tftbgVI7Kf5TjcMyNDXH8r8M0Sqi',
        -- m123
        'usuario',
        'maria.png'
    ),
    (
        'AnaMartinez',
        '$2y$10$KjchjyszwuAd3ZUuRvN5fuZCbOxqEZWPUlSFbvr6itZB3.kipBohu',
        -- a123
        'usuario',
        'ana.png'
    ),
    (
        'LuisFernandez',
        '$2y$10$14L0WCxDNOJUa12QHRmcvuTMyICvBx1W8Uw9aPJKTaFyJ8UryDmd6',
        -- l123
        'usuario',
        'luis.png'
    ),
    (
        'AdminJuan',
        '$2y$10$lWtYtgmfvrRqYOQpQGchs.iZzh4SWq237339bJhTDZuj2ZQI6lEge',
        -- admin123
        'admin',
        'admin.png'
    );
INSERT INTO categorias (nombre)
VALUES ('Electrónica'),
    ('Ropa'),
    ('Libros'),
    ('Juguetes'),
    ('Deportes'),
    ('Herramientas'),
    ('Muebles');
-- Insertar datos de prueba
INSERT INTO articulos (
        id,
        id_usuario,
        id_categoria,
        nombre,
        descripcion,
        puntos,
        imagen,
        disponible
    )
VALUES (
        1,
        2,
        1,
        'Teléfono móvil',
        'Teléfono móvil de última generación con cámara de alta resolución',
        150,
        'movil.png',
        1
    ),
    (
        2,
        1,
        1,
        'Televisor 4K',
        'Televisor de 55 pulgadas con resolución 4K y HDR',
        300,
        'televisor.png',
        0
    ),
    (
        3,
        3,
        2,
        'Chaqueta de cuero',
        'Chaqueta de cuero genuino en perfecto estado',
        80,
        'chaqueta_cuero.png',
        1
    ),
    (
        4,
        2,
        3,
        'Libro de cocina',
        'Libro con recetas internacionales y técnicas de cocina avanzada',
        20,
        'libro_cocina.png',
        0
    ),
    (
        5,
        4,
        4,
        'Rompecabezas 1000 piezas',
        'Rompecabezas de 1000 piezas de un paisaje hermoso',
        15,
        'rompecabezas.png',
        1
    ),
    (
        6,
        3,
        5,
        'Raqueta de tenis',
        'Raqueta profesional de tenis en buen estado',
        50,
        'raqueta.png',
        0
    ),
    (
        7,
        3,
        6,
        'Juego de destornilladores',
        'Set de destornilladores de precisión para reparación de dispositivos electrónicos',
        25,
        'destornilladores.png',
        1
    ),
    (
        8,
        4,
        7,
        'Silla de oficina',
        'Silla ergonómica para oficina con soporte lumbar',
        120,
        'silla_oficina.png',
        0
    ),
    (
        9,
        2,
        1,
        'Tablet',
        'Tablet con pantalla de 10 pulgadas y almacenamiento de 64 GB',
        120,
        'tablet.png',
        1
    ),
    (
        10,
        3,
        1,
        'Auriculares inalámbricos',
        'Auriculares Bluetooth con cancelación de ruido',
        45,
        'auriculares.png',
        0
    ),
    (
        11,
        1,
        2,
        'Abrigo de lana',
        'Abrigo de lana para invierno en excelente estado',
        90,
        'abrigo_lana.png',
        1
    ),
    (
        12,
        4,
        2,
        'Camisa de algodón',
        'Camisa de algodón 100% de talla M',
        20,
        'camisa.png',
        0
    ),
    (
        13,
        1,
        3,
        'Novela de ciencia ficción',
        'Libro de ciencia ficción con historias de mundos futuros',
        25,
        'novela_cf.png',
        1
    ),
    (
        14,
        2,
        3,
        'Diccionario Inglés-Español',
        'Diccionario completo para estudiantes',
        15,
        'diccionario.png',
        0
    ),
    (
        15,
        3,
        4,
        'Muñeco de acción',
        'Muñeco coleccionable de edición limitada',
        60,
        'muneco_accion.png',
        1
    ),
    (
        16,
        4,
        4,
        'Juego de bloques de construcción',
        'Set de bloques de construcción con más de 500 piezas',
        35,
        'bloques.png',
        0
    ),
    (
        17,
        1,
        5,
        'Balón de fútbol',
        'Balón oficial de fútbol, resistente y duradero',
        30,
        'balon.png',
        1
    ),
    (
        18,
        2,
        5,
        'Bicicleta de montaña',
        'Bicicleta con cambios y suspensión para montaña',
        250,
        'bicicleta.png',
        0
    ),
    (
        19,
        3,
        6,
        'Caja de herramientas',
        'Caja de herramientas con varias llaves, alicates y destornilladores',
        80,
        'caja_herramientas.png',
        1
    ),
    (
        20,
        4,
        6,
        'Taladro eléctrico',
        'Taladro de 500W con varias brocas incluidas',
        100,
        'taladro.png',
        0
    ),
    (
        21,
        1,
        7,
        'Mesa de comedor',
        'Mesa de comedor de madera para 6 personas',
        150,
        'mesa.png',
        1
    ),
    (
        22,
        2,
        7,
        'Sofá cama',
        'Sofá que se convierte en cama de tamaño individual',
        200,
        'sofa_cama.png',
        0
    );
INSERT INTO intercambios (
        id_usuario_ofrece,
        id_usuario_recibe,
        id_articulo_ofrecido,
        id_articulo_recibido,
        fecha_intercambio
    )
VALUES (1, 2, 1, 2, '2024-11-14 10:30:00'),
    (2, 3, 3, 4, '2024-11-14 12:15:00'),
    (3, 4, 5, 6, '2024-11-14 14:00:00');
-- Usuario 3 intercambia su artículo 5 con el artículo 6 del Usuario 4
-- Mensajes para el intercambio 1 (Usuario 1 ofrece el artículo 1 y recibe el artículo 2)-- Mensajes para el intercambio 1 (Intercambio entre usuario 1 y usuario 2)
-- Mensajes para el intercambio 2 (Intercambio entre usuario 2 y usuario 3)
INSERT INTO mensajes (
        id_intercambio,
        id_usuario,
        tipo_mensaje
    )
VALUES (1, 1, 'ofrece'),
    (1, 2, 'recibe'),
    (2, 2, 'ofrece'),
    (2, 3, 'recibe'),
    (3, 3, 'ofrece'),
    (3, 4, 'recibe');