<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Captcha;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('status',1)->paginate(4);     
        return view('admin.category',['categories'=>$categories]);
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
    public function store(Request $request)
    {
        //
        $data = new Category();
        $data->name = $request['name'];
        $data->status = $request['status'];
        $data->save();
        return redirect('/admin/category')->with('success','Thêm danh mục thành công');
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
        $category = Category::find($id);
        $categories = Category::where('status',1)->paginate(4);
        return view('admin.category',['category'=>$category,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $data = new Category();
         if($request['status']==0){
            return redirect()->route('category.index')->with('success','Cập nhật không thành công! Không thể thay đổi trạng thái!!!');
         }
        $data->id =$id;
        $data->name = $request['name'];
         $data->status = $request['status'];
        Category::where('id',$data['id'])->update(['name'=>$data->name,'status'=>$data->status]);
        return redirect()->route('category.index')->with('success','Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Request $req)
    {
        $captcha = Captcha::first();
        if($captcha->captcha!=$req['captcha'])
            return response()->json(["status"=>"fail","message"=>"Mã captcha không khớp"]);
        Category::where('id',$id)->update(['status'=>0]);
        return response()->json(["status"=>"success","message"=>"Xóa danh mục thành công!"]);
    }

    public function searchCategory(Request $req){
        $result = Category::where('name', 'like', $req['key'].'%')->where('status',1)->paginate(4);
        return view('admin.category',['categories'=>$result ]);
    } 
    public function category(){
        return Category::all();
    }
    public function countPostsOfCategory(Request $req){
        return DB::connection('mysql')->select('select count(*) as sum from posts where category = ?',[$req['id']])[0];
    }
    public function getCaptcha(){
        $captcha = Captcha::first();
        $captcha->where('captcha',$captcha->captcha)->update(['captcha'=>rand(100000,999999)]);
        return Captcha::first();
    }
}
 