<?php

require_once __DIR__ . '/../src/entity/asociado.class.php';
require_once __DIR__ . '/../src/utils/File.class.php';

$errores = [];
$nombre = '';
$descripcion = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim(is_string($_POST['nombre'] ?? null) ? $_POST['nombre'] : '');
    $descripcion = trim(is_string($_POST['descripcion'] ?? null) ? $_POST['descripcion'] : '');

    if ($nombre === '') {
        $errores[] = 'El nombre es obligatorio';
    }

    if (empty($errores)) {
        try {
            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $logo = new File('logo', $tiposAceptados);
            $logo->saveUploadFile(Asociado::RUTA_LOGOS_ASOCIADOS);
            $asociado = new Asociado($nombre, $logo->getFileName(), $descripcion);
            $mensaje = 'Datos enviados';
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        }
    }
}

require_once __DIR__ . '/views/asociados.view.php';
