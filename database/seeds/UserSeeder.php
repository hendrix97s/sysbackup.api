<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $token = Str::random(80);
        echo $token;
        echo "\n";
        DB::table('users')->insert([
            'name' => 'Luiz Felipe',
            'email' => 'admin@teste.com',
            'password' => Hash::make('123456789'),
            'api_token' => hash('sha256',$token)
        ]);
    }
}
