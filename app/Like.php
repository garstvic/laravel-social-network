<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Post;

class Like extends Model
{
    protected $fillable = [
        'like', 'user_id', 'post_id'
    ];
    
    public function post()
    {
        return $this->belongsTo(User::class);
    }
    
    public function user()
    {
        return $this->belongsTo(Post::class);
    }
}
