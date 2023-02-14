<?php


namespace App\Repositories;

use App\Models\Coupon;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\DB;

class CouponRepository extends AbstractRepository
{
    public function __construct(Coupon $coupon)
    {
        $this->model = $coupon;
    }

}
