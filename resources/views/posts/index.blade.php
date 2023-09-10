
    <x-app-layout>
         <x-slot name="header">
            チーム開発
         </x-slot>
        <h1>チーム開発会へようこそ！</h1>

        <a href='/posts/create'>投稿作成画面</a>
        
        

        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>
                        タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </p>
                    <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                </div>
            @endforeach
        </div>
        
        </x-app-layout>
    </body>
</html>
