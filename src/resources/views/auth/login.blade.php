@extends('layouts.guest')

@section('title', 'ログイン')

@section('content')

{{-- CSS読み込み --}}
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="guest-card">

    <h2 class="form-title">ログイン</h2>

    <form method="POST" action="/login">
        @csrf

        {{-- メールアドレス --}}
        <div class="form-group">
            <label for="email">メールアドレス</label>
           <input type="email" name="email">
            @error('email')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="password">
            @error('password')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- ログインボタン --}}
        <div class="form-group">
            <button type="submit" class="btn-primary">
                ログイン
            </button>
        </div>

        {{-- アカウント作成への導線 --}}
        <p class="to-login">
            <a href="{{ route('register.step1') }}">アカウント作成はこちら</a>
        </p>

    </form>
</div>
@endsection