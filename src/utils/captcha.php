<?php

session_start();
header('Content-Type: image/png');
header('Cache-Control: no-store');

$captcha = '';
$totalCharacteres = random_int(5, 8);
$possiblesLetras = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$captchaFont = __DIR__ . '/FSEX302.ttf';
$captchaFontSize = random_int(30, 40);

if (PHP_OS_FAMILY === 'Windows') {
    $captchaFont = sapi_windows_cp_conv('UTF-8', sapi_windows_cp_get('ansi'), $captchaFont);
}

$caracter = 0;
while ($caracter < $totalCharacteres) {
    $captcha .= substr($possiblesLetras, random_int(0, strlen($possiblesLetras) - 1), 1);
    $caracter++;
}

$text_box = imagettfbbox($captchaFontSize, 0, $captchaFont, $captcha);
$ancho = abs($text_box[2] - $text_box[0]) + 10;
$alto = abs($text_box[5] - $text_box[1]);
$randomLineas = $captchaFontSize > 35 ? 10 : 14;

$imagen = imagecreatetruecolor($ancho, $alto + 20);
$colorBlanco = imagecolorallocate($imagen, 255, 255, 255);
$colorAzul = imagecolorallocate($imagen, 0, 0, 164);
$colorNegro = imagecolorallocate($imagen, 0, 0, 0);
imagefill($imagen, 0, 0, $colorAzul);

for ($contadorLineas = 0; $contadorLineas < $randomLineas; $contadorLineas++) {
    imageline($imagen, random_int(0, $ancho - 1), 0, random_int(0, $ancho - 1), $alto + 19, $colorNegro);
}

imagettftext($imagen, $captchaFontSize, 0, 5 - $text_box[0], 10 - $text_box[5], $colorBlanco, $captchaFont, $captcha);
$_SESSION['captchaGenerado'] = $captcha;
imagepng($imagen);
