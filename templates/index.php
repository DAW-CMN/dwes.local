<?php
require_once __DIR__ . '/../src/entity/imagen.class.php';

$imagenesHome = [
    new Imagen('1.jpg', 'descripción imagen 1', 1, 456, 610, 130),
    new Imagen('2.jpg', 'descripción imagen 2', 1, 1000, 500, 100),
    new Imagen('3.jpg', 'descripción imagen 3', 1, 1000, 500, 100),
    new Imagen('4.jpg', 'descripción imagen 4', 1, 1000, 500, 100),
    new Imagen('5.jpg', 'descripción imagen 5', 2, 1000, 500, 100),
    new Imagen('6.jpg', 'descripción imagen 6', 2, 1000, 500, 100),
    new Imagen('7.jpg', 'descripción imagen 7', 2, 1000, 500, 100),
    new Imagen('8.jpg', 'descripción imagen 8', 2, 1000, 500, 100),
    new Imagen('9.jpg', 'descripción imagen 9', 3, 1000, 500, 100),
    new Imagen('10.jpg', 'descripción imagen 10', 3, 1000, 500, 100),
    new Imagen('11.jpg', 'descripción imagen 11', 3, 1000, 500, 100),
    new Imagen('12.jpg', 'descripción imagen 12', 3, 1000, 500, 100),
];

require_once __DIR__ . '/views/index.view.php';
