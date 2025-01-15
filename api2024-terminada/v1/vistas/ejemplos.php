<?php
function style_json($json)
{
    // Convertir el array en JSON con formato legible
    $json = json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
    $json = htmlspecialchars($json, ENT_NOQUOTES);

    // Estilos para cada parte del JSON
    $json = preg_replace('/"([^"]+)"\s*:\s*/', '<span class="json-key" style="color: #ffa500;">"$1"</span>:', $json); // Claves (Naranja)
    $json = preg_replace('/:\s*"([^"]+)"/', ':<span class="json-string" style="color: #28a745;">"$1"</span>', $json); // Strings (Verde brillante)
    $json = preg_replace('/:\s*([0-9]+)/', ':<span class="json-number" style="color: #ff0000;">$1</span>', $json); // Números (Amarillo)

    // Cambiar colores para llaves y corchetes
    $json = str_replace(
        ['{', '}', '[', ']'],
        [
            '<span class="json-brace" style="color: #00bfff;">{</span>', // Llaves abiertas (Azul cielo)
            '<span class="json-brace" style="color: #00bfff;">}</span>', // Llaves cerradas (Azul cielo)
            '<span class="json-bracket" style="color: #ff1493;">[</span>', // Corchetes abiertos (Rosa fuerte)
            '<span class="json-bracket" style="color: #ff1493;">]</span>'  // Corchetes cerrados (Rosa fuerte)
        ],
        $json
    );
    return $json;
}

$rutaimagen = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['SCRIPT_NAME'], 3) . '/utiles/img/';
$json1 = [
    [
        "id" => 1,
        "nombre" => "Pan blanco",
        "energia" => "74",
        "proteina" => "3",
        "hidratocarbono" => "14",
        "fibra" => "1",
        "grasatotal" => "1",
        "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/panBlanco.png"
    ],
    [
        "id" => 2,
        "nombre" => "Pan integral",
        "energia" => "65",
        "proteina" => "3",
        "hidratocarbono" => "9",
        "fibra" => "7",
        "grasatotal" => "1",
        "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/panIntegral.png"
    ],
    [
        "id" => 3,
        "nombre" => "Azúcar",
        "energia" => "150",
        "proteina" => "34",
        "hidratocarbono" => "34",
        "fibra" => "0",
        "grasatotal" => "123",
        "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/azucar.png"
    ],
    [
        "id" => 4,
        "nombre" => "Refresco",
        "energia" => "136",
        "proteina" => "0",
        "hidratocarbono" => "35",
        "fibra" => "0",
        "grasatotal" => "0",
        "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/refresco.png"
    ],
    [
        "id" => 5,
        "nombre" => "Huevo",
        "energia" => "156",
        "proteina" => "13",
        "hidratocarbono" => "13",
        "fibra" => "0",
        "grasatotal" => "12",
        "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/huevo.png"
    ]
];

$json2 =
    [
        [
            "id" => 4,
            "nombre" => "Refresco",
            "energia" => "136",
            "proteina" => "0",
            "hidratocarbono" => "35",
            "fibra" => "0",
            "grasatotal" => "0",
            "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/refresco.png"
        ],
        [
            "id" => 5,
            "nombre" => "Huevo",
            "energia" => "156",
            "proteina" => "13",
            "hidratocarbono" => "13",
            "fibra" => "0",
            "grasatotal" => "12",
            "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/huevo.png"
        ]
    ];

$json3 =
    [
        "id" => 5,
        "nombre" => "Huevo",
        "energia" => "156",
        "proteina" => "13",
        "hidratocarbono" => "13",
        "fibra" => "0",
        "grasatotal" => "12",
        "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/huevo.png"
    ];

$json4 =
    [
        [
            "id" => 2,
            "nombre" => "Pan integral",
            "energia" => "65",
            "proteina" => "3",
            "hidratocarbono" => "9",
            "fibra" => "7",
            "grasatotal" => "1",
            "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/panIntegral.png"
        ],
        [
            "id" => 1,
            "nombre" => "Pan blanco",
            "energia" => "74",
            "proteina" => "3",
            "hidratocarbono" => "14",
            "fibra" => "1",
            "grasatotal" => "1",
            "imagen" => "http://localhost:80/xClase/asd/api2024/imagenes/panBlanco.png"
        ]
    ];

$json5 = [
    "nombre" => "Nombre de alimento",
    "energia" => "100",
    "proteina" => "5",
    "hidratocarbono" => "20",
    "fibra" => "3",
    "grasatotal" => "2",
    "imagen" => "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUA..."
];

$json6 =
    [
        "idNuevoRegistro" => 53
    ];

$json7 = [
    "energia" => "52",
    "proteina" => "0.3",
    "imagen" => "data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAAAAAAAD/4QBaRXhpZgAATU0AKgAAAAgA..."
];

$json8 = [
    "codigo" => "OK",
    "mensaje" => "El registro ha sido borrado correctamente.",
    "datos" => [
        "id" => 7,
        "nombre" => "nombre_del_archivo.jpg",
        "ruta" => "/ruta/al/archivo/nombre_del_archivo.jpg"
    ]
];
