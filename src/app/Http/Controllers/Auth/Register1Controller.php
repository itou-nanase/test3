<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class Register1Controller extends Controller
{
    /**
     * 登録画面の表示
     */
    public function showStep1()
    {
        return view('auth.register_step1');
    }

    /**
     * ユーザー登録処理
     */
    public function postStep1(RegisterRequest $request)
    {
        // バリデーション
        $data = $request->validated();

        // ユーザー作成
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // ログイン状態にする場合
        auth()->login($user);

        // 初期体重登録画面へリダイレクト
        return redirect()->route('register.step2');
    }
}