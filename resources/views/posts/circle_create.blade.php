<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <x-app-layout>
    <x-slot name="header">
        　　チーム開発
        　　 </x-slot>
        <h1>チーム開発会へようこそ！</h1>
        <h2>サークル投稿作成</h2>
        <form action="/posts/store/2" method="POST" enctype="multipart/form-data" >
            @csrf
            <div>
                <h2>大学</h2>
                <input type="text" name="post[college]" placeholder="大学名" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <h2>本文</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            
             <div class="image">
                <input type="file" name="image">
            </div>
            
            <div>
                <h2>カテゴリー</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div><a href="/">戻る</a></div>
        </x-app-layout>
    </body>
</html>
