<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sliceder;
class AdminslicederController extends Controller
{
    function __construct(){
        $this->middleware(function($request,$next){
                    // Su dung middleware toi uu cho active module_active
            //  Su dung middleware de rang buoc cai session khi di vao moi module, sesion se duoc thay doi theo thiet lap o moi module
            // Neu khong co middleware thi session luon lay cai dau tien la dashbord->khong dung yeu cau bai toan dat ra->HAY
            Session(['module_active'=>'sliceder']);
            return $next($request);
        });
    }
// Add silder
    function addsliceder(){
        $sliceders=sliceder::all();
        return view('admin.sliceder.addsliceder',compact('sliceders'));
    }
    // Xu ly validate them sliceder
    function addstoresliceder(Request $request){
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
                // echo $file;
                 // $thoigian=time();
                // echo $thoigian;
                // Lấy tên file
                      $fileName=$file->getClientOriginalName();
                    //   echo $file->getClientOriginalName();
                    //   echo "<br>";
                    //   Lay ten file khong co duoi
                    // echo pathinfo($fileName, PATHINFO_FILENAME)."<br>";
                    //   echo 'public/products/'.$file->getClientOriginalName();

                    // Lấy đuôi file
                    // echo  "Duoi file : ".$file->getClientOriginalExtension()."<br>";

                    // Xu ly trung ten file
                     if(!file_exists('public/image/sliceders/'.$fileName)){
                        $path=$file->move('public/image/sliceders',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
                        $image_sliceder='public/image/sliceders/'.$fileName; //Đường dẫn của file lưu vào database
                     }else{
                        $newfileName=pathinfo($fileName, PATHINFO_FILENAME)."-".time().".".$file->getClientOriginalExtension();
                        $path=$file->move('public/image/sliceders',$newfileName);//Chuyển file lên server(trong folder public/uploads)
                        $image_sliceder='public/image/sliceders/'.$newfileName; //Đường dẫn của file lưu vào database
                    }

                    // echo $path;
                    //  $thumbnail='public/products/'.$fileName; //Đường dẫn của file lưu vào database
                    //  echo $thumbnail;
                     $input['image_sliceder']=$image_sliceder;
                    //  echo $input['thumbnail'];
                }
            sliceder::create(
                 [
                     'image_sliceder'=>$input['image_sliceder'],
                 ]
        );
        return redirect('admin/sliceder/addsliceder')->with('status','Đã thêm ảnh sliceder thành công');
    }

    // Xoa sliceder
    function deletesliceder($id){
        $sliceder=sliceder::find($id);
        if(file_exists($sliceder->image_sliceder)){
            @unlink($sliceder->image_sliceder);
        }
        $sliceder->delete();
        return redirect('admin/sliceder/addsliceder')->with('status','Đã xóa ảnh sliceder thành công');
    }

}
