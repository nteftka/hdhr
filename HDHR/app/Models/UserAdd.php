<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAdd extends Model
{
    protected $table = 'users';

    use HasFactory;
    protected $fillable = [
      'number',
      'name',
      'password',
    ];

    // use SoftDeletes;
    // protected $guarded = array('id');


}
