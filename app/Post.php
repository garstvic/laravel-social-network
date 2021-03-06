<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Likes;

class Post extends Model
{
    protected $fillable = [
        'body'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
