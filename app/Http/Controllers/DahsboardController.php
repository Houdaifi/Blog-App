<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DahsboardController extends Controller
{
    public function index(Post $post){

        $likes = array();

        $posts = Post::select('id')->where('user_id', '<>' , auth()->user()->id)->get();

        foreach($posts as $post){
            foreach($post->Likedby as $Likedby){
                if($Likedby->id == auth()->user()->id){
                    continue;
                }
                $likes[] = array('name' => $Likedby->name, 'liked_at' => $Likedby->created_at);
            }
        }

        return view('dashboard', ["likes" => $likes]);
    }
}