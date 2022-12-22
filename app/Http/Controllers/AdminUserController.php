<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;//KHai bao thu vien nay de su dung ham ma hoa Hash hon MD5 rat nhieu
use Illuminate\Support\Facades\Auth;
use App\User;


class AdminUserController extends Controller
{

    // Phan 24 bai 280 : Active menu nguoi dung truy cap
    // Tao phuong thuc khoi tao construct
    function __construct(){
        $this->middleware(function($request,$next){
             // Su dung middleware toi uu cho active module_active
            //  Su dung middleware de rang buoc cai session khi di vao moi module, sesion se duoc thay doi theo thiet lap o moi module
            // Neu khong co middleware thi session luon lay cai dau tien la dashbord->khong dung yeu cau bai toan dat ra ->HAY
            Session(['module_active'=>'user']);
            return $next($request);
        });
    }

    //Phan 24 bai 268 : Hien thi danh sach thanh vien
    function list(Request $request){
        // Phan 24 bai 269 : viet chuc nang tim kiem nguoi dung
        //return $request->input('keyword'); //Day la cach lay duoc thong tin tu tren url xuong, phai khai bao request o trong ham

    //    Phan 24 bai 275 : thong ke user theo trang thai : kích hoạt:active va vô hiệu hóa:trash
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
            // $users=User::all(); //loi vi da su dung thung rac
            // $users=User::withoutTrashed()->paginate(5); //ElequentORM : lay nhung ban ghi ngoai thung rac
            $users=User::onlyTrashed()->paginate(3); //ElequentORM : lay nhung ban ghi trong thung rac
        }else{
            // Phan 24 bai 269 : viet chuc nang tim kiem nguoi dung
            $keyword="";
            if($request->input('keyword')){
                $keyword=$request->input('keyword');
            }
            $users=User::where('name','LIKE',"%{$keyword}%")->paginate(3);
// "%{$keyword}%" : Cach lay bang users theo toan tu LIKE

            //$users=User::withTrashed()->where('name','LIKE',"%{$keyword}%")->paginate(5);//xuat ca nhung thang da xoa tam thoi
            //dd($users);//In du lieu print
            //dd($users->total());//In du lieu print
            // Phan 24 bai 268
            // $users=User::all();
           // $users=User::paginate(1);//Thuc hien phan trang( de 10 user tren 1 ban ghi chang han)
            // return $user;
        }
        $count_user_active=User::count(); //phuong thuc lay so luong cua ORM->HAY
        $count_user_trash=User::onlyTrashed()->count();//phuong thuc lay so luong cua ORM->HAY
        $count=[$count_user_active,$count_user_trash];

        return view('admin.user.list',compact('users','count','list_act')); //Gui du lieu sang view de xu ly hien thi,list_act o phan 24 bai 277

    }

    // Phan 24 bai 271 : Them user
        function add(){

            return view('admin.user.add');
        }
        // Nơi xu ly submit btn-add(action form) la store
        function store(Request $request){
            if($request->input('btn-add')){
                // return $request->input();//xem tat ca
                // return $request->input('name');//xem tat ca
             }
            // Phan 24 bai 272 :validate form
            // Nhanh chong nhat vao auth/Register copy sang va validate
            $request->validate(
                [
                    'name' => 'required', 'string', 'max:255',
                    'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                    'password' => 'required', 'string', 'min:8', 'confirmed',
                    'password_confỉm' => 'required', 'string', 'min:8', 'confirmed',

                ],
                [
                    'required'=>':attribute không được để trống',
                    'min'=>':attribute có độ dài ít nhât : min ký tự',
                    'max'=>':attribute có độ dài tối đa : max ký tự',
                    'confirmed'=>'Xác nhận mật khẩu không thành công'
                ],
                [
                    'name' => 'Tên người dung',
                    'email' => 'Email',
                    'password' => 'Mật khẩu',
                    'password_confỉm'=>'Xác nhận mật khẩu'
                ]);
                // Insert user vao he thong
                User::create(
                    [
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => Hash::make($request->input('password')),//Ham Hash::make : ma hoa hon rat nhieu ham md5
                    ]
                );
                return redirect('admin/user/list')->with('status','Đã thêm thành viên thành công');
        }

        // Phan 24 bai 274 : Xoa ban ghi khoi he thong
        function delete($id){
            if(auth::id()!=$id){ //Kiem tra xem id cua user dang dang nhap co khac voi id truyen vao hay khong
                $user=User::find($id);
                $user->delete(); //phuong thuc xoa cua ELEQUENT ORM
                return redirect('admin/user/list')->with('status','Đã xóa tạm thời thành viên thành công');
            }else{
                return redirect('admin/user/list')->with('status','Bạn không thể tự xóa mình ra khỏi hệ thống');
            }
        }

        // Phan 24 bai 276 : Thuc hien tac vu tren nhieu ban ghi
        function action(Request $request){
                $list_check=$request->input('list_check');
                // <input type="checkbox" name ="list_check[]" value={{$user->id}}>
                // name ="list_check[]" : quy tac dat ten cho checkbox trong php
                // $list_check=$request->all();
               if(isset($list_check)){//Kiem tra $list_check da duoc tao thi
                        // return $request->input('list_check');
                        // return $request->all();
                        foreach($list_check as $k=>$id){
                            if(Auth::id()==$id){
                                unset($list_check[$k]); //Loại bo user dang login khi nguoi dung lo chon vao user dang login
                            }
                        }
                        if(!empty($list_check)){
                            $act=$request->input('act');
                            if($act=='delete'){
                                User::destroy($list_check);
                                return redirect('admin/user/list')->with('status','Bạn đã xóa tạm thời thành công');
                            }
                            if($act=='restore'){
                                User::withTrashed()
                                ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                                ->restore();
                                return redirect('admin/user/list')->with('status','Bạn đã khôi phục thành công');
                            }
                            // Phan 24 bai 277 : Xoa vinh vien user
                            // Cau truc dieu kien cung tuong tu cua mysql phan WHERE IN)
                            if($act=='forceDelete'){
                                User::withTrashed()
                                ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                                ->forceDelete();
                                return redirect('admin/user/list')->with('status','Bạn đã xõa vĩnh viễn user thành công');
                            }
                        }
                        return redirect('admin/user/list')->with('status','Bạn phải chọn hình thức xóa tạm thời, xóa vĩnh viễn hoặc khôi phục');
               }else{
                     return redirect('admin/user/list')->with('status','Bạn cần chọn phần tử cần thực hiện');
               }

        }

        // Phan 24 bai 278 : Cap nhat thong tin user
      public  function edit($id){
            $user=User::find($id);
            return view('admin.user.edit',compact('user'));
        }
        // Phan 24 bai 278 : Cap nhat thong tin user
       public function update(Request $request,$id){
            // if($request->input()){
                // dd($request->all());
                //  return $request->input();//xem tat ca
                //  return $request->all();//xem tat ca
            //  }
            $request->validate(
                [
                    'name' => 'required', 'string', 'max:255',
                    // 'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
                    'password' => 'required', 'string', 'min:8', 'confirmed',
                    'password_confỉm' => 'required', 'string', 'min:8', 'confirmed',

                ],
                [
                    'required'=>':attribute không được để trống',
                    'min'=>':attribute có độ dài ít nhât : min ký tự',
                    'max'=>':attribute có độ dài tối đa : max ký tự',
                    'confirmed'=>'Xác nhận mật khẩu không thành công'
                ],
                [
                    'name' => 'Tên người dung',
                    // 'email' => 'Email',
                    'password' => 'Mật khẩu',
                    'password_confỉm'=>'Xác nhận mật khẩu'
                ]);
                // Cập nhật lại thông tin user
                User::where('id',$id)->update(
                    [
                        'name' => $request->input('name'),
                        // 'email' => $request->input('email'),
                        'password' => Hash::make($request->input('password')),//Ham Hash::make : ma hoa hon rat nhieu ham md5, TOI THIEU 60 KY TU, TRONG DB TA DE HAN 100 CHO YEN TAM
                    ]
                    );


                return redirect('admin/user/list')->with('status','Đã cập nhật user thành công');

        }



}
