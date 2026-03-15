@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('header-nav')
    <a class="header-nav__link" href="/login">login</a>
@endsection

@section('content')

<div class="main__content">
    <div class="common__heading">
        <h2>Register</h2>
    </div>

    <div class="auth-form__inner">
        <form class="form" action="/register" method="post">
            @csrf

            {{-- 名前 --}}
            <div class="auth-form__group">
                <div class="auth-form__group-title">
                    <span class="auth-form__label--item">お名前</span>
                </div>
                <div class="auth-form__group-content">
                    <div class="auth-form__input--text">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="例：山田 太郎">
                    </div>
                    <div class="form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- アドレス --}}
            <div class="auth-form__group">
                <div class="auth-form__group-title">
                    <span class="auth-form__label--item">メールアドレス</span>
                </div>
                <div class="auth-form__group-content">
                    <div class="auth-form__input--text">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com">
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- パスワード --}}
            <div class="auth-form__group">
                <div class="auth-form__group-title">
                    <span class="auth-form__label--item">パスワード</span>
                </div>
                <div class="auth-form__group-content">
                    <div class="auth-form__input--text">
                        <input type="password" name="password" placeholder="例：coachtech1106">
                    </div>
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- ボタン --}}
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>

        </form>
    </div>
</div>
</form>
@endsection