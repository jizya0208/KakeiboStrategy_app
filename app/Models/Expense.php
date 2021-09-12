<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    // テーブル名
    protected $table = 'expenses';

    // テーブルのリレーション
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function expense_type(){
        return $this->belongsTo('App\Models\ExpenseType');
    }
    public function expense_category(){
        return $this->belongsTo('App\Models\ExpenseCategory');
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
