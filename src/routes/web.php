<?php
use App\Http\Controllers\Auth\Register1Controller;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register2Controller;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\TargetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*　会員登録画面　*/
Route::get('/register/step1', [Register1Controller::class, 'showStep1'])->name('register.step1');
Route::post('/register/step1', [Register1Controller::class, 'postStep1'])->name('register.step1');

/* ログイン画面　*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

/* 初期体重登録画面 */
Route::get('/register/step2', [Register2Controller::class, 'show'])
    ->name('register.step2');

Route::post('/register/step2', [Register2Controller::class, 'store'])->name('register.step2.store');

/*　体重管理画面　*/
Route::get('/weight_logs', [WeightLogController::class, 'index'])
    ->name('weight_logs.index');
Route::post('/weight_logs', [WeightLogController::class, 'store']);

/* 目標体重設定 */
Route::get('/weight_logs/goal_setting',[TargetController::class, 'edit']);
Route::post('/weight_logs/goal_setting',[TargetController::class, 'update']);

/* データ追加 */
Route::get('/weights/create', [WeightLogController::class, 'create']);

/* えんぴつボタン */
Route::get('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'edit']);
Route::post('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update']);
