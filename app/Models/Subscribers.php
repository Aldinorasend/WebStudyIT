<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    //
    protected $table = 'subscribers';
    protected $fillable = [
        'email',
        'status',
    ];
    public $timestamps = false;
}
