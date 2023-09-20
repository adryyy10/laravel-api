<?php

namespace App\Interfaces\Resource;

interface GetCollectionRepositoryInterface
{
    public function findAll(): array;
}
