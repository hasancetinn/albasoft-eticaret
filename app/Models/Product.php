<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @property  mixed id
 * @property  mixed product_name
 * @property  mixed slug
 * @property  mixed description
 * @property  mixed price
 * @property  mixed picture
 * @property  mixed category_id
 */
class Product extends Model
{
    protected $table = 'albasoft.products';
    protected $primaryKey = 'id';
    protected $guarded = [];
    use SoftDeletes;

    public function category(){

        return $this->belongsTo('\App\Models\Category', 'category_id', 'id');
    }




}
