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

      \DB::beginTransaction();
      try {
          // 支出レコードを登録
          Expense::create($inputs);
          \DB::commit();
      } catch(\Throwable $e) {
          \DB::rollback();
          abort(500);
      }

      \Session::flash('err_msg', '支出を記録しました');
      return redirect(route('records'));
    }

    /**
     * 支出レコードの更新画面を表示する
     * @param int $id
     * @return view
     */
    public function showEdit ($id)
    {
        $expense = Expense::find($id);
        $expense_types = ExpenseType::all();
        $expense_categories = ExpenseCategory::all();

        if (is_null($expense)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect(route('records'));
        }

        return view('expense.edit', ['expense' => $expense, 'expense_types' => $expense_types, 'expense_categories' =>  $expense_categories]);
    }

    /**
     * 支出レコードを更新する
     *
     * @return view
     */
    public function exeUpdate(ExpenseRequest $request) //FormRequestクラスを継承したExpenseRequestの利用により、フォームから送られた値をバリデーションチェックして受け取ることが出来る
    {
      // 支出レコードのデータを受け取る
      $inputs = $request->all();

      \DB::beginTransaction();
      try {
          // 支出レコードを更新
          $expense = Expense::find($inputs['id']);
          $expense->fill([
              'date' => $inputs['date'],
              'amount' => $inputs['amount'],
              'expense_category_id' => $inputs['expense_category_id'],
              'expense_type_id' => $inputs['expense_type_id'],
              'summary' => $inputs['summary']
          ]);
          $expense->save();
          \DB::commit();
      } catch(\Throwable $e) {
          \DB::rollback();
          abort(500);
      }

      \Session::flash('err_msg', '支出を更新しました');
      return redirect(route('records'));
    }

    /**
     * 支出レコード削除
     * @param int $id
     * @return view
     */
    public function exeDelete ($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('records'));
        }

        try {
            // 支出レコードを削除
            Expense::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('records'));
    }
}
