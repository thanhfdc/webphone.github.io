<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class order extends Model
{
    use softDeletes;
    protected $fillable=['masp','thumbnail','name','price','qty','subtotal','payment','customer_id'];
}
