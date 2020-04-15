<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    //
    use Notifiable;

    protected $fillable = [
        'name',
        'email'
    ];
}
