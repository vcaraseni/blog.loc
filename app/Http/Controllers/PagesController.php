<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $posts = Post::all()->toArray();

        return view('pages.home', [
            'posts' => $posts
        ]);
    }

    public function liked(Request $request)
    {
//        dd($request->toArray());
        $postId = $request->id;
        $resp = [];

        if($request->form == 'like'){
            // increment post likes
            DB::table('posts')->where('id',$postId)->increment('like');
            // get actual data on likes
            $likes = Post::where('id', $postId)->get()->toArray();
            $resp = [$likes[0]['like']];
        }else{
            // increment post dislikes
            DB::table('posts')->where('id',$postId)->increment('dislike');
            // get actual data on likes
            $likes = Post::where('id', $postId)->get()->toArray();
            $resp = [$likes[0]['dislike']];
        }
        return $resp;
    }

    public function getUsers() {
        $users = User::all()->toArray();
        return view('pages.users',[
            'users' => $users
        ]);
    }

}
