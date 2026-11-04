<?php
require_once __DIR__ . '/../src/entity/imagen.class.php';

$imagenesClientes = [
    new Imagen('client1.jpg', 'MISS BELLA'),
    new Imagen('client2.jpg', 'DON PENO'),
    new Imagen('client3.jpg', 'SWEETY'),
    new Imagen('client4.jpg', 'LADY'),
];

require_once __DIR__ . '/views/about.view.php';
