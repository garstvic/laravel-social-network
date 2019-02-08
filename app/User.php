<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
