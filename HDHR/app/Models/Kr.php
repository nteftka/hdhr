<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Kr extends Model
{
    use SoftDeletes;
    use HasFactory;
    // モデルに関連付けるテーブル
    protected $table = 'kr';

    // 登録・更新可能なカラムの指定
    protected $fillable = [
      'number',
      'name',
      'kana',
      'birth',
      'gender',
    ];

    protected $dates = [
    'created_at',
    'updated_at',
    'birth',
    'date',
  ];

    public function content()
    {
      return $this->hasMany('App\Content');
    }


}
