<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcribe;
class SubcribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subcribes = Subcribe::paginate(4);
        return view('admin.subcribe',['subcribes'=>$subcribes]);
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
        $subcribe = new Subcribe();
        $subcribe->email = $req['email'];
        $subcribe->save();
        return "Đăng kí thành công";

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
        $subcribe = Subcribe::find($id);
        $subcribes = Subcribe::paginate(4);
        return view('admin.subcribe',['subcribes'=>$subcribes,'subcribe'=>$subcribe]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        //
        Subcribe::where('id',$req->id)->update(['email'=>$req->email]);
        return redirect()->route('subcribe.index')->with('success','Cập nhật đăng ký thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Subcribe::where('id',$id)->delete();
        return redirect()->route('subcribe.index')->with('success','Xóa đăng ký thành công!');
    }
    public function search(Request $req){
        $result = Subcribe::where('email', 'like', $req['key'].'%')->paginate(4);
       return view('admin.subcribe',['subcribes'=>$result]);
    }
}
