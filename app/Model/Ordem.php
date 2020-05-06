<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ordem extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'admin_id',
        'clinic_id',
        'dia',
        'mes',
        'ano',
        'problema',
        'solucao',
        'avaliacao',
        'feedback',
        'type',
        'status'
    ];
}
