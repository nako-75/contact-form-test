@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('header-nav')
    <a class="header-nav__link" href="/register">register</a>
@endsection

@section('content')

<div class="main__content">
    <div class="common__heading">
        <h2>Login</h2>
    </div>

    <div class="auth-form__inner">
        <form class="form" action="/login" method="post" novalidate>
            @csrf

            {{-- アドレス --}}
            <div class="auth-form__group">
                <div class="auth-form__group-title">
                    <span class="auth-form__label--item">メールアドレス</span>
                </div>
                <div class="auth-form__group-content">
                    <div class="auth-form__input--text">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="例：test@example.com">
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
                        <input type="password" name="password" id="password" placeholder="例：coachtech1106">
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
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection