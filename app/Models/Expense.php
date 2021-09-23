<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    // テーブル名
    protected $table = 'expenses';

    // テーブルのリレーション
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function expense_type(){
        return $this->belongsTo('App\ExpenseType');
    }
    public function expense_category(){
        return $this->belongsTo('App\ExpenseCategory');
    }

    // 可変項目
    protected $fillable =
    [
        'user_id',
        'expense_type_id',
        'expense_category_id',
        'date',
        'amount',
        'return',
        'remark'
    ];
}
