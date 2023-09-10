<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <x-app-layout>
    <x-slot name="header">
        　　ゼミ紹介
        　　 </x-slot>
        <h1 style="font-size:30px; margin:20px; color:red">ゼミ投稿作成</h1>
        
        <form action="/posts/store/1" method="POST" enctype="multipart/form-data" >
            @csrf
            <div>
                <h2  style="color:#ff0000">大学</h2>
                <input type="text" name="post[college]" placeholder="大学名" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <h2  style="color:#ff0000">タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <h2  style="color:#ff0000">本文</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            
             <div class="image">
                <input type="file" name="image">
            </div>
            
            <div>
                <h2  style="color:#ff0000">カテゴリー</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="保存" style="border:solid 1px; margin-top:10px"/>
        </form>
        <div style="color:#0000ff; margin-top:10px"><a href="/">戻る</a></div>
        </x-app-layout>
    </body>
</html>
