<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class customer extends Model
{
    use softDeletes;
    protected $fillable=['fullname','email','address','phone','note','subtotal','payment_method'];
    function products(){
        // Lấy tất cả san pham cua don hang da dat
        // return $this->hasmany('App\order','customers_id');
        return $this->hasmany('App\order');
    }

}
