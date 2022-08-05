<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
      'category_id',
      'category_name',
    ];

    /**
     * カテゴリーの一覧を取得
     */
    public function getLists()
    {
        $categories = Category::orderBy('id','asc')->pluck('name', 'id');

        return $categories;
    }
}
