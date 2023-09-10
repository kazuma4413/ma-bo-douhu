<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post, 'comments' => $post->comments()->get()]);
    }

   public function semi_create(Category $category)
   {

        $semiCategory = $category -> where("judge", 1)-> get();
        return view('posts/semi_create')->with(['categories' => $semiCategory]);
    }
    
    
     public function circle_create(Category $category)
    {
         $circleCategory = $category -> where("judge", 2)-> get();
        return view('posts/circle_create')->with(['categories' => $circleCategory]);
    }
    
     public function category_create(Category $category)
    {
        return view('posts/category_create')->with(['categories' => $category->get()]);
     
    }

    public function store(Post $post, Request $request)
    {

         $input = $request['post'];
         if($request->file('image')){
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url];
         }
        $input += ['judge' => 1];
        $input += ['user_id' => Auth::id()];

        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
     public function category_store(Category $category, Request $request)
    {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/' );
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
    
    public function comment(Comment $comment, Post $post, Request $request){
        $input = $request['comments'];
        $input += ['user_id' => Auth::id()];
        $input += ['post_id' => $post->id];
        $comment->fill($input)->save();
        
        dd($comment);
        return redirect('/posts/' . $post->id);
    }    

}
