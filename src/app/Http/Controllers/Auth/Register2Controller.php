<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\WeightTarget;
use App\Models\WeightLog;
use App\Http\Requests\WeightRequest;


class Register2Controller extends Controller
{
    public function show()
    {
        return view('auth.register_step2'); 
    }

    // 保存処理
    public function store(WeightRequest $request)
    {
    // 目標体重
        WeightTarget::create([
            'user_id' => auth()->id(),
            'target_weight' => $request->target_weight,
        ]);

    // 現在体重
        WeightLog::create([
            'user_id' => auth()->id(),
            'weight' => $request->weight,
            'date' => now(),
        ]);       

        // ここでDB保存

        return redirect('/login');
    }
}