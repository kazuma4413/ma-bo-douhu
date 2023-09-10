
    <x-app-layout>
         <x-slot name="header">
            チーム開発
         </x-slot>
        <h1>チーム開発会へようこそ！</h1>
         <div>
            <form action="{{ route('search') }}" method="GET">
            
            <input class="judge" type="radio" id="judge" name="judge" value="1">ゼミ
            <input class="judge" type="radio" id="judge" name="judge" value="2">サークル<br>
            <input type="text" name="keyword" >
            <input type="submit" value="検索">
            </form>
        </div>
        <a href='/posts/create/semi'>ゼミ投稿作成画面</a>
        <a href='/posts/create/circle'>サークル投稿作成画面</a>
        <a href='/category'>カテゴリー作成画面</a>
        

        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </p>
                    <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                </div>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
            @endforeach
        </div>
        
        <script>
           function deletePost(id) {
               'use strict'

               if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                   document.getElementById(`form_${id}`).submit();
               }
            }
        </script>
        
    </x-app-layout>
  </body>
</html>
