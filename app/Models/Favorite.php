<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MovieUser;


class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'user_id', 'movie_id', 'title', 'poster_path',
    ];

    public function user()
    {
        return $this->belongsTo(MovieUser::class, 'user_id');
    }

    public function getMovieDetails()
    {
        $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';
        $movieId = $this->movie_id;
        $url = "https://api.themoviedb.org/3/movie/{$movieId}?api_key={$apiKey}";

        $response = Http::get($url);
        if ($response->successful()) {
            return $response->json();
        } else {
            return null;
        }
    }
    
    
}
