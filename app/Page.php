<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Page extends Model
{
    // Model page
    use softDeletes;
    // protected $fillable=['title','file','content','checked','birthday','thumbnail'];
    protected $fillable=['title','content','birthday','category','cat_id'];
}
