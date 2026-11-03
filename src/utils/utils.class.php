<?php

class Utils
{
    public static function esOpcionMenuActiva(string $opcion): bool
    {
        $rutaActual = explode('?', $_SERVER['REQUEST_URI'], 2)[0];
        $segmentos = explode('/', $rutaActual);
        $paginaActual = '/' . $segmentos[count($segmentos) - 1];

        return $paginaActual === $opcion;
    }
}
