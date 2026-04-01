<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="{{ asset('css/weight_log.css') }}">
</head>
<body>

    <!-- ヘッダー -->
    <header class="header">
        <h1 class="app-name">PiGLy</h1>
        <div class="header-buttons">
            <a href="/weight_logs/goal_setting" class="btn-secondary">目標体重設定</a>

            <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn-secondary">ログアウト</button>
            </form>
        </div>
    </header>

    <!-- メイン -->
    <main class="main">
        @yield('content')
        <div class="status-area">
            <div class="status-box">
                <p>目標体重：{{ $target->target_weight }}kg</p>
            </div>

            <div class="status-box">
                <p>
                目標まで：
                @if(!is_null($latestWeight) && !is_null($target?->target_weight))
                {{ number_format((float)$latestWeight - (float)$target->target_weight, 1) }}kg
                @else
                    ー
                @endif
                </p>
            </div>

            <div class="status-box">
                <p>現在体重：{{ number_format($latestWeight, 1) }}kg</p>
            </div>
        </div>

        <!-- モーダル -->
         <dialog id="modal">
            <div class="modal-content">

                <!-- 登録フォーム -->
                <form method="POST" action="/weight_logs">
                @csrf
                    <input type="date" name="date">

                    <input type="number" step="0.1" name="weight" placeholder="体重">

                    <input type="number" name="calories" placeholder="カロリー">

                    <input type="number" name="exercise_time" placeholder="運動時間（分）">

                    <textarea name="exercise_content" placeholder="運動内容"></textarea>

                    <button type="submit">登録</button>
                </form>

                 <!-- 閉じる -->
                <button type="button" onclick="location.href='/weight_logs'">
                戻る
                </button>
            </div>
        </dialog>

        <div class="search-area">
                <!-- 検索フォーム -->
            <form method="GET" action="">
                <input type="date" name="from" value="{{ request('from') }}">
                <span>〜</span>
                <input type="date" name="to" value="{{ request('to') }}">

                <button type="submit" class="btn-search">検索</button>

                @if(request('from') || request('to'))
                    <a href="{{ url()->current() }}" class="btn-secondary">リセット</a>
                @endif
            </form>

            <!-- 追加ボタン -->
            <button onclick="document.getElementById('modal').showModal()">
            データ追加
            </button>
        </div>

        <!-- 一覧 -->
         <div class="log-list">

            @if(request('from') && request('to'))
                <p>
                    {{ request('from') }} 〜 {{ request('to') }} の検索結果　
                    {{ $logs->total() }}件
                </p>
            @endif

            <div class="log-row log-header">
                <div>日付</div>
                <div>体重</div>
                <div>カロリー</div>
                <div>運動時間</div>
                <div></div>
            </div>

        @foreach ($logs as $log)
        <div class="log-row">
            <!-- 日付 -->
             <div>
            {{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}
            </div>

            <!-- 体重 -->
             <div>
            {{ number_format((float)$latestWeight - (float)$target->target_weight, 1) }}kg
            </div>

            <!-- カロリー -->
            <div>
           {{ is_numeric($log->calories) ? $log->calories . 'cal' : 'ー' }}
           </div>

            <!-- 運動時間 -->
             <div>
            @if(is_numeric      ($log->exercise_time))
            {{ floor($log->exercise_time / 60) }}時間
            {{ $log->exercise_time % 60 }}分
            @else
                ー
            @endif
            </div>

            <!-- えんぴつ -->
             <div>
            <a href="/weight_logs/{{ $log->id }}/update">✏️</a>
            </div>
        </div>
        @endforeach
        </div>
        {{ $logs->links() }}
        {{ $logs->appends(request()->query())->links() }}
    </main>

</body>
</html>