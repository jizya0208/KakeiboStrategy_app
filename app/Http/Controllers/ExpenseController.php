<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\User;
use App\Models\ExpenseType;
use App\Models\ExpenseCategory;
use App\Http\Requests\ExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * 支出レコードを登録する
     *
     * @return view
     */
    public function exeStore(ExpenseRequest $request) //FormRequestクラスを継承したExpenseRequestの利用により、フォームから送られた値をバリデーションチェックして受け取ることが出来る
    {
      // 支出レコードのデータを受け取る
      $inputs = $request->all();
      $inputs += array('user_id' => $request->user()->id);
      Expense::create($inputs);

    //   \DB::beginTransaction();
    //   try {
    //       // 支出レコードを登録
    //       Expense::create($inputs);
    //       \DB::commit();
    //   } catch(\Throwable $e) {
    //       \DB::rollback();
    //       abort(500);
    //   }

      \Session::flash('err_msg', '支出を記録しました');
      return redirect(route('records'));
    }
}
