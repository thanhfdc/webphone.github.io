<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\post;
class postcat extends Model
{
     // Model page
     use softDeletes;
     protected $fillable=['name'];
     function posts(){
        // Lấy tất cả các bài viết do 1 danh mục  tạo ra, bảng post chứa khóa ngoại là post_id posts: nhieu bai viet
        return $this->hasmany('App\post');
    }

}
