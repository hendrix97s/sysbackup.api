<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'adress_id' => '1',
            'name' => 'Owner',
            'email' => 'owner@teste.com',
            'password' => Hash::make('123456789'),
            'cnpj' => '13.342.493/0001-00',
            'type' => 'owner'
        ]);
    }
}
