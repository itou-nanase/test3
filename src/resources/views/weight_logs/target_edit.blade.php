<h1>目標体重設定</h1>

<form method="POST" action="/target/update">
    @csrf

    <label>目標体重</label>
    <input 
        type="number" 
        step="0.1"
        name="target_weight"
        value="{{ old('target_weight', $target->target_weight ?? '') }}"
    > kg

    <button type="submit">更新</button>
</form>

<a href="/">戻る</a>