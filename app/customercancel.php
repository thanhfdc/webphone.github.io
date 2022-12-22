<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customercancel extends Model
{
    protected $fillable=['fullname','email','address','phone','note','subtotal','payment_method'];
}
