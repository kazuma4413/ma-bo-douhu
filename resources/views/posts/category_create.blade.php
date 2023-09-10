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
        <form action="/category/create" method="POST" enctype="multipart/form-data" >
            @csrf
            <div>
                <h2>カテゴリー名</h2>
                <input type="text" name="category[name]" placeholder="活動名or研究分野" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            
            <label>ゼミ投稿orサークル投稿</label>
            
            <select name="category[judge]">
                <option value=1>ゼミ投稿</option>
                <option value=2>サークル投稿</option>
                
                
            </select>
            
               
            
               
               
               
               
            <input type="submit" value="保存"/>
        </form>
        <div><a href="/">戻る</a></div>
        </x-app-layout>
    </body>
</html>
