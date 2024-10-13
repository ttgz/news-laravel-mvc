<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\NewsVideo;
class Category extends Model
{
    use HasFactory;
    protected $filltable = ['id','name','status'];
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function newsVideos(){
        return $this->hasMany(NewsVideo::class);
    }
 
    public $timestamps = false;
}
