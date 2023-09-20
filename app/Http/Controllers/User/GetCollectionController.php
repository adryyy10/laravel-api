<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\User\GetCollectionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class GetCollectionController extends Controller
{

    private GetCollectionRepositoryInterface $getCollectionRepository;

    public function __construct(GetCollectionRepositoryInterface $getCollectionRepository)
    {
        $this->getCollectionRepository = $getCollectionRepository;
    }

    public function getCollection(): Collection
    {
        return $this->getCollectionRepository->findAll();
    }

}
