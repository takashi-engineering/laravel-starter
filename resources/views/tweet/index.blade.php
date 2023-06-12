<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>つぶやきアプリ</title>
</head>
<body>
    <h1>つぶやきアプリ</h1>
    <div>
        @auth
        <p>投稿フォーム</p>
        <form action="{{ route('tweet.create') }}" method="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>１４０文字まで</span>
            <textarea name="tweet" id="tweet-content" type="text" placeholder="つぶやきを入力"></textarea>
            @error('tweet')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">投稿</button>
        </form>

        <hr />
        @endauth

        @foreach ($tweets as $tweet)
            <details>
                <summary>{{ $tweet->content }} by {{ $tweet->user->name }}</summary>
            </details>
            <div>
                <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">削除</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
