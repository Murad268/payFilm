<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Movies extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name', 'slug', "desc"];

    public function actors()
    {
        return $this->belongsToMany(Actors::class, 'movies_actors', 'movie_id', 'actor_id');
    }

    public function countries()
    {
        return $this->belongsToMany(Actors::class, 'movies_countries', 'movie_id', 'country_id');
    }

    public function directors()
    {
        return $this->belongsToMany(Actors::class, 'movies_directors', 'movie_id', 'directors_id');
    }

    public function scriptwriters()
    {
        return $this->belongsToMany(Actors::class, 'movies_scriptwriters', 'movie_id', 'scriptwriters_id');
    }
}
