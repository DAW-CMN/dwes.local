<?php

require_once __DIR__ . '/../src/entity/imagen.class.php';
require_once __DIR__ . '/../src/utils/File.class.php';
require_once __DIR__ . '/../src/exceptions/FileException.class.php';

$errores = [];
$titulo = '';
$descripcion = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $limitePost = ini_parse_quantity(ini_get('post_max_size'));
        if ($limitePost > 0 && (int) ($_SERVER['CONTENT_LENGTH'] ?? 0) > $limitePost) {
            throw new FileException('El fichero es demasiado grande');
        }

        $titulo = trim(is_string($_POST['titulo'] ?? null) ? $_POST['titulo'] : '');
        $descripcion = trim(is_string($_POST['descripcion'] ?? null) ? $_POST['descripcion'] : '');

        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);
        $mensaje = 'Datos enviados';
    } catch (FileException $fileException) {
        $errores[] = $fileException->getMessage();
    }
}

require_once __DIR__ . '/views/galeria.view.php';
