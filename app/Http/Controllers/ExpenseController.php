<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{


    /**
     * 支出レコードを登録する
     *
     * @return view
     */
    public function exeStore(RecordRequest $request)
    {
      // レコードのデータを受け取る
      $inputs = $request->all();

      \DB::beginTransaction();
      try {
          // 収支レコードを登録
          Expense::create($inputs);
          \DB::commit();
      } catch(\Throwable $e) {
          \DB::rollback();
          abort(500);
      }

      \Session::flash('err_msg', '支出を記録しました');
      return redirect(route('records'));
  }
}
