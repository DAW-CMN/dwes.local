<?php

session_start();

require_once __DIR__ . '/../src/entity/asociado.class.php';
require_once __DIR__ . '/../src/utils/File.class.php';

$errores = [];
$nombre = '';
$descripcion = '';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim(is_string($_POST['nombre'] ?? null) ? $_POST['nombre'] : '');
    $descripcion = trim(is_string($_POST['descripcion'] ?? null) ? $_POST['descripcion'] : '');

    $captchaIntroducido = is_string($_POST['captcha'] ?? null) ? $_POST['captcha'] : '';

    if ($captchaIntroducido === '') {
        $errores[] = 'Introduzca el código de seguridad.';
    } elseif (!isset($_SESSION['captchaGenerado']) || $_SESSION['captchaGenerado'] !== $captchaIntroducido) {
        $errores[] = '¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.';
    }

    if (!empty($errores)) {
        $nombre = '';
        $descripcion = '';
    } elseif ($nombre === '') {
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
