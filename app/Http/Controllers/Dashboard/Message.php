<?php
 
namespace App\Http\Controllers\Dashboard;

class Message {

    static public function msg($message, $status){
       return response()->json($message,$status);
    }
}

?>