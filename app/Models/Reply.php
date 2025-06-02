<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $table = 'discussion_replies';

    protected $fillable = [
        'DiscussionID',
        'UserID',
        'subtopic',
        'replies',
    ];

    // public function discussion()
    // {
    //     return $this->belongsTo(Discussion::class, 'DiscussionID');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'UserID');
    // }
}
