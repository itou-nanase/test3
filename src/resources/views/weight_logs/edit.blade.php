<h1>データ更新</h1>

<form method="POST" action="/weight_logs/{{ $log->id }}/update">
    @csrf

    <div>
        <label>日付</label>
        <input type="date" name="date" value="{{ old('date', $log->date) }}">
    </div>

    <div>
        <label>体重</label>
        <input type="number" step="0.1" name="weight" value="{{ old('weight', $log->weight) }}"> kg
    </div>

    <div>
        <label>摂取カロリー</label>
        <input type="number" name="calories" value="{{ old('calories', $log->calories) }}"> cal
    </div>

    <div>
        <label>運動時間</label>
        <input type="number" name="exercise_time" value="{{ old('exercise_time', $log->exercise_time) }}"> 分
    </div>

    <div>
        <label>運動内容</label>
        <input type="text" name="exercise_content" value="{{ old('exercise_content', $log->exercise_content) }}">
    </div>

    <button type="submit">更新</button>
</form>

<a href="/">戻る</a>