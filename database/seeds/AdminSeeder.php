<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
 
    public function run()
    {
        DB::table('admins')->insert([
            'name' => "Luiz",
            'email' => "lf.system@outlook.com"
        ]);
    }
}
