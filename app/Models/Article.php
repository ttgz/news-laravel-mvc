<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class Article extends Model
{
    use HasFactory;    
    protected $filltable = ['id','title','content','author','createdAt','updatedAt','views','image','category','status'];
    public function category(){
        return $this->belongsTo(Category::class,'category');
    }

    public static function getArticles(){
        return  'select articles.id, articles.title, articles.content,articles.author, articles.created_at, articles.updated_at, articles.image ,categories.name, articles.status from articles inner join categories on articles.category = categories.id';
    }
    
}
