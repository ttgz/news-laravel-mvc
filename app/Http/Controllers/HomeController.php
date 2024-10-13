<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subcribe;

class HomeController extends Controller
{
    public function index(){
        return view('users.home.index');
    }
    public function contact(){
        return view('users.home.contact');
    }
    public function addSubcribe(Request $req){
        $subcribe = new Subcribe();
        $subcribe->email = $req['email'];
        $subcribe->save();
        return redirect()->route('contact')->with('success','Bạn đã đăng ký nhận thông báo thành công!!!');
    }
}
