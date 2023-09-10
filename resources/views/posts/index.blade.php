
    <x-app-layout>
         <x-slot name="header">
            <h1 style="color:green; font-size:30px; font-weight:bold; margin-left:20px">ゼミ・サークル紹介</h1>
         </x-slot>
    <body style=>
        <h1 style="font-size:25px; margin:20px">ようこそ！</h1>
         <div>
            <form action="{{ route('search') }}" method="GET" style="padding-left:20px; margin-top:20px; margin-bottom:20px">
            
            <input class="judge" type="radio" id="judge" name="judge" value="1">ゼミ
            <input class="judge" type="radio" id="judge" name="judge" value="2">サークル<br>
            <input type="text" name="keyword" placeholder="キーワードを入力">
            <input type="submit" value="検索" style='border:solid 1px; margin-bottom: 10px;'>
            </form>
        </div>
        <a href='/posts/create/semi' style='margin-left:20px; border:solid 1px; font-size:20px; color='>ゼミ投稿作成画面</a>
        <a href='/posts/create/circle' style='margin-left:20px; border:solid 1px;font-size:20px'>サークル投稿作成画面</a>
        

        <div>
            @foreach ($posts as $post)
                <div style='border:solid 1px; margin-bottom: 10px; margin-top:20px; margin-left:20px; margin-right:20px'>
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
