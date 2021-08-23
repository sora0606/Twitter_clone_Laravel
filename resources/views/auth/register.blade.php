@extends('layouts.auth')

@section('content')

    <div class="auth-content">

        <div class="form-title">
            アカウント作成
        </div>

        <div class="form-body">

            <form action="{{url('register')}}" method="POST" class="form">

                {{csrf_field()}}

                <div class="input-area">
                    <input type="text" class="form-content" name="nickname" placeholder="ニックネーム" autofocus required>
                </div>

                <div class="input-area">
                    <input type="text" class="form-content" name="name" placeholder="ユーザー名" required>
                </div>

                <div class="input-area">
                    <input type="text" class="form-content" name="email" placeholder="メールアドレス" required>
                </div>

                <div class="input-area">
                    <input type="password" class="form-content" name="password" placeholder="パスワード" required>
                </div>

                <div class="btn-area">
                    <button class="btn" type="submit">アカウント登録</button>
                </div>
            </form>

        </div>
    </div>

@endsection
