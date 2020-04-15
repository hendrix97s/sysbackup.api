<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Clinic extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'name',
        'cnpj',
        'expert',
        'email',
        'adress_id',
        'status'
    ];
}
