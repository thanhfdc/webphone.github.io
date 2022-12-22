<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class AdminPageController extends Controller
{
    function __construct(){
        $this->middleware(function($request,$next){
                    // Su dung middleware toi uu cho active module_active
            //  Su dung middleware de rang buoc cai session khi di vao moi module, sesion se duoc thay doi theo thiet lap o moi module
            // Neu khong co middleware thi session luon lay cai dau tien la dashbord->khong dung yeu cau bai toan dat ra->HAY
            Session(['module_active'=>'page']);
            return $next($request);
        });
    }


    //Xay dung module page
    function list(Request $request){
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
            $listpages=Page::onlyTrashed()->paginate(4);
        }else{
            $keyword="";
            if($request->input('keyword')){
                $keyword=$request->input('keyword');
            }
            $listpages=Page::where('title','LIKE',"%{$keyword}%")->paginate(4);
            //$users=User::withTrashed()->where('name','LIKE',"%{$keyword}%")->paginate(5);//xuat ca nhung thang da xoa tam thoi
            //dd($users);//In lieu print
            //dd($users->total());//In lieu print
            // Phan 24 bai 268
            // $users=User::all();
           // $users=User::paginate(1);//Thuc hien phan trang( de 10 user tren 1 ban ghi chang han)
            // return $user;
        }

        $count_page_active=Page::count();
        $count_page_trash=Page::onlyTrashed()->count();
        $count=[$count_page_active,$count_page_trash];
        return view('admin.page.list',compact('listpages','count','list_act'));
    }
    //Xay dung module page
    function add(Request $request){
        $categorys=Page::all()->unique('category'); //hay
        // return $categorys;
        return view('admin.page.pageadd',compact('categorys'));

    }
    function store(Request $request){
        // $page=new Page;
        // $page=$request->all();
        $input=$request->all();
        // return $request->file;
        // return $request->input('file');
        // return $input['file']->getClientOriginalName();
        // if($request->hasFile('file')){
        //     //    echo "Có file"."<br>";
        //         $file=$request->file; //Gán biến file vào $request:$request->file goi đến cái thuộc tính trong $request
        //         // echo $file;
        //         // Lấy tên file
        //               $fileName=$file->getClientOriginalName();
        //             //   echo $file->getClientOriginalName();
        //              $path=$file->move('public/uploads',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
        //             // echo $path;
        //              $thumbnail='public/uploads/'.$fileName; //Đường dẫn của file lưu vào database
        //             //  echo $thumbnail;
        //              $input['thumbnail']=$thumbnail;
        //             //  echo $input['thumbnail'];
        //         }
        $request->validate(
            [
                'title' => 'required|string|min:8|max:255|unique:pages',
                'content' => 'required|string|min:8|max:255',
                'birthday' => 'required|date|min:8|max:50',
                'category' => 'required|max:50',

            ],
            [
                'required'=>':attribute không được để trống',
                'category.required'=>':attribute danh mục trang',
                'string'=>':attribute phải có dạng chuỗi',
                'date'=>':attribute phải có dạng ngày tháng',
                'min'=>':attribute có độ dài ít nhât :min ký tự',
                'max'=>':attribute có độ dài tối đa :max ký tự',
                'unique'=>':attribute phải duy nhất trong bảng pages',
            ],
            [
                'title' => 'Tiêu đề trang',
                'content' => 'Nội dung trang',
                'birthday' => 'Ngày tạo trang',
                'category' => 'Bạn phải chọn',
            ]);
            if($request->input('category')=="Giới thiệu"){
                $cat_id=1;
                // return $cat_id;
            }else{
                $cat_id=2;
                // return $cat_id;
            }
        Page::create(
            [
                  'title'=>$request->input('title'),
                  'content'=>$request->input('content'),
                  'birthday'=>$request->input('birthday'),
                  'category'=>$request->input('category'),
                  'cat_id'=>$cat_id,
               ]
            );
        return redirect('admin/page/list')->with('status','Đã thêm dữ liệu thành công');

    }
// Xoa trang bai viet
    function delete($id){
        $page=Page::find($id);
        $page->delete();
        return redirect('admin/page/list')->with('status',"Đã xóa trang {$page->title} thành công");
    }
// Xoa trang bai viet
    public  function edit($id){
        $page=Page::find($id);
        $categorys=Page::all()->unique('category'); //hay
        // return $categorys;
        return view('admin.page.pageedit',compact('categorys','page'));
    }
// Cap nhat trang bai viet
    public function update(Request $request,$id){

        $input=$request->all();
        // return $request->file;
        // return $request->input('file');
        // return $input['file']->getClientOriginalName();
        // if($request->hasFile('file')){
        //     //    echo "Có file"."<br>";
        //         $file=$request->file; //Gán biến file vào $request:$request->file goi đến cái thuộc tính trong $request
        //         // echo $file;
        //         // Lấy tên file
        //               $fileName=$file->getClientOriginalName();
        //             //   echo $file->getClientOriginalName();
        //              $path=$file->move('public/uploads',$file->getClientOriginalName());//Chuyển file lên server(trong folder public/uploads)
        //             // echo $path;
        //              $thumbnail='public/uploads/'.$fileName; //Đường dẫn của file lưu vào database
        //             //  echo $thumbnail;
        //              $input['thumbnail']=$thumbnail;
        //             //  echo $input['thumbnail'];
        //         }
        $request->validate(
            [
                'title' => 'required|string|min:8|max:255|unique:pages',
                'content' => 'required|string|min:8|max:255',
                'birthday' => 'required|date|min:8|max:50',
                'category' => 'required|max:50',

            ],
            [
                'required'=>':attribute không được để trống',
                'category.required'=>':attribute danh mục trang',
                'string'=>':attribute phải có dạng chuỗi',
                'date'=>':attribute phải có dạng ngày tháng',
                'min'=>':attribute có độ dài ít nhât :min ký tự',
                'max'=>':attribute có độ dài tối đa :max ký tự',
                'unique'=>':attribute phải duy nhất trong bảng pages',
            ],
            [
                'title' => 'Tiêu đề trang',
                'content' => 'Nội dung trang',
                'birthday' => 'Ngày tạo trang',
                'category' => 'Bạn phải chọn',
            ]);

            $page=Page::find($id);
            if($request->input('category')=="Giới thiệu"){
                $cat_id=1;
                // return $cat_id;
            }else{
                $cat_id=2;
                // return $cat_id;
            }
        Page::where('id',$id)->update(
            [
                  'title'=>$request->input('title'),
                  'content'=>$request->input('content'),
                  'birthday'=>$request->input('birthday'),
                  'category'=>$request->input('category'),
                  'cat_id'=>$cat_id,
            ]
            );

        return redirect('admin/page/list')->with('status',"Đã cập nhật trang {$page->title} thành công");
    }

    // Phan 24 bai 276 : Thuc hien tac vu tren nhieu ban ghi
    function action(Request $request){
        $list_check=$request->input('list_check');
       if(isset($list_check)){//Kiem tra $list_check da duoc tao thi
                // return $request->input('list_check');

                if(!empty($list_check)){
                    $act=$request->input('act');
                    if($act=='delete'){
                        Page::destroy($list_check);
                        return redirect('admin/page/list')->with('status','Bạn đã xóa tạm thời trang thành công');
                    }
                    if($act=='restore'){
                        Page::withTrashed()
                        ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                        ->restore();
                        return redirect('admin/page/list')->with('status',"Bạn đã khôi phục trang  thành công");
                    }
                    // Phan 24 bai 277 : Xoa vinh vien user
                    if($act=='forceDelete'){
                        Page::withTrashed()
                        ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                        ->forceDelete();
                        return redirect('admin/page/list')->with('status','Bạn đã xõa vĩnh viễn trang thành công');
                    }
                }
       }else{
             return redirect('admin/page/list')->with('status','Bạn cần chọn phần tử cần thực hiện');
       }

}

// Xử lý route gioi thieu phía người dùng
function introduce(Request $request,$id){
    $pages=page::where('cat_id','=',$id)->get();
    if($id==1){$category="Giới thiệu";}else{$category="Liên hệ";}
    // return $pages;
    return view('page',compact('pages','category'));
}

}
