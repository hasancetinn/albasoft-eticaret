<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    protected $table = 'albasoft.users';
    protected $primaryKey = 'id';
    protected $guarded = [];
    use SoftDeletes;

}
