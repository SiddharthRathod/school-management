<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
//use App\Models\Post;


class UserController extends Controller
{

    public function dashboard(Request $request) {
       
        return view('home');
    }

    // public function dashboard(Request $request){
    //     $posts = Post::where('user_id', Auth::user()->id)->latest()->with(['category', 'author', 'comments'])->get()->toArray();
    //     return view('posts.index', compact('posts'));
    // }
    
}
