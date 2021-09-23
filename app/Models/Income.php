<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    // テーブル名
    protected $table = 'incomes';

    // テーブルのリレーション
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function income_category(){
        return $this->belongsTo('App\IncomeCategory');
    }

    // 可変項目
    protected $fillable =
    [
        'user_id',
        'income_category_id',
        'date',
        'amount',
        'remark'
    ];
}
