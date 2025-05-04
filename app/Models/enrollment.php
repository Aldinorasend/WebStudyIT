<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrollment extends Model
{
    //
    use HasFactory;
    protected $table = 'enrollments';
    protected $fillable = [
        'UserID',
        'CourseID',
        'Progress',
        
    ];
    public function course()
    {
       return $this->belongsTo(Course::class);
    }
}
