@extends('layouts.guest')

@section('title', '新規会員登録')

@section('content')

{{-- CSS読み込み --}}
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="weight-card">
    <h2 class="form-title">新規会員登録</h2>
    <p class="step">STEP2 体重データの入力</p>

    <form action="{{ route('register.step2') }}" method="POST">
    @csrf

        <div class="form-group">
            <label>現在の体重</label>
            <input type="text" name="weight">

            @error('weight')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <label>目標の体重</label>
            <input type="text" name="target_weight">

            @error('target_weight')
                <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-primary">アカウント作成</button>
    </form>
</div>
@endsection