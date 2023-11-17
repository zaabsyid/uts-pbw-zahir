<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){
        return view("about");
    }
    public function resume(){
        return view("resume");
    }
    public function portfolio(){
        return view("portfolio");
    }
    public function services(){
        return view("services");
    }
    public function contact(){
        return view("contact");
    }
    public function dashboard(){
        $blogcount = Blog::count();
        return view("admin.dashboard", ["blogs"=> $blogcount]);
    }
    public function blogs(){
        $blogs=Blog::all();
        return view("blogs", ["blogs"=> $blogs]);
    }
    public function detailblogs($id){
        $blog=Blog::findOrFail($id);
        return view("detail", ["blog"=> $blog]);
    }
}
