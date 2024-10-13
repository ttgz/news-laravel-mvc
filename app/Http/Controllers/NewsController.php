<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function search(){
        return view('users.news.search');
    }
    public function detail(){
        return view('users.news.detail');
    }
}
