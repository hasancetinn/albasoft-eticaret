<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @property  mixed id
 * @property  mixed category_name
 * @property  mixed slug
 */
class Category extends Model
{
    protected $table = 'albasoft.categories';
    protected $primaryKey = 'id';
    protected $guarded = [];
    use SoftDeletes;

    public function product(){

        return $this->belongsTo('\App\Models\Product', 'category_id', 'id');
    }
}
