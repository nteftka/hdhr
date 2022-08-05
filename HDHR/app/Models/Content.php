<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
  use SoftDeletes;

    protected $table = 'contents';

    protected $dates = [
      'created_at',
      'updated_at',
      'date',
      'birth',
    ];

    use HasFactory;
    protected $fillable =[
      'id',
      'dh_id',
      'kr_id',
      'date',
      'rup_pd',
      'lup_pd',
      'run_pd',
      'lun_pd',
      'contents',
      'memo',
      'created_at',
    ];


    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function kr()
    {
      return $this->belongsTo(Kr::class);
    }

}
