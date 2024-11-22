<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Contact;
use App\Models\Category;
 

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $colors = [];
        $perOfPostsInCategory = DB::connection('mysql')->select('select categories.id,categories.name, count(posts.id) as count from posts right join categories on posts.category = categories.id group by categories.id, categories.name');
        for($i = 0; $i < count($perOfPostsInCategory);$i++){
            $colors[$i] = 'rgb('.rand(0,255).','.rand(0,255).','.rand(0,255).')';
        }
        $totalPost =Post::totalOfPosts();
        $totalCategory =Category::totalOfCategories();
        return view('admin.index',['perOfPostsInCategory'=>$perOfPostsInCategory,'colors'=>$colors,'totalPost'=>$totalPost,'totalCategory'=>$totalCategory]);
    }
    
    public function showContact(){
        return view('admin.contact',['contact'=>Contact::first()]);
    }
    public function editContact(Request $req){
        $contact = new Contact();
        $contact->where('id',1)->update(['name'=>$req['name'],'numberphone'=>$req['numberphone'],'email'=>$req['email'],'address'=>$req['address'],'facebook'=>$req['facebook'],'about'=>$req['about'],'logo'=>$req['logo']]);
        return redirect()->route('admin.contact')->with('success', 'Cập nhật thông tin thành công!!!');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
