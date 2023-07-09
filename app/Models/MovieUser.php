<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
 
class MovieUser extends Authenticatable
{
    protected $table = 'movie_users';
    
    protected $fillable = [
        'username', 'email', 'password', 'age',
    ];
    
    public function favorites()
{
    return $this->hasMany(Favorite::class, 'user_id');
}

}
