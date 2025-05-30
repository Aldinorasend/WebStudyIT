<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertif extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['EnrollID', 'file_path'];
    public $timestamps = false;
    public function enroll()
    {
       return $this->belongsTo(Enroll::class);
    }
}
