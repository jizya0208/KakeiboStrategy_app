<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Expense;
use App\Models\Income;
use App\Models\ExpenseType;
use App\Models\ExpenseCategory;

class UserController extends Controller
{
    /**
    * @param int $id
    * $userによる収支レコードを取得
    * 月ごとの合計支出、合計収入を表示
    *
    */
    public function showList()
    {
        $user = Auth::user();
        $expenses = Expense::where('user_id', $user->id)->get();
        $expense_category = ExpenseCategory::all();
        $expense_type = ExpenseType::all();
        $incomes = $user->incomes;
        return view('user.list', ['user' => $user, 'expenses' => $expenses, 'incomes' => $incomes, 'expense_category' => $expense_category,  'expense_type' => $expense_type]);
    }
}
