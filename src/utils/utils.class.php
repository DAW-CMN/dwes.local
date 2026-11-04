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

    public static function extraeElementosAleatorios(array $lista, int $cantidad): ?array
    {
        if ($cantidad < 1 || count($lista) === 0) {
            return null;
        }

        shuffle($lista);
        $listaNueva = array_chunk($lista, $cantidad);
        return $listaNueva[0];
    }
}
