<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
class NewsController extends Controller
{
    public function search(Request $req){
        $listOfPostsPopular = Post::where('status',1)->orderBy('views','desc')->take(4)->get();
        $postTrending = Post::where('status',1)->orderBy('views','desc')->take(10)->get();
        $categories = Category::where('status',1)->get();
        $postsOfCategory = Post::where('status',1)->where('category',$req['category'])->paginate(4);
        return view('users.news.search',['popularPosts'=>$listOfPostsPopular,'postTrending'=>$postTrending,'posts'=>$postsOfCategory,'categories'=>$categories]);
    }
    public function detail($slug){
        $post = Post::where('slug',$slug)->first();
        $categories = Category::where('status',1)->get();
        Post::where('slug',$slug)->update(['views'=>$post->views + 1]);
        $listOfPostsPopular = Post::where('status',1)->orderBy('views','desc')->take(4)->get();
        $postTrending = Post::where('status',1)->orderBy('views','desc')->take(10)->get();
        return view('users.news.detail',['post'=>$post,'popularPosts'=>$listOfPostsPopular,'postTrending'=>$postTrending,'categories'=>$categories]);
    }
}
