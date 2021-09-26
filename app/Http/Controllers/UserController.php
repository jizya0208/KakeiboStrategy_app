<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Expense;
use App\Models\Income;
use App\Models\ExpenseType;
use App\Models\ExpenseCategory;

class UserController extends Controller
{
     /** @var Expense&Income */
     protected $expense;
     protected $income;

     // 1ページ当たりの表示件数
     const NUM_PER_PAGE = 10;

     function __construct(Expense $expense, Income $income)
     {
         $this->expense = $expense;
         $this->income = $income;
     }
     /**
    * マイページトップ
    * @param UserRequest $request
    * 収支レコードを取得
    * 月ごとの合計支出、合計収入を表示
    *
    */
    public function showList(UserRequest $request)
    {
        $input = $request->input();)
        $authUser = Auth::user(); // 認証ユーザー取得

        $list = $this->expense->getExpenseList(self::NUM_PER_PAGE, $input);
        // $list += $this->income->getIncomeList(self::NUM_PER_PAGE, $input);
        // ページネーションリンクにクエリストリングを付け加える
        $list->appends($input);

        // 「Expense::all();」ではN+1問題になりSQLの発行数が増えるので、with関数を使用する
        $expenses = Expense::with('user')->find($authUser['id']);
        $expense_category = ExpenseCategory::all();
        $expense_type = ExpenseType::all();
        // $incomes = Income::with('user')->find($authUser->id)->get();
        // $income_category = IncomeCategory::all();
        // 支出分類別の合計を返す
        $subtotal = $expenses
            ->select('expense_type_id')
            ->selectRaw('SUM(amount) AS total_amount')
            ->groupBy('expense_type_id')
            ->get();
        $params = [
            'user' => $authUser,
            'expenses' => $expenses::orderBy('date', 'desc')->get(),
            // 'incomes' => $incomes,
            'expense_category' => $expense_category,
            'expense_type' => $expense_type,
            // 'income_category' => $income_category
            'subtotal' => $subtotal 
        ];
        return view('user.list', $params);
    }
}
