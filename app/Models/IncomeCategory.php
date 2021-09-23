<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    // テーブル名
    protected $table = 'income_categories';

    // テーブルのリレーション
    public function expenses(){
        return $this->hasMany('App\Income');
    }

    // 可変項目
    protected $fillable = ['name'];
}
