<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Cloudinary;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function semi_create(Category $category)
    {
        return view('posts/semi_create')->with(['categories' => $category->get()]);
    }
    
     public function circle_create(Category $category)
    {
        return view('posts/circle_create')->with(['categories' => $category->get()]);
    }

    public function store($judge, Post $post, Request $request)
    {
         $input = $request['post'];
         if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
         }
        $input += ['judge' => $judge];
        $input += ['user_id' => Auth::id()];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    public function search(Request $request)
        {
        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->get();
        
        return view('posts/index', compact('posts', 'keyword'));
        }
    
        

}
