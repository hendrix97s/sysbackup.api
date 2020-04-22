<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //

    public function __construct()
    {
    }

    public function update()
    {
    }


    public function key()
    {
        try {
            $token = Str::random(80);
            $result = Auth::user()->forcefill([
                'api_token' => hash('sha256',$token)
            ])->save();

            if ($result) {
                return Message::msg(201, $token);
            } else {
                return Message::msg(404, ["message" => "erro"]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return Message::msg(500, $th->getMessage());
        }
    }
}
