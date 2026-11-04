<?php

class Asociado
{
    public const RUTA_LOGOS_ASOCIADOS = '/public/images/asociados/';

    private ?int $id = null;
    private string $nombre;
    private string $logo;
    private string $descripcion;

    public function __construct(string $nombre, string $logo, string $descripcion)
    {
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Asociado
    {
        $this->id = $id;
        return $this;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): Asociado
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): Asociado
    {
        $this->logo = $logo;
        return $this;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): Asociado
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getUrl(): string
    {
        return self::RUTA_LOGOS_ASOCIADOS . $this->logo;
    }

    public function __toString(): string
    {
        return $this->descripcion;
    }
}
