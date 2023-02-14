<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          => 'App e Software',
            'store_id'      => 1,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'App e Software',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Animais e Plantas',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Artes e Entretenimento',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Automotivo',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Beleza e Saúde',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Casa e Jardim',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Celulares e Telefones',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Computadores e Acessórios',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Eletrodomésticos',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Eletrônicos e Eletroportáteis',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Esporte e Lazer',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Ferramentas e Materiais de Construção',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Games',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Informática',
            'store_id'      => 2,
            'created_at'    => '2022-10-10 23:46:05',
        ]);


        Category::create([
            'name'          => 'Animais e Plantas',
            'store_id'      => 3,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Artes e Entretenimento',
            'store_id'      => 3,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Automotivo',
            'store_id'      => 3,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Beleza e Saúde',
            'store_id'      => 3,
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        Category::create([
            'name'          => 'Casa e Jardim',
            'store_id'      => 3,
            'created_at'    => '2022-10-10 23:46:05',
        ]);
    }
}