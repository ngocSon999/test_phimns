<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $table='episodes';
    protected $fillable=[
        'movie_id',
        'link_movie',
        'episode',
        'count_view',
    ];
    public function movie(){
        return $this->belongsTo(Movie::class,'movie_id','id');
    }

}
