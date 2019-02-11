<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

use App\Post;
use App\Like;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
