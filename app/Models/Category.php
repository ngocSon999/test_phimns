<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'title',
        'description',
        'status',
        'slug',
        'position'
    ];
    public function movie(){
        return $this->hasMany(Movie::class,'category_id','id')
            ->orderBy('id','desc')
            ->where('status',1);
    }
}
