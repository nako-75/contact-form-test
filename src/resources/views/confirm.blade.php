@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
    <div class="common__heading">
        <h2>Confirm</h2>
    </div>

    <form class="form" action="/thanks" method="post">
        @csrf
        <table class="confirm-table">

            {{-- 名前 --}}
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                <td class="confirm-table__text">
                    <span>{{ $contact['last_name'] }}</span>
                    <span>{{ $contact['first_name'] }}</span>
                    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
                    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                </td>
            </tr>

            {{-- 性別 --}}
            <tr class="confirm-table__tow">
                <th class="confirm-table__header">性別</th>
                <td class="confirm-table__text">
                    <span>
                        @if($contact['gender'] == '1')男性
                        @elseif($contact['gender'] == '2')女性
                        @else その他
                        @endif
                    </span>
                    <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
                </td>
            </tr>

            {{-- メールアドレス --}}
            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                <td class="confirm-table__text">
                    <span>{{ $contact['email'] }}</span>
                    <input type="hidden" name="email" value="{{ $contact['email'] }}">
                </td>
            </tr>

            {{-- 電話番号 --}}
            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                <td class="confirm-table__text">
                    <span>{{ $contact['tel'] }}</span>
                    <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
                    <input type="hidden" name="tel_1" value="{{ $contact['tel_1'] }}">
                    <input type="hidden" name="tel_2" value="{{ $contact['tel_2'] }}">
                    <input type="hidden" name="tel_3" value="{{ $contact['tel_3'] }}">

            {{-- 住所 --}}
            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                <td class="confirm-table__text">
                    <span>{{ $contact['address'] }}</span>
                    <input type="hidden" name="address" value="{{ $contact['address'] }}">
                </td>
            </tr>

            {{-- 建物名 --}}
            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                <td class="confirm-table__text">
                    <span>{{ $contact['building'] }}</span>
                    <input type="hidden" name="building" value="{{ $contact['building'] }}">
                </td>
            </tr>

            {{-- 種類 --}}
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                <td class="confirm-table__text">
                    <span>
                        @if($contact['category_id'] == '1')商品のお届けについて
                        @elseif($contact['category_id'] == '2')商品の交換について
                        @elseif($contact['category_id'] == '3')商品トラブル
                        @elseif($contact['category_id'] == '4')ショップへのお問い合わせ
                        @else その他
                        @endif
                    </span>
                    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                <td class="confirm-table__text">
                    <span>{{ $contact['detail'] }}</span>
                    <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
                </td>
            </tr>

        </table>

        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <button type="button" class="form__button-back" onclick="history.back()">修正</button>
        </div>
    </form>
</div>
