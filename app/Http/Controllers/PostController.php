<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

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

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }

    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
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
        $judge = $request->input('judge');
        $query = Post::query();
        if(!empty($keyword) && $judge == '1'){
            $query->where('title', 'LIKE', "%{$keyword}%",'AND','judge','=',$judge)
                  ->orWhere('body', 'LIKE', "%{$keyword}%" ,'AND' , 'judge','=',$judge);
        }
        elseif(!empty($keyword) && $judge=='2'){
            $query->where('title', 'LIKE', "%{$keyword}%",'AND','judge','=',$judge)
                  ->orWhere('body', 'LIKE', "%{$keyword}%" ,'AND' , 'judge','=',$judge);
        }
        elseif(empty($keyword)){
            $query->where('title', 'LIKE', "%{$keyword}%",'AND','judge','=',$judge)
                  ->orWhere('body', 'LIKE', "%{$keyword}%" ,'AND' , 'judge','=',$judge);
        }
        elseif(empty($keyword)){
            $query->where('title', 'LIKE', "%{$keyword}%",'AND','judge','=',$judge)
                  ->orWhere('body', 'LIKE', "%{$keyword}%" ,'AND' , 'judge','=',$judge);
        }

        $posts = $query->get();
        
        return view('posts/index', compact('posts', 'keyword'));
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        
        return redirect('/');
    }
    
        

}
