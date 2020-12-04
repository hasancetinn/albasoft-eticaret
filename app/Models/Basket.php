<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket extends Model
{
    protected $table = 'albasoft.baskets';
    protected $primaryKey = 'id';
    protected $guarded = [];
    use SoftDeletes;

    public function product(){

        return $this->belongsTo('\App\Models\Product', 'product_id', 'id');
    }
}
