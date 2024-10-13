<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class NewsVideo extends Model
{
    use HasFactory;
    protected $table = 'news_video';
    protected $filltable = ['id','title','createdAt','link','image','category','status'];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class,'category');
    }
}
