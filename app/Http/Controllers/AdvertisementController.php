<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $advertisements = Advertisement::paginate(4);
        return view('admin.advertisement',['advertisements'=>$advertisements]);
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
        $ad = new Advertisement();
        $ad->content = $req['content'];
        $ad->image = $req['image'];
        $ad->save();
        return redirect()->route('advertisement.index')->with('success','Thêm quảng cáo thành công');
 
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
        $ad = Advertisement::find($id);
        $ads = Advertisement::paginate(4);
        return view('admin.advertisement',['advertisements'=>$ads,'advertisement'=>$ad]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        //
        Advertisement::where('id',$req['id'])->update(['content'=>$req['content'],'published_at'=>$req['published_at'],'image'=>$req['image'],'status'=>$req['status']]);
        return redirect()->route('advertisement.index')->with('success','Cập nhật quảng cáo thành công!!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Advertisement::where('id',$id)->update(['status'=>0]);
        return redirect()->route('advertisement.index')->with('success','Xóa quảng cáo thành công!');
    }
    public function search(Request $req){
        $result = Advertisement::where('content', 'like', $req['key'].'%')->paginate(4);
        return view('admin.advertisement',['advertisements'=>$result ]);
    }
}
