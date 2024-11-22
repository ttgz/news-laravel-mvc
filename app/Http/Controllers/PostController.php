<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =  Post::orderBy('created_at','desc')->with('category')->paginate(4);
        $categories = Category::All();
        return view('admin.post.show',['posts'=>$posts,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::where('status',1)->get();
        return view('admin.post.add',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        //
        $pathFile;
        if($req['select-image']=='url')
        {
            $pathFile = $req['image'];
        }else{
            if($req->has('image'))
            {
                $file = $req->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = 'post_'.time().'.'.$extension;
                $path = 'uploads/image/';
                $file->move($path,$fileName);
                $pathFile = $path.$fileName;
            }
        }  
        $post = new Post();
        $post ->title = $req['title'];
        $post ->content= $req['content'];
        $post ->summary_content= $req['summary-content'];

        $post ->author = $req['author'];
        $post ->updated_at =$req['updated_at'];
        $post ->image = $pathFile;
        $post ->category = $req['category'];
        $post ->status= $req['status'];
        
        $post->save();
        return redirect()->route('post.index')->with('success','Thêm bài viết thành công!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        //
        $post =  Post::where('slug',$slug)->first();
        $categories = Category::All();
        return view('admin.post.update',['post'=>$post,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        //
        if($req['status']==0){
            return redirect()->route('post.index')->with('success','Cập nhật bài viết không thành công!!! Không thể thay đổi trạng thái bài viết sang ẩn');
        }
        $post = new post();
        $pathFile;
        if($req['select-image']=='url')
        {
            $pathFile = $req['image'];
            $post->where('id',$req['id'])->update(['image'=>$pathFile]);
        }else{
            if($req->has('image'))
            {
                $file = $req->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = 'post_'.time().'.'.$extension;
                $path = 'uploads/image/';
                $file->move($path,$fileName);
                $pathFile = $path.$fileName;
                $post->where('id',$req['id'])->update(['image'=>$pathFile]);
            }
        }  
        $slug = Str::slug($req['title']);
        $post->where('id',$req['id'])->update(['title'=>$req['title'],'slug'=>$slug,'content'=>$req['content'],'summary_content'=>$req['summary-content'],'author'=>$req['author'],'updated_at'=>$req['updated_at'],'category'=>$req['category'],'status'=>$req['status']]);
        return redirect()->route('post.index')->with('success','Cập nhật bài viết thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Post::where('id',$id)->update(['status'=>0]);
        return response()->json(['success'=>'Xóa bài viết thành công!!!']);
    }
    public function search(Request $req){
        $posts = Post::where('title','like','%'.$req['key'].'%')->orWhere('status','like','%'.$req['key'].'%')->paginate(4);
        $categories = Category::All();
        return view('admin.post.show',['posts'=>$posts,'categories'=>$categories]); 
    }
    public function getTopThreePosts(){
        return DB::connection('mysql')->select('SELECT posts.title, posts.slug, posts.created_at  FROM `posts` WHERE posts.status=1 ORDER BY views desc LIMIT 3');
    }
    public function getPostLastModify(){
        return DB::connection('mysql')->select('SELECT posts.image, posts.slug FROM `posts` WHERE posts.status=1 ORDER BY updated_at DESC LIMIT 9');
    }
    public function getPostsTrending(){
        return Post::where('status',1)->orderBy('views','desc')->take(10)->get();
    }
    public function getPopularPost(){
        return Post::where('status',1)->orderBy('views','desc')->take(4)->get();
    }
}
