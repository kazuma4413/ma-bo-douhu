<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <x-app-layout>
    <x-slot name="header">
        　　ゼミ・サークル紹介
        　　 </x-slot>
        <h1 class="title" style='margin-left:20px; margin-top:10px; font-size:20px; font-weight:bold;'>編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__college'>
                    <h2 style='margin-left:30px; margin-top:10px;'>大学名</h2>
                    <input type='text' name='post[college]' value="{{ $post->title }}" style='margin-left:30px;'>
                </div>
                <div class='content__title'>
                    <h2 style='margin-left:30px; margin-top:10px;'>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}" style='margin-left:30px;'>
                </div>
                <div class='content__body'>
                    <h2 style='margin-left:30px; margin-top:10px;'>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}" style='margin-left:30px;'>
                </div>
                <input type="submit" value="保存" style='margin-left:30px; margin-top:10px; color:blue;'>
            </form>
        </div>
        </x-app-layout>
    </body>
</html>
