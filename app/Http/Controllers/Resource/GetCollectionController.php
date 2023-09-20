<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Interfaces\Resource\GetCollectionRepositoryInterface;

class GetCollectionController extends Controller
{

    private GetCollectionRepositoryInterface $getCollectionRepository;

    public function __construct(GetCollectionRepositoryInterface $getCollectionRepository)
    {
        $this->getCollectionRepository = $getCollectionRepository;
    }

    public function getCollection(): array
    {
        return $this->getCollectionRepository->findAll();
    }

}
