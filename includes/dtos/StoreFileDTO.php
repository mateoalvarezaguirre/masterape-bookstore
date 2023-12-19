<?php

namespace Includes\Dtos;

class StoreFileDTO 
{
    public function __construct(
        private readonly string $basePath = './images/',
        private readonly string $fileName,
        private readonly string $file
    ) {}

    public function getBasePath(): string 
    {
        return $this->basePath;
    }

    public function getFileName(): string 
    {
        return $this->fileName;
    }

    public function getFile(): string
    {
        return $this->file;
    }
}