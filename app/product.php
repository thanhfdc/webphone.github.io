<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class product extends Model
{
    //
    use softDeletes;
    protected $fillable=['masp','thumbnail','name','price','description','productcat_id','status','the_firm' ,'des_product'];
}
