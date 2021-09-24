<?php

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
use Illuminate\Support\Facade\Http\Routes;
use App\Http\Controllers\Auth\AuthController;

// ログイン前の処理
Route::middleware(['guest'])->group(function () {
  Route::get('/', [AuthController::class, 'showLogin'])->name('login_show');

  Route::post('login', [AuthController::class, 'login'])->name('login');
});

// ログイン後の処理
Route::middleware(['auth'])->group(function () {
  // TOP画面を表示。「直近1ヵ月間の支出、収入の合計」「支出種別の円グラフ」「新規入力へのリンク」で構成。
  Route::get('/records', 'UserController@showList')->name
  ('records');

  Route::post('logout', [AuthController::class, 'logout'])->name('logout');

  // 新規レコード入力画面 (支出/収入でタブ切替)
  Route::get('/record/create', 'RecordController@showCreate')->name
  ('create');

  // 支出レコードの登録処理
  Route::post('/expense/store', 'ExpenseController@exeStore')->name
  ('expenseStore');

  // // 収入レコードの登録処理
  // Route::post('/income/store', 'IncomeController@exeStore')->name
  // ('incomeStore');

  // // 家計簿レコードの編集画面
  // Route::get('/record/edit/{id}', 'RecordController@showEdit')->name
  // ('edit');

  // // 家計簿レコードの更新処理
  // Route::post('/records/store', 'RecordController@exeStore')->name
  // ('update');

  // // 家計簿レコードの削除
  // Route::delete('/records/delete/{id}', 'RecordController@exeDelete')->name
  // ('delete');
});

