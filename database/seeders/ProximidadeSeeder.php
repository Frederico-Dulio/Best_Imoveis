<?php

namespace Database\Seeders;

use App\Models\Proximidade;
use Illuminate\Database\Seeder;

class ProximidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proximidade::create(['nome'=>'Academia']);
        Proximidade::create(['nome'=>'Bombeiro']);
        Proximidade::create(['nome'=>'Banco']);
        Proximidade::create(['nome'=>'Cinema']);
        Proximidade::create(['nome'=>'Corrreios']);
        Proximidade::create(['nome'=>'Escola']);
        Proximidade::create(['nome'=>'Estacionamento']);
        Proximidade::create(['nome'=>'Farmácia']);
        Proximidade::create(['nome'=>'Hospital']);
        Proximidade::create(['nome'=>'Padaria']);
        Proximidade::create(['nome'=>'Parque']);
        Proximidade::create(['nome'=>'Paragem de Autocarros']);
        Proximidade::create(['nome'=>'Paragem de Combóio']);
        Proximidade::create(['nome'=>'Paragem de Táxis']);
        Proximidade::create(['nome'=>'Bombas de Combustível']);
        Proximidade::create(['nome'=>'Posto Policial']);
        Proximidade::create(['nome'=>'Restaurante']);
        Proximidade::create(['nome'=>'Shopping']);
        Proximidade::create(['nome'=>'Supermercado']);
    }
}
