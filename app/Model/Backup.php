<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Backup extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'name',
        'size',
        'path',
        'hour_backup',
        'clinic_id'
    ];
}

