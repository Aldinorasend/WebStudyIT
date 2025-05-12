<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    //
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'ModulID',
        'EnrollID',
        'FileTask',
        'Status',
    ];

    public function modul()
    {
       return $this->belongsTo(Modul::class);
    }
    public function enrollment()
    {
       return $this->belongsTo(Enrollment::class);
    }
}