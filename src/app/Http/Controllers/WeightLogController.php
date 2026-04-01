<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WeightLogController extends Controller
{
    public function index(Request $request)
    {

        $query = WeightLog::query();

        // 日付検索
        if ($request->filled('from') && $request->filled('to')) {
        $query->whereBetween('date', [$request->from, $request->to]);
        }

        $logs = $query->paginate(8);

        $target = WeightTarget::first();

        $latestWeight = $logs->first()?->weight;


        return view('weight_logs.index',compact('logs', 'target', 'latestWeight'));
    }

    public function store(Request $request)
    {
        WeightLog::create([
            'user_id' => Auth::id(), 
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);

        return redirect('/weight_logs');
    }

    /* ログアウトボタン*/
    public function logout(Request $request)
    {
        Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
    }

    public function edit($weightLogId)
    {
        $log = WeightLog::findOrFail($weightLogId);

        return view('weight_logs.edit', compact('log'));
    }

    public function update(Request $request, $weightLogId)
{
    $request->validate([
        'date' => 'required|date',
        'weight' => 'required|numeric',
        'calories' => 'nullable|numeric',
        'exercise_time' => 'nullable|numeric',
        'exercise_content' => 'nullable|string',
    ]);

    $log = WeightLog::findOrFail($weightLogId);

    $log->date = $request->date;
    $log->weight = $request->weight;
    $log->calories = $request->calories;
    $log->exercise_time = $request->exercise_time;
    $log->exercise_content = $request->exercise_content;

    $log->save();

    return redirect('/')->with('success', '更新しました');
}
}
