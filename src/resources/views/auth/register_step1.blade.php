@extends('layouts.guest')

@section('title', '新規会員登録')

@section('content')

{{-- CSS読み込み --}}
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="guest-card">

    <h2 class="form-title">新規会員登録</h2>
    <p class="step">STEP1 アカウント情報の登録</p>

    <form method="POST" action="{{ route('register.step1') }}" novalidate>
        @csrf

        {{-- 名前 --}}
        <div class="form-group">
            <label for="name">お名前</label>
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
            <label for="password">パスワード</label>
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

        {{-- 次へボタン --}}
        <div class="form-group">
            <button type="submit" class="btn-primary">
                次に進む
            </button>
        </div>

        {{-- ログインへの導線 --}}
        <p class="to-login">
            <a href="/login">ログインはこちら</a>
        </p>

    </form>
</div>
@endsection