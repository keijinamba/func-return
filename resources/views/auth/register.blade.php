<form method="POST" action="/auth/register">
    {!! csrf_field() !!}

    <div>
        ユーザー名
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        表示名
        <input type="text" name="display_name" value="{{ old('display_name') }}">
    </div>

    <div>
        メールアドレス
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        パスワード
        <input type="password" name="password">
    </div>

    <div>
        パスワード確認
        <input type="password" name="password_confirmation">
    </div>

    <div>
        サムネイル画像URL
        <input type="text" name="thumb" value="{{ old('thumb') }}">
    </div>

    <div>
        紹介文
        <input type="text" name="introduction" value="{{ old('introduction') }}">
    </div>

    <div>
        <button type="submit">登録</button>
    </div>
</form>