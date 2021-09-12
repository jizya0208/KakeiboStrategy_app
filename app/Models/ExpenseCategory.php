<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    // テーブル名
    protected $table = 'expense_categories';

    // テーブルのリレーション
    public function expenses(){
        return $this->hasMany('App\Models\Expense');
    }

    // 可変項目
    protected $fillable = ['name'];
}
