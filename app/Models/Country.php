<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table='countries';
    protected $fillable=[
        'title',
        'description',
        'status',
        'slug'
    ];
    public function movie(){
        return $this->hasMany(Movie::class,'country_id','id');
    }
}
