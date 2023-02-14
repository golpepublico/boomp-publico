<?php


namespace App\Repositories;

use App\Models\Pixel;
use App\Repositories\AbstractRepository;

class PixelRepository extends AbstractRepository
{
    public function __construct(Pixel $pixel)
    {
        $this->model = $pixel;
    }
}
