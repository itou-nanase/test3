<?php

namespace App\Http\Controllers;

use App\Models\WeightTarget;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    public function edit()
    {
        $target = WeightTarget::first();

        return view('weight_logs/target_edit', compact('target'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'target_weight' => 'required|numeric'
        ]);

        $target = WeightTarget::first();

        if (!$target) {
            $target = new WeightTarget();
        }

        $target->target_weight = $request->target_weight;
        $target->save();

        return redirect('/')->with('success', '更新しました');
    }
}

