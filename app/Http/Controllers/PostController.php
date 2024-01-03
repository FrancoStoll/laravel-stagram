<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user)
    {
        $posts = Post::where('user_id', $user->id)->latest()->paginate(10);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'img' => 'required',
        ]);

        // Post::create([
        //     'title' => $request->title,
        //     'description' => $request->description,
        //     'img' => $request->img,
        //     'user_id' => auth()->user()->id
        // ]);


        $request->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $request->img,
            'user_id' => $request->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username)->with('success', 'Published');
    }


    public function show(User $user, Post $post)
    {

        return view('posts.show', [
            'post' => $post,
            'user' => $user,
        ]);
    }

    public function destroy(Post $post)
    {

        $this->authorize('delete', $post);
        $post->delete();

        // Eliminar la imagen

        $image_path = public_path('uploads/' . $post->img);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
