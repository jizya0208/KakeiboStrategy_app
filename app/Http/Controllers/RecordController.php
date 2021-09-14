<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use App\Models\ExpenseType;
use App\Models\ExpenseCategory;

class RecordController extends Controller
{

/**
 * 収支一覧を表示する
 *
 */
public function showList() {
    $expenses = Expense::all();
    $incomes = Income::all();
	return view('record.list', ['expenses' => $expenses, 'incomes' => $incomes ]);
}

public function showCreate() {
    $expense_types = ExpenseType::all();
    $expense_categories = ExpenseCategory::all();
    return view('record.form', ['expense_types' =>  $expense_types, 'expense_categories' =>  $expense_categories]);
}

  /**
   * 収支レコードの編集フォームを表示する
   * @param int $id
   * @return view
   */
  public function showEdit($id)
  {
      $blog = Blog::find($id);

      if (is_null($blog)) {
          \Session::flash('err_msg', 'データがありません。');
          return redirect(route('blogs'));
      }

      return view('blog.edit', ['blog' => $blog]);
  }

  /**
   * ブログを更新する
   *
   * @return view
   */
  public function exeUpdate(BlogRequest $request)
  {
      // ブログのデータを受け取る
      $inputs = $request->all();

      \DB::beginTransaction();
      try {
          // ブログを更新
          $blog = Blog::find($inputs['id']);
          $blog->fill([
              'title' => $inputs['title'],
              'content' => $inputs['content'],
          ]);
          $blog->save();
          \DB::commit();
      } catch(\Throwable $e) {
          \DB::rollback();
          abort(500);
      }

      \Session::flash('err_msg', 'ブログを更新しました');
      return redirect(route('blogs'));
  }
  /**
   * ブログ削除
   * @param int $id
   * @return view
   */
  public function exeDelete($id)
  {
      if (empty($id)) {
          \Session::flash('err_msg', 'データがありません。');
          return redirect(route('blogs'));
      }

      try {
          // ブログを削除
          Blog::destroy($id);
      } catch(\Throwable $e) {
          abort(500);
      }

      \Session::flash('err_msg', '削除しました。');
      return redirect(route('blogs'));
    }
}
