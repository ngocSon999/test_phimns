<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $fillable = [
        'title',
        'description',
        'status',
        'resolution', //định dạng HD
        'vietsub',
        'slug',
        'category_id',
        'country_id',
        'image_path',
        'movie_host',
        'name_eng',
        'year_movie',
        'movie_duration',//thời lượng phim
        'tag_movie',
        'top_view',
        'season',// mùa phim
        'trailer',
        'count_view'

    ];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
    public function genreMovie(){
        return $this->belongsToMany(Genre::class,'genre_movies','movie_id','genre_id');
    }

    public function episode(){
        return $this->hasMany(Episode::class,'movie_id','id');
    }
}
