<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PruebaDatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::factory(5)->create();
        Pedido::factory(10)->create();
    }
}
