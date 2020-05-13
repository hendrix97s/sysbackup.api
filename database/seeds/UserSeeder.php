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
            'email' => 'lf.system@outlook.com',
            'password' => Hash::make('Felipe@11041993'),
            'api_token' => hash('sha256',$token)
        ]);
    }
}
