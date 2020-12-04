<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BasketProduct extends Model
{
    protected $table = 'albasoft.basket_product';
    protected $primaryKey = 'id';
    protected $guarded = [];
    use SoftDeletes;
}
