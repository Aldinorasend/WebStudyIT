<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modul extends Model
{
    //
    use HasFactory;
    protected $table = 'moduls';
    protected $fillable = [
        'CourseID',
        'title',
        'description',
        'task',
        'assetto',
    ];
    public function course()
    {
       return $this->belongsTo(Course::class);
    }
}