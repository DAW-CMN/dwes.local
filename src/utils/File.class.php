<?php

require_once __DIR__ . '/../exceptions/FileException.class.php';

class File
{
    private array $file;
    private string $fileName = '';

    /**
     * @param string $fileName
     * @param array $arrTypes
     * @throws FileException
     */
    public function __construct(string $fileName, array $arrTypes)
    {
        if (!isset($_FILES[$fileName])) {
            throw new FileException('Debes seleccionar un fichero');
        }

        $this->file = $_FILES[$fileName];

        if (!isset($this->file['error']) || !is_int($this->file['error'])) {
            throw new FileException('No se ha podido subir el fichero');
        }

        switch ($this->file['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new FileException('El fichero es demasiado grande');
            case UPLOAD_ERR_PARTIAL:
                throw new FileException('No se ha podido subir el fichero completo');
            case UPLOAD_ERR_NO_FILE:
                throw new FileException('Debes seleccionar un fichero');
            default:
                throw new FileException('No se ha podido subir el fichero');
        }

        if (!isset($this->file['tmp_name'], $this->file['name'])
            || !is_string($this->file['tmp_name'])
            || !is_string($this->file['name'])
            || !is_file($this->file['tmp_name'])) {
            throw new FileException('No se ha podido subir el fichero');
        }

        $tipo = (new finfo(FILEINFO_MIME_TYPE))->file($this->file['tmp_name']);
        $extensiones = [
            'image/jpeg' => ['jpg', 'jpeg'],
            'image/gif' => ['gif'],
            'image/png' => ['png'],
        ];
        $extension = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));

        if (!in_array($tipo, $arrTypes, true)
            || !in_array($extension, $extensiones[$tipo] ?? [], true)) {
            throw new FileException('Tipo de fichero no soportado');
        }
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $rutaDestino
     * @return void
     * @throws FileException
     */
    public function saveUploadFile(string $rutaDestino): void
    {
        if (!is_uploaded_file($this->file['tmp_name'])) {
            throw new FileException('El archivo no ha sido subido mediante un formulario.');
        }

        $nombreOriginal = basename(str_replace('\\', '/', $this->file['name']));
        $nombreBase = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($nombreOriginal, PATHINFO_FILENAME));
        $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
        $nombreSeguro = ($nombreBase !== '' ? $nombreBase : 'imagen') . '.' . $extension;
        $this->fileName = $nombreSeguro;

        $directorio = rtrim($_SERVER['DOCUMENT_ROOT'], '/\\') . '/' . trim($rutaDestino, '/\\') . '/';

        if (!is_dir($directorio) || !is_writable($directorio)) {
            throw new FileException('No se puede mover el archivo a su destino');
        }

        $prefijo = time();
        $intento = 0;
        while (file_exists($directorio . $this->fileName)) {
            $intento++;
            $this->fileName = $prefijo . '_' . $intento . '_' . $nombreSeguro;
        }

        if (!move_uploaded_file($this->file['tmp_name'], $directorio . $this->fileName)) {
            throw new FileException('No se puede mover el archivo a su destino');
        }
    }
}
