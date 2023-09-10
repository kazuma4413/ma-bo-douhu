<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
    <x-slot name="header">
        　ゼミ・サークル紹介
        　 </x-slot>
        　  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
        <h1 style="font-size:30px;">詳細画面</h1>
        
        <div style='border:solid 1px; margin-bottom: 10px;'>
            <p>大学：{{ $post->college }}</p>
            <p>タイトル：{{ $post->title }}</p>
            <p>本文：{{ $post->body }}</p>
            <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
        </div>
        
        @if($post->image_url)
            <div>
                <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
            </div>
        @endif
        <form action="/{{ $post->id }}/comment" method="post">
            @csrf
            <h3>コメントをする</h3>
            <textarea name="comments[body]"></textarea>
            <input type="submit"  value="送信"/>
        </form>
        
        <div style="border:solid 1px;">
            <h3>コメント一覧</h3>
            @foreach($comments as $comment)
                <p>コメントした人：{{ $comment->user->name}}</p>
                <p>　　  コメント：{{ $comment->body }}</p>
                
            @endforeach
        </div>
        <div>
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit" style="color:green">編集</a>]</p>
            <a href="/" style="color:blue">戻る</a>
        </div>
            </div>
            </div>
        </div>
    </div>
    </x-app-layout>
 
