<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'store_id'      => 2,
            'coupon'        => 'CARIRI20',
            'discount'      => 20,
            'expires_in'    => '2022-12-31 23:59:59',
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Coupon::create([
            'store_id'      => 3,
            'coupon'        => 'JULIO50',
            'discount'      => 50,
            'expires_in'    => '2022-12-31 23:59:59',
            'created_at'    => '2022-10-10 23:46:05',
        ]);
    }
}
