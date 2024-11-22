<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subcribe;
use App\Models\Advertisement;
use App\Models\Post;
use App\Models\NewsVideo;
use App\Models\Category;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index(){
        $ads = Post::where('status',1)->where('category',100)->get();
        $postTrending = Post::where('status',1)->orderBy('views','desc')->take(10)->get();
        $postsNews = Post::where('status',1)->where('category','<>',100)->orderBy('created_at','desc')->get();
        $newsVideos = NewsVideo::where('status',1)->get();
        $posts = Post::where('status',1)->where('category','<>',100)->orderBy('created_at','desc')->paginate(4);
        $categories = Category::where('status',1)->get();
        $listOfPostsPopular = Post::where('status',1)->orderBy('views','desc')->take(4)->get();
        return view('users.home.index',['advertisements'=>$ads,'postTrending'=>$postTrending,'postsNews'=>$postsNews,'newsVideos'=>$newsVideos,'posts'=>$posts,'categories'=>$categories,'popularPosts'=>$listOfPostsPopular]);
    }
    public function contact(){
        return view('users.home.contact',['contact'=>Contact::first()]);
    }
   
}
