<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('adresses')->insert([
            'rua' => 'fausto silva',
            'cidade' => 'Araras',
            'uf' => 'SP',
            'cep' => '13.600.000',
            'numero' => '330',
            'complemento' => 'n/a',
            'contato' => '19 99958-3179'
        ]);
    }
}
