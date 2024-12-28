<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class modul extends Model
{
    //
    use HasFactory;
    protected $table = 'modul';
    protected $fillable = [
        'CourseID',
        'title',
        'description',
        'URL',
    ];
}
