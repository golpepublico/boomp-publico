<?php

namespace Database\Seeders;

use App\Models\Pixel;
use Illuminate\Database\Seeder;

class PixelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pixel::create([
            'store_id' => 2,
            'descricao' => 'Pixel Teste',
            'pixel_key' => '1020965841907054',
            'fl_pixel_cred' => true,
            'fl_pixel_pix' => true,
            'fl_pixel_boleto' => true,
        ]);
    }
}
