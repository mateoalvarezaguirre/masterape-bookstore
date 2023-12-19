<?php

namespace Includes\Classes;

use Includes\Dtos\StoreFileDTO;

abstract class Storage {

    public static function store(StoreFileDTO $dto): bool
    {
        $fullPath = $dto->getBasePath() . $dto->getFileName();

        //echo file_get_contents($dto->getFile());die;

        return move_uploaded_file($dto->getFile(), $fullPath);
    }

}