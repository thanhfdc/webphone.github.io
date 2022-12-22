<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productcat extends Model
{
     // Model page
     use softDeletes;
     protected $fillable=['catname'];
     function products(){
        // Lấy tất cả các san pham  do 1 danh mục  tạo ra, bảng product chứa khóa ngoại là productcat_id, Chỉ mục products: nhieu bai viet
        return $this->hasmany('App\product');
    }

}
