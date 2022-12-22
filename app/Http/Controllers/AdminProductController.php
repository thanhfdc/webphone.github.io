<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\productcat;

class AdminProductController extends Controller
{
    function __construct(){
        $this->middleware(function($request,$next){
                    // Su dung middleware toi uu cho active module_active
            //  Su dung middleware de rang buoc cai session khi di vao moi module, sesion se duoc thay doi theo thiet lap o moi module
            // Neu khong co middleware thi session luon lay cai dau tien la dashbord->khong dung yeu cau bai toan dat ra->HAY
            Session(['module_active'=>'product']);
            return $next($request);
        });
    }


    //Xay dung module product
    // action danh muc san pham
    function listproduct(Request $request){
        $status=request()->input('status');
        // Phan 24 bai 277 : Xoa vinh vien user

        $list_act = [
            'delete'=>'Xóa tạm thời'
        ];
        if($status=='trash'){
            $list_act = [
                'restore'=>'Khôi phục',
                'forceDelete'=>'Xóa vĩnh viễn',
            ];
            $listproducts=product::onlyTrashed()->paginate(20);
        }else{
            $keyword="";
            if($request->input('keyword')){
                $keyword=$request->input('keyword');
            }
            $listproducts=product::where('name','LIKE',"%{$keyword}%")->paginate(20);
            //$users=User::withTrashed()->where('name','LIKE',"%{$keyword}%")->paginate(5);//xuat ca nhung thang da xoa tam thoi
            //dd($users);//In lieu print
            //dd($users->total());//In lieu print
            // Phan 24 bai 268
            // $users=User::all();
           // $users=User::paginate(1);//Thuc hien phan trang( de 10 user tren 1 ban ghi chang han)
            // return $user;
        }
        $count_product_active=product::count();
        $count_product_trash=product::onlyTrashed()->count();
        $count=[$count_product_active,$count_product_trash];
        return view('admin/product/listproduct',compact('listproducts','count','list_act'));

    }
    function addcatproduct(){
        $catproducts=productcat::all();
        return view('admin.product.addcat',compact('catproducts'));
    }

    // Xu ly insert cat product vao bang danh muc san pham
    function storeaddcatproduct(Request $request){
        $input=$request->all();
        // return $request->all();
        $request->validate(
            [
                'catname' => 'required|max:255|min:5|unique:productcats',
                // 'file' => 'required', 'string','max:255',
                // 'title' => 'required|max:100|min:5',//@ quy tắc cách nhau bởi 1 dáu gạch đứng

            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute có độ dài ít nhât :min ký tự',
                'max'=>':attribute có độ dài tối đa :max ký tự',
                'unique'=>':attribute phải là duy nhất',
            ],
            [
                'catname' => 'Danh mục sản phẩm',
            ]);

        productcat::create(
                [
                  'catname'=>$request->input('catname'),
               ]
            );
        return redirect('admin/product/cat/addcatproduct')->with('status','Đã thêm danh mục sản phẩm thành công');
    }

    // Edit catproduct
    function editcatproduct($id){
        $editcatproduct=productcat::find($id);
        $catproducts=productcat::all();
        return view('admin/product/editcatproduct',compact('catproducts','editcatproduct'));
    }
    // Update catproduct
    function updatecatproduct(Request $request,$id){
        $input=$request->all();
        // return $request->all();
        $catname=productcat::find($id)->catname;
        $request->validate(
            [
                'catname' => 'required|max:255|min:5|unique:productcats',
                // 'file' => 'required', 'string','max:255',
                // 'title' => 'required|max:100|min:5',//@ quy tắc cách nhau bởi 1 dáu gạch đứng
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute có độ dài ít nhât :min ký tự',
                'max'=>':attribute có độ dài tối đa :max ký tự',
                'unique'=>':attribute phải là duy nhất',
            ],
            [
                'catname' => 'Danh mục sản phẩm',
            ]);
        // Cap nhat catproduct
            productcat::where('id',$id)->update(
                [
                    'catname'=>$request->input('catname'),
                ]
                );
        return redirect('admin/product/cat/addcatproduct')->with('status',"Đã cập nhất thành công danh mục sản phẩm có danh mục cũ :{$catname}");
    }

    // Xoa danh muc san pham
    function deletecatproduct($id){
        $catname=productcat::find($id)->catname;
        $deletecatproduct=productcat::find($id);
        $deletecatproduct->delete();
        product::where('productcat_id','=',$id)->delete();
        return redirect('admin/product/cat/addcatproduct')->with('status',"Đã xóa tạm thời danh mục sản phẩm có danh mục cũ :{$catname}");
    }
    // Them san pham
    function addproduct(){
        $catproducts=productcat::all();
        return view('admin.product.addproduct',compact('catproducts'));
    }
    function storeproduct(Request $request){// $page=new Page;
        // $page=$request->all();
        // $input=$request->all();
        // echo "<pre>";
        // print_r($input);
        // echo "</pre>";
        // return $request->all();
        // return $request->input('file');
        // return $input['file']->getClientOriginalName();
        $request->validate(
            [
                'masp'=>'required|string|max:255|unique:products',
                // 'file' => 'file|image',
                // 'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'file'=>'required|image',
                // Duong dan anh trong mysql phai duy nhat
                'name'=>'required|string|min:8|max:255',
                'price'=>'required|min:5|max:255',
                'description'=>'required|string|min:8|max:255',
                'products_id'=>'required',
                'status'=>'required|string|min:8|max:255',
                'the_firm'=>'required|string|max:255',
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute có độ dài ít nhât :min ký tự',
                'max'=>':attribute có độ dài tối đa :max ký tự',
                'unique'=>':attribute phải duy nhất',
                'image'=>':attribute có dạng file ảnh'
            ],
            [
                'masp' => 'Mã sản phẩm',
                'file' => 'Ảnh',
                'name' => 'Tên sản phẩm',
                'price' => 'Giá sản phẩm',
                'description' => 'Mô tả sản phẩm',
                'products_id' => 'Danh mục sản phẩm',
                'status'=> 'Tình trạng sản phẩm',
                'the_firm'=>'Hãng sản phẩm'
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
                         if(!file_exists('public/image/products/'.$fileName)){
                            $path=$file->move('public/image/products',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
                            $thumbnail='public/image/products/'.$fileName; //Đường dẫn của file lưu vào database
                         }else{
                            $newfileName=pathinfo($fileName, PATHINFO_FILENAME)."-".time().".".$file->getClientOriginalExtension();
                            $path=$file->move('public/image/products',$newfileName);//Chuyển file lên server(trong folder public/uploads)
                            $thumbnail='public/image/products/'.$newfileName; //Đường dẫn của file lưu vào database
                        }

                        // echo $path;
                        //  $thumbnail='public/products/'.$fileName; //Đường dẫn của file lưu vào database
                        //  echo $thumbnail;
                         $input['thumbnail']=$thumbnail;
                        //  echo $input['thumbnail'];
                    }
            // return $input['thumbnail'];
        product::create(
            [
                //   $request->input(),
                  'masp'=>$request->input('masp'),
                  'thumbnail'=>$input['thumbnail'],
                  'name'=>$request->input('name'),
                  'price'=>$request->input('price'),
                  'description'=>$request->input('description'),
                  'productcat_id'=>$request->input('products_id'),
                  'status'=>$request->input('status'),
                  'the_firm'=>$request->input('the_firm'),
                  'des_product' => $request->input('description-product')
               ]
            );
        return redirect('admin/product/listproduct')->with('status','Đã thêm sản phẩm thành công');
    }
// Xoa san pham
    function deleteproduct($id){
        $product=product::find($id);
        $product->delete();
        return redirect('admin/product/listproduct')->with('status','Đã xóa sản phẩm thành công');

    }
    // Edit san pham
    function editproduct($id){
        $product=product::find($id);
        $productcats=productcat::all();
        return view('admin/product/editproduct',compact('product','productcats'));

    }
    function updateproduct(Request $request,$id){

        $request->validate(
            [
                'name'=>'required|string|min:8|max:255',
                'price'=>'required|min:5|max:255',
                'description'=>'required|string|min:8|max:255',
                'products_id'=>'required',
                'status'=>'required|string|min:8|max:255',
                'the_firm'=>'required|string|min:2|max:255',
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute có độ dài ít nhât :min ký tự',
                'max'=>':attribute có độ dài tối đa :max ký tự',
                'unique'=>':attribute phải duy nhất',
                'image'=>':attribute có dạng file ảnh'
            ],
            [
                'masp' => 'Mã sản phẩm',
                'file' => 'Ảnh',
                'name' => 'Tên sản phẩm',
                'price' => 'Giá sản phẩm',
                'description' => 'Mô tả sản phẩm',
                'products_id' => 'Danh mục sản phẩm',
                'status'=> 'Tình trạng sản phẩm',
                'the_firm'=>'Hãng sản phẩm',
            ]);
            if($request->hasFile('file')){
                //    echo "Có file"."<br>";
                    $file=$request->file; //Gán biến file vào $request:$request->file goi đến cái thuộc tính trong $request
                    // echo $file;
                    // Lấy tên file
                          $fileName=$file->getClientOriginalName();
                        //   echo $file->getClientOriginalName();
                        if(!file_exists('public/image/products/'.$fileName)){
                            $path=$file->move('public/image/products',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
                            $thumbnail='public/image/products/'.$fileName; //Đường dẫn của file lưu vào database
                         }else{

                            $newfileName=pathinfo($fileName, PATHINFO_FILENAME)."-".time().".".$file->getClientOriginalExtension();
                            $path=$file->move('public/image/products',$newfileName);//Chuyển file lên server(trong folder public/uploads)
                            $thumbnail='public/image/products/'.$newfileName; //Đường dẫn của file lưu vào database
                        }

                        // echo $path;
                        //  $thumbnail='public/products/'.$fileName; //Đường dẫn của file lưu vào database
                        //  echo $thumbnail;
                         $input['thumbnail']=$thumbnail;//Đường dẫn của file lưu vào database
                        //  echo $thumbnail;

                    }
                    $path_image_product=product::find($id);
                    @unlink($path_image_product->thumbnail);
            product::where('id',$id)->update(
                [
                    'masp'=>$request->input('masp'),
                    'thumbnail'=> $input['thumbnail'],
                    'name'=>$request->input('name'),
                    'price'=>$request->input('price'),
                    'description'=>$request->input('description'),
                    'productcat_id'=>$request->input('products_id'),
                    'status'=>$request->input('status'),
                    'the_firm'=>$request->input('the_firm'),
                    'des_product'=>$request->input('des_product12'),
                ]
                );

        return redirect('admin/product/listproduct')->with('status','Đã cập nhật sản phẩm thành công');
    }

    function actionproduct(Request $request){
        $list_check=$request->input('list_check');
        // return $list_check;
       if(isset($list_check)){//Kiem tra $list_check da duoc tao thi
                // return $request->input('list_check');
                if(!empty($list_check)){
                    // $test=product::onlyTrashed()->get(); //lay id
                    $test=product::onlyTrashed()
                    ->whereIn('id',$list_check)
                    ->get();
                    $list_productcat_id=array();
                    foreach($test as $item ){
                        $list_productcat_id[]=$item->productcat_id;
                    }
                    // $boolean=file_exists('public/products/hinh-anh-6.jpg');
                    // echo $boolean;
                    // if(file_exists('public/products/hinh-anh-6.jpg')){
                    //     echo "Ton tai file";
                    // }else{echo "file khong ton tai";}
                    // return $test;
                    $act=$request->input('act');
                    if($act=='delete'){
                        product::destroy($list_check);
                        // return redirect('admin/product/listproduct')->with('status','Bạn đã xóa tạm thời sản phẩm thành công');
                    }
                    if($act=='restore'){
                        if(productcat::onlyTrashed()->get()->count() > 0){
                            productcat::onlyTrashed()
                            ->whereIn('id',$list_productcat_id) //Khoi phuc danh muc theo mang $list_productcat_id lay o tren
                            ->restore();
                        }

                        product::onlyTrashed()
                        ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                        ->restore();
                        return redirect('admin/product/listproduct')->with('status','Bạn đã khôi phục sản phẩm thành công');
                    }
                    // Phan 24 bai 277 : Xoa vinh vien user
                    if($act=='forceDelete'){
                        $test=product::onlyTrashed()->get();
                        foreach($test as $item){
                            // echo $item->thumbnail."<br>";
                            @unlink($item->thumbnail);
                        }
                        product::onlyTrashed()
                        ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                        ->forceDelete();
                        return redirect('admin/product/listproduct')->with('status','Bạn đã xõa vĩnh viễn sản phẩm thành công');
                    }
                }
                return redirect('admin/product/listproduct')->with('status','Bạn phải chọn hình thức xóa tạm thời, xóa vĩnh viễn hoặc khôi phục');
       }else{
             return redirect('admin/product/listproduct')->with('status','Bạn cần chọn phần tử cần thực hiện');
       }

}

}
