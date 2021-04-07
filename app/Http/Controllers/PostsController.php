<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

        $posts = Post::with(['user', 'comments.user'])->latest()->paginate('3');
        
        return view('posts.index', ['posts' => $posts, "id" => 1]);
    }

    public function store(Request $request){

        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();

    }

    public function delete(Post $post){

        $post->delete();

        return back();

    }

    //Like post
    public function likePost(Post $post, Request $request){

        $request->user()->likedPosts()->attach($post);

        return back();

    }

    //Dislike post
    public function dislikePost(Post $post, Request $request){

        $request->user()->likedPosts()->detach($post);

        return back();

    }

    //Edit post
    public function EditPost(Request $request){

        $thisPost = Post::find($request->postId);

        $thisPost->body = $request->newPost;

        $thisPost->save();

        return back()->with('success');

    }

    //Get User posts on Modal
    public function userPosts(Request $request)
    {
        return User::select('name', 'id')->where('id', $request->userID)->with('posts:body,user_id')->first()->toJson();
    }

    //Add new comment to the post
    public function comment(Request $request)
    {

        $validation = $request->validate(['comment' => 'required', 'post_id' => 'required']);

        $request->user()->comments()->create($validation);

    }
}
