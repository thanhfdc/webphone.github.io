<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\icon;
class AdminIconController extends Controller
{
    function __construct(){
        $this->middleware(function($request,$next){
                    // Su dung middleware toi uu cho active module_active
            //  Su dung middleware de rang buoc cai session khi di vao moi module, sesion se duoc thay doi theo thiet lap o moi module
            // Neu khong co middleware thi session luon lay cai dau tien la dashbord->khong dung yeu cau bai toan dat ra->HAY
            Session(['module_active'=>'icon']);
            return $next($request);
        });
    }
// Add icon
    function addicon(){
        $icons=icon::all();
        return view('admin.icon.addicon',compact('icons'));
    }
    // Xu ly validate them icon
    function addstoresicon(Request $request){
        $input=$request->all();
        // return $input;
        $request->validate(
            [
                'file'=>'required|image',
            ],
            [
                'required'=>':attribute không được để trống',
                'image'=>':attribute có dạng file ảnh'
            ],
            [
                'file' => 'Ảnh',
            ]);
        if($request->hasFile('file')){
//    echo "Có file"."<br>";
                $file=$request->file; //Gán biến file vào $request:$request->file goi đến cái thuộc tính trong $request
                      $fileName=$file->getClientOriginalName();
                    // Xu ly trung ten file
                     if(!file_exists('public/image/icons/'.$fileName)){
                        $path=$file->move('public/image/icons',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
                        $image_icon='public/image/icons/'.$fileName; //Đường dẫn của file lưu vào database
                     }else{
                        $newfileName=pathinfo($fileName, PATHINFO_FILENAME)."-".time().".".$file->getClientOriginalExtension();
                        $path=$file->move('public/image/icons',$newfileName);//Chuyển file lên server(trong folder public/uploads)
                        $image_icon='public/image/icons/'.$newfileName; //Đường dẫn của file lưu vào database
                    }

                     $input['image_icon']=$image_icon;
                    //  echo $input['thumbnail'];
                }
                icon::create(
                 [
                     'image_icon'=>$input['image_icon'],
                 ]
        );
        return redirect('admin/icon/addicon')->with('status','Đã thêm icon thành công');
    }

    // delete icon
    function deleteicon($id){
        $icon=icon::find($id);
        if(file_exists($icon->image_icon)){
            @unlink($icon->image_icon);
        }
        $icon->delete();
        return redirect('admin/icon/addicon')->with('status','Đã xóa ảnh icon thành công');
    }
}
