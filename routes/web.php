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

Route::get('/', [AuthController::class,
 'showLogin'])->name('showLogin');

// Route::post('login', 'AuthController@login')->name
// ('login');

// TOP画面を表示。「直近1ヵ月間の支出、収入の合計」「支出種別の円グラフ」「新規入力へのリンク」で構成。
Route::get('/records', 'RecordController@showList')->name
('records');

// 新規レコード入力画面 (支出/収入でタブ切替)
Route::get('/record/create', 'RecordController@showCreate')->name
('create');

// 支出レコードの登録処理
Route::post('/expense/store', 'ExpenseController@exeStore')->name
('expenseStore');

// 収入レコードの登録処理
Route::post('/income/store', 'IncomeController@exeStore')->name
('incomeStore');

// 家計簿レコードの編集画面
Route::get('/record/edit/{id}', 'RecordController@showEdit')->name
('edit');

// 家計簿レコードの更新処理 
Route::post('/records/store', 'RecordController@exeStore')->name
('update');

// 家計簿レコードの削除
Route::delete('/records/delete/{id}', 'RecordController@exeDelete')->name
('delete');
