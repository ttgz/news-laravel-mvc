<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\NewsVideo;
class Category extends Model
{
    use HasFactory;
    protected $filltable = ['id','name','status'];
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function newsVideos(){
        return $this->hasMany(NewsVideo::class);
    }
    public static function totalOfCategories(){
        $sum = DB::connection('mysql')->select('select count(*) as sum_category from categories');
        return $sum[0]->sum_category;
    }
    public $timestamps = false;
}
