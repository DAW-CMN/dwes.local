<?php

class Imagen
{
    public const RUTA_IMAGENES_PORTFOLIO = '/public/images/index/portfolio/';
    public const RUTA_IMAGENES_GALERIA = '/public/images/index/gallery/';
    public const RUTA_IMAGENES_CLIENTES = '/public/images/clients/';

    private int $id = 0;
    private string $nombre;
    private string $descripcion;
    private int $categoria;
    private int $numVisualizaciones;
    private int $numLikes;
    private int $numDownloads;

    public function __construct(
        string $nombre,
        string $descripcion,
        int $categoria = 0,
        int $numVisualizaciones = 0,
        int $numLikes = 0,
        int $numDownloads = 0
    ) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Imagen
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): Imagen
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getCategoria(): int
    {
        return $this->categoria;
    }

    public function setCategoria(int $categoria): Imagen
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function getNumVisualizaciones(): int
    {
        return $this->numVisualizaciones;
    }

    public function setNumVisualizaciones(int $numVisualizaciones): Imagen
    {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }

    public function getNumLikes(): int
    {
        return $this->numLikes;
    }

    public function setNumLikes(int $numLikes): Imagen
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    public function getNumDownloads(): int
    {
        return $this->numDownloads;
    }

    public function setNumDownloads(int $numDownloads): Imagen
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    public function __toString(): string
    {
        return $this->descripcion;
    }

    public function getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }

    public function getUrlGaleria(): string
    {
        return self::RUTA_IMAGENES_GALERIA . $this->getNombre();
    }

    public function getUrlClientes(): string
    {
        return self::RUTA_IMAGENES_CLIENTES . $this->getNombre();
    }
}
