@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-nav')
    <form class="header-nav__link" method="post" action="/logout">
        @csrf
        <button type="submit" class="logout-button">logout</button>
    </form>
@endsection

@section('content')

<div class="main__content">
    <div class="common__heading">
        <h2>Admin</h2>
    </div>

    {{-- 検索フォーム --}}
    <div class="admin__search-section">
        <form action="/admin/search" method="get" class="search-form">
            <div class="search-form__group">
                <input type="text" name="keyword" class="search-form__input" placeholder="名前やメールアドレスを入力してください">

                <select name="gender" class="search-form__select">
                    <option value="">性別</option>
                    <option value="0">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>

                <select name="category_id" class="search-form__select">
                    <option value="">お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>

                <input type="date" name="date" class="search-form__date">

                <div class="search-form__actions">
                    <button type="submit" class="search-form__search-btn">検索</button>
                    <a href="/reset" class="search-form__reset-btn">リセット</a>
                </div>
            </div>
        </form>
    </div>

    {{-- ツール --}}
    <div class="admin__tools">
        <a href="{{ url('/admin/export?' . http_build_query(request()->query())) }}" class="export-btn">エクスポート</a>
        {{-- ページネーション --}}
        <div class="pagination">
            {{ $contacts->appends(request()->query())->links() }}
        </div>
    </div>

    @if (session('message'))
        <div class="alert__success">
            {{ session('message') }}
        </div>
    @endif

    {{-- リスト --}}
    <div class="admin__table-section">
        <table class="admin__table">
            <tr class="admin__table-row">
                <th class="admin__table-header">お名前</th>
                <th class="admin__table-header">性別</th>
                <th class="admin__table-header">メールアドレス</th>
                <th class="admin__table-header">お問い合わせの種類</th>
                <th class="admin__table-header"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="admin__table-row">
                <td class="admin__table-item">{{ $contact->last_name }}{{ $contact->first_name }}</td>
                <td class="admin__table-item">
                    @if($contact->gender == 1) 男性
                    @elseif($contact->gender == 2) 女性
                    @else その他
                    @endif
                </td>
                <td class="admin__table-item">{{ $contact->email }}</td>
                <td class="admin__table-item">{{ $contact->category->content }}</td>
                <td class="admin__table-item">
                    <label for="modal-{{ $contact->id }}" class="detail-btn">詳細</label>
                    <input type="checkbox" id="modal-{{ $contact->id }}" class="modal-toggle">

                    <div class="modal">
                        <div class="modal__inner">
                            <label for="modal-{{ $contact->id }}" class="modal__close">×</label>
                            <div class="modal__content">
                                <table class="modal__detail-table">
                                    <tr><th>お名前</th><td>{{ $contact->last_name }}{{ $contact->first_name }}</td></tr>
                                    <tr><th>性別</th><td>{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</td></tr>
                                    <tr><th>メールアドレス</th><td>{{ $contact->email }}</td></tr>
                                    <tr><th>電話番号</th><td>{{ $contact->tel }}</td></tr>
                                    <tr><th>住所</th><td>{{ $contact->address }}</td></tr>
                                    <tr><th>建物名</th><td>{{ $contact->building }}</td></tr>
                                    <tr><th>お問い合わせの種類</th><td>{{ $contact->category->content }}</td></tr>
                                    <tr><th>お問い合わせ内容</th><td>{{ $contact->detail }}</td></tr>
                                </table>

                                <form action="/admin/delete" method="post" class="delete-form">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                    <button type="submit" class="modal__delete-btn">削除</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection