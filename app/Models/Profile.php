<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows convention)
    protected $table = 'profiles';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'user_id',
        'profile_picture',
        'bio',
        'birthdate'

    ];

    // Define relationships
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
