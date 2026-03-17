@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="common__heading">
        <h2>Contact</h2>
    </div>

    <form class="form" action="/confirm" method="post" novalidate>
        @csrf

    {{-- 名前 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    {{-- 姓 --}}
                    <div class="form__input--name-wrap">
                        <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}" />
                        <div class="form__error">
                            @error('last_name') {{ $message }} @enderror
                        </div>
                    </div>
                    {{-- 名 --}}
                    <div class="form__input--name-wrap">
                        <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}" />
                        <div class="form__error">
                            @error('first_name') {{ $message }} @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- 性別 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" name="gender" id="male" value="1" {{ old('gender') == '1' ? 'checked' : ''}}>
                    <label for="male">男性</label>
                    <input type="radio" name="gender" id="female" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                    <label for="female">女性</label>
                    <input type="radio" name="gender" id="other" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
                    <label for="other">その他</label>
                </div>
                <div class="form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

    {{-- メールアドレス --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

    {{-- 電話番号 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel">
                    <input type="tel" name="tel_1" placeholder="080" value="{{ old('tel_1') }}" />
                    <span>-</span>
                    <input type="tel" name="tel_2" placeholder="1234" value="{{ old('tel_2') }}" />
                    <span>-</span>
                    <input type="tel" name="tel_3" placeholder="5678" value="{{ old('tel_3') }}" />
                </div>
                <div class="form__error">
                    @if ($errors->has('tel_1'))
                        {{ $errors->first('tel_1') }}
                    @elseif ($errors->has('tel_2'))
                        {{ $errors->first('tel_2') }}
                    @elseif ($errors->has('tel_3'))
                        {{ $errors->first('tel_3') }}
                    @endif
                </div>
            </div>
        </div>

    {{-- 住所 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

    {{-- 建物名 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
            </div>
        </div>

    {{-- お問い合わせの種類 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select name="category_id">
                        <option value="" {{ old('category_id') == '' ? 'selected' : '' }} disabled>選択してください</option>
                        <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>商品のお届けについて</option>
                        <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品の交換について</option>
                        <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>商品トラブル</option>
                        <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                        <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

    {{-- お問い合わせ内容欄 --}}
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span><span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name='detail' placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

    {{-- ボタン --}}
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
                    @endsection