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
            'rua' => 'Avenida Luiz Carlos Tunes',
            'cidade' => 'Araras',
            'uf' => 'SP',
            'cep' => '13.606.536',
            'numero' => '4375',
            'complemento' => 'n/a',
            'contato' => '19 99958-3179'
        ]);
    }
}
