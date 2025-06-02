<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $table = 'modul_discussions';

    protected $fillable = [
        'ModulID',
        'UserID',
        'topics',
        'discussions',
    ];

    // public function replies()
    // {
    //     return $this->hasMany(DiscussionReply::class, 'DiscussionID');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'UserID');
    // }
}
