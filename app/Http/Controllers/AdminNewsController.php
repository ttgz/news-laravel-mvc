<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\NewsVideo;
use Illuminate\Support\Facades\DB;
class AdminNewsController extends Controller
{
    public function category(){
        $categories = Category::paginate(4);
        
        return view('admin.category',['categories'=>$categories ]);
    }

    public function addCategory(Request $req){
        $data = new Category();
        $data->name = $req['name'];
        $data->status = $req['status'];
        $data->save();
        return redirect('/admin/category')->with('success','Thêm danh mục thành công');
    }

    public function showEditCategory(string $id){
        $category = Category::find($id);
        $categories = Category::paginate(4);
        return view('admin.category',['category'=>$category,'categories'=>$categories]);
    }

    public function editCategory(Request $req){
        $data = new Category();
        $data->id = $req['id'];
        $data->name = $req['name'];
        $data->status = $req['status'];
        Category::where('id',$data['id'])->update(['name'=>$data->name,'status'=>$data->status]);
        return redirect()->route('admin.category')->with('success','Cập nhật danh mục thành công!');
    }
    public function searchCategory(Request $req){
        $result = Category::where('name', 'like', $req['key'].'%')->paginate(4);
 
       return view('admin.category',['categories'=>$result ]);
    }

    public function showArticle(){
        
        $articles =  Article::with('category')->paginate(4);
        $categories = Category::All();
        return view('admin.article',['articles'=>$articles,'categories'=>$categories]);
    }
    public function addArticle(Request $req){
        $article = new Article();
        $article ->title = $req['title'];
        $article ->content= $req['content'];
        $article ->author = $req['author'];
        $article ->updated_at =$req['updated_at'];
        $article ->image = $req['image'];
        $article ->category = $req['category'];
        $article ->status= $req['status'];
        
        $article->save();
        return redirect()->route('admin.article');
    }
    public function showEditArticle(Request $req){
        $article =  Article::find($req['id']);
        $articles =  Article::with('category')->paginate(4);
        $categories = Category::All();
        return view('admin.article',['article'=>$article,'articles'=>$articles,'categories'=>$categories]);
    }

    public function editArticle(Request $req){
        $article = new Article();
        $article->where('id',$req['id'])->update(['title'=>$req['title'],'content'=>$req['content'],'author'=>$req['author'],'updated_at'=>$req['updated_at'],'image'=>$req['image'],'category'=>$req['category'],'status'=>$req['status']]);
        return redirect()->route('admin.article')->with('success','Cập nhật bài viết thành công');
    }

    public function searchArticle(Request $req){
        $articles = Article::where('title','like','%'.$req['key'].'%')->paginate(4);
        $categories = Category::All();
        return view('admin.article',['articles'=>$articles,'categories'=>$categories]); 
    }
    public function showNewsVideo(){
        $newsVideos = NewsVideo::with('category')->paginate(4);
        $categories = Category::All();
        return view('admin.news_video',['newsVideos'=>$newsVideos,'categories'=>$categories]);
    }

    public function showEditNewsVideo(string $id){
        $newsVideo = NewsVideo::find($id);
        $newsVideos = NewsVideo::with('category')->paginate(4);
        $categories = Category::All();
        return view('admin.news_video',['newsVideo'=>$newsVideo,'newsVideos'=>$newsVideos,'categories'=>$categories]);
    }
    public function addNewsVideo(Request $req){
        $newsVideo = new NewsVideo();
        $newsVideo->title = $req['title'];
        $newsVideo->link = $req['link'];
        $newsVideo->image = $req['iamge'];
        $newsVideo->category = $req['category'];
        $newsVideo->status = $req['status'];
        $newsVideo->save();
        return redirect()->route('admin.news_video')->with('success','Thêm news-video thành công!');
    }
    public function editNewsVideo(Request $req){
        $newsVideo = new NewsVideo();
        $newsVideo->title = $req['title'];
        $newsVideo->link = $req['link'];
        $newsVideo->image = $req['image'];
        $newsVideo->category = $req['category'];
        $newsVideo->status = $req['status'];
        $newsVideo->where('id',$req->id)->update(['title'=>$newsVideo->title,'link'=>$newsVideo->link,'image'=>$newsVideo->image,'category'=>$newsVideo->category,'status'=>$newsVideo->status]);
        return redirect()->route('admin.news_video')->with('success','Cập nhật thông tin news-video thành công!!!!');
    }
}
