<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsVideo;
use App\Models\Category;
class NewsVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $newsVideos = NewsVideo::with('category')->paginate(4);
            $categories = Category::All();
            return view('admin.news_video',['newsVideos'=>$newsVideos,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        //
        $newsVideo = new NewsVideo();
        $newsVideo->title = $req['title'];
        $newsVideo->link = $req['link'];
        $newsVideo->image = $req['image'];
        $newsVideo->category = $req['category'];
        $newsVideo->status = $req['status'];
        $newsVideo->save();
        return redirect()->route('news-video.index')->with('success','Thêm news-video thành công!');
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
    public function edit(string $id)
    {
        //
        $newsVideo = NewsVideo::find($id);
        $newsVideos = NewsVideo::with('category')->paginate(4);
        $categories = Category::All();
        return view('admin.news_video',['newsVideo'=>$newsVideo,'newsVideos'=>$newsVideos,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        //
        $newsVideo = new NewsVideo();
        $newsVideo->title = $req['title'];
        $newsVideo->link = $req['link'];
        $newsVideo->image = $req['image'];
        $newsVideo->category = $req['category'];
        $newsVideo->status = $req['status'];
        $newsVideo->where('id',$req->id)->update(['title'=>$newsVideo->title,'link'=>$newsVideo->link,'image'=>$newsVideo->image,'category'=>$newsVideo->category,'status'=>$newsVideo->status]);
        return redirect()->route('news-video.index')->with('success','Cập nhật thông tin news-video thành công!!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        NewsVideo::where('id',$id)->update(['status'=>0]);
        return reponse()->json(['success'=>'Đã xóa thành công!!!']);
    }
    public function search(Request $req){
        return $req['key'];
    }
}
