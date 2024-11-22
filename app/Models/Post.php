<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Sluggable;
class Post extends Model
{
    use HasFactory;    
    use Sluggable;
    protected $filltable = ['id','title','slug','content','summary_content','author','createdAt','updatedAt','views','image','category','status'];
    public function category(){
        return $this->belongsTo(Category::class,'category');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique'=>true
            ]
        ];
    }
    public static function totalOfPosts(){
        $total = DB::connection('mysql')->select('select count(*) as sum_post from posts');
        return $total[0]->sum_post;
    }
    
}
