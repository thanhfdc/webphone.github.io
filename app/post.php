<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\postcat;
class post extends Model
{
      // Model page
      use softDeletes;
      protected $fillable=['name','thumbnail','content','postcat_id'];
    //   Lay bai viet nay cua danh muc nao
      function postcat(){
       //   Lay bai viet nay cua danh muc nao
        return $this->belongsTo('App\postcat');
    }
}
