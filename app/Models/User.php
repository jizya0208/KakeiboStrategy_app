<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // テーブル名
    protected $table = 'users';

    // テーブルのリレーション
    public function expenses(){
        return $this->hasMany('App\Expense');
    }
    public function incomes(){
        return $this->hasMany('App\Income');
    }

    // 可変項目
    protected $fillable =
    [
        'name',
        'email',
        'password',
        'locked_flg',
        'error_count',
    ];
}
