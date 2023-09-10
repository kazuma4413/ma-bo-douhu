
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
        <h2>投稿一覧画面</h2>
        <a href='/posts/create'>新規投稿</a>
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
