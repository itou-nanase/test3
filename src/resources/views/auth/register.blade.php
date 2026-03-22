@extends('layouts.guest')

@section('title', '新規会員登録')

@section('content')
<div class="guest-card">

    <h2 class="form-title">新規会員登録</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- 名前 --}}
        <div class="form-group">
            <label for="name">名前</label>
            <input 
                id="name" 
                type="text" 
                name="name" 
                value="{{ old('name') }}" 
                required 
                autofocus
            >
            @error('name')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- メールアドレス --}}
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required
            >
            @error('email')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="form-group">
            <label for="password">パスワード（8文字以上）</label>
            <input 
                id="password" 
                type="password" 
                name="password" 
                required
            >
            @error('password')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- パスワード確認 --}}
        <div class="form-group">
            <label for="password_confirmation">パスワード（確認）</label>
            <input 
                id="password_confirmation" 
                type="password" 
                name="password_confirmation" 
                required
            >
        </div>

        {{-- 送信ボタン --}}
        <div class="form-group">
            <button type="submit" class="btn-primary">
                会員登録
            </button>
        </div>

        {{-- ログインへの導線 --}}
        <p class="to-login">
            すでにアカウントをお持ちの方は  
            <a href="{{ route('login') }}">ログイン</a>
        </p>

    </form>
</div>
@endsection