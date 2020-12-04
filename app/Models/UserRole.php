<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    protected $table = 'albasoft.user_roles';
    protected $primaryKey = 'id';
    protected $guarded = [];
    use SoftDeletes;

    public function user(){

        return $this->belongsTo('\App\Models\User', 'user_id', 'id');
    }
}
