<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Adress extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'clinic_id',
        'rua',
        'cidade',
        'uf',
        'cep',
        'numero',
        'complemento',
        'contato'
    ];


}
