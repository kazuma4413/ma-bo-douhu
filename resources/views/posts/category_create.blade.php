<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ゼミ・サークル紹介</title>
    </head>
    <body>
        <x-app-layout>
    <x-slot name="header">
        　　カテゴリー作成
        　　 </x-slot>
        <h1 style="font-size:25px; margin:20px">ようこそ！</h1>
        <h2>カテゴリー作成</h2>
        <form action="/category/create" method="POST" enctype="multipart/form-data" >
            @csrf
            <div>
                <h2>カテゴリー名</h2>
                <input type="text" name="category[name]" placeholder="活動名or研究分野" value="{{ old('post.title') }}" style='margin-bottom:20px'/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            
            <label>ゼミ投稿orサークル投稿</label>
            
            <select name="category[judge]">
                <option value=1>ゼミ投稿</option>
                <option value=2>サークル投稿</option>
                
                
            </select>
               
               
            <p><input type="submit" value="保存" style='border:solid 1px;'/></p>
        </form>
        <div><a href="/">戻る</a></div>
        </x-app-layout>
    </body>
</html>
