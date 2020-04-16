<?php

namespace App\Http\Controllers\Dashboard;

class Message
{

    static public function msg($status, $data)
    {
        switch ($status) {
            case 200:
                return response()->json(['message' => 'ok'], $status);
                break;

            case 201:
                return response()->json($data, $status);
                break;

            case 202:
                return response()->json(['message' => 'aceito'], $status);
                break;

            case 204:
                return response()->json(['message' => 'Nenhum conteúdo'], $status);
                break;

            case 302:
                return response()->json($data, $status);
                break;

            case 404:
                return response()->json(['message' => 'registro nao encontrado'], $status);
                break;

            case 500:
                return response()->json(['message' => $data], $status);
                break;
        }
    }
}
