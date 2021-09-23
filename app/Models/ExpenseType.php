<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    // テーブル名
    protected $table = 'expense_types';

    // テーブルのリレーション
    public function expenses(){
        return $this->hasMany('App\Expense');
    }

    // 属性：ブラックリスト
    protected $guarded = ['name'];
}
