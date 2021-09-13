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

// TOP画面を表示。「直近1ヵ月間の支出、収入の合計」「支出種別の円グラフ」「新規入力へのリンク」で構成。
Route::get('/', 'RecordController@showList')->name
('records');

// 新規レコード入力画面 (支出/収入でタブ切替)
Route::get('/record/create', 'RecordController@showCreate')->name
('create');

// 家計簿レコードの登録処理
Route::post('expense/store', 'ExpenseController@exeStore')->name
('store');

// 家計簿レコードの編集画面
Route::get('/record/edit/{id}', 'RecordController@showEdit')->name
('edit');

// 家計簿レコードの更新処理 
Route::post('records/store', 'RecordController@exeStore')->name
('store');

// 家計簿レコードの削除
Route::delete('records/delete/{id}', 'RecordController@exeDelete')->name
('delete');
