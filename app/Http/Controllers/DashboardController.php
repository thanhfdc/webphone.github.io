<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\order;
use App\customercancel;
class DashboardController extends Controller
{

    // Phan 24 bai 280 : Active menu nguoi dung truy cap
    // Tao phuong thuc khoi tao construct
    function __construct(){
                 // Su dung middleware toi uu cho active module_active
            //  Su dung middleware de rang buoc cai session khi di vao moi module, sesion se duoc thay doi theo thiet lap o moi module
            // Neu khong co middleware thi session luon lay cai dau tien la dashbord->khong dung yeu cau bai toan dat ra
        $this->middleware(function($request,$next){
            Session(['module_active'=>'dashboard']);
            return $next($request);
        });
    }

    //Phan 24 bai 265
    function show(Request $request){
        $status=request()->input('status');
        $list_act = [
            'delete'=>'Xóa tạm thời'
        ];
        $list_act = [
            'delete'=>'Xóa tạm thời'
        ];
        if($status=='trash'){
            $list_act = [
                'restore'=>'Khôi phục',
                'forceDelete'=>'Xóa vĩnh viễn',
            ];
            $customers=customer::onlyTrashed()->paginate(20);
            $orders=order::onlyTrashed()->paginate(20);
        }else{
                    // Cach 1:  Nhieu dk orwhere
                    // $query
                        // ->where('category_id', $categoryId)
                        // ->orWhere('name', $name)
                        // ->orWhere('description', $description)
                        // ->get();

                        // Cach 2 :  Nhieu dk orwhere
                        // $query
                        // ->where('category_id', $categoryId)
                        // ->orWhere(['name' => $name, 'description' => $description])
                        // ->get();
                    $keyword="";
                    if($request->input('keyword')){
                        $keyword=$request->input('keyword');
                    }
                    // if(is_string($keyword)){ //Kiem tra du lieu cua chuoi
                    //     return 'Oke';
                    // }
                    // $testso=is_float($keyword);
                    // return $keyword;
                    // return $testso;
                    // Cach 1 : Lay tren nhieu truong cua bang
                    $customers=customer::where('fullname','LIKE',"%{$keyword}%")
                    ->orWhere('email','LIKE',"%{$keyword}%")
                    ->orWhere('address','LIKE',"%{$keyword}%")
                    ->orWhere('phone','LIKE',"%{$keyword}%")
                    // ->orWhere('subtotal','>',(int)$keyword)
                    ->orWhere('payment_method','LIKE',"%{$keyword}%")
                    ->orWhere('created_at','LIKE',"%{$keyword}%")
                    // ->orWhere('subtotal','>',(int)$keyword) //cung khong duoc
                    ->paginate();
                    // Cach 2 : Lay tren nhieu truong cua bang nhung phai cho vao mang gia tri cu the moi duoc
                    // $customers=customer::where('fullName','LIKE',"%{$keyword}%")
                    // ->orWhere(['email','LIKE',"%{$keyword}%",'address','LIKE',"%{$keyword}%",'phone','LIKE',"%{$keyword}%",'payment_method','LIKE',"%{$keyword}%",'created_at','LIKE',"%{$keyword}%"])
                    // ->paginate(5);

                    foreach ($customers as $item){
                        $customers_id[]=$item->id;
                    }
                        $id = !empty($customers_id)? $customers_id : [0];
                    // return $customers_id;
                    // $orders=order::paginate(20);
                    $orders=order::whereIn('customer_id', $id) // lay theo elequent model cung oke(moi quan he one to many)
                    ->paginate(20);
                    // dd($orders);
                    // return  $orders;
        }

        // return $sum_subtotal;
        // return $customers_id;
        // $orders=order::withTrashed()->whereIn('customer_id',$customers_id)->paginate(20);

        // return $orders;
        $count_products=0;
        foreach($orders as $item){
            $count_products+=$item->qty;
        }
        // $sum_subtotal=customer::sum('subtotal'); //Tong tien lay chet theo bang du lieu

        // $count_products=order::withTrashed()->whereIn('customer_id',$customers_id)->sum('qty');
    //    $count_customers=customer::all()->count(); //tong thanh vien lay chet theo bang du lieu
       $count_customers=count($customers);
       $sum_subtotal_all=customer::withTrashed()->sum('subtotal');
       $sum_onlyTrashed=customer::onlyTrashed()->sum('subtotal');
        $sum_subtotal=0;
        foreach($customers as $item){
            $sum_subtotal+=$item->subtotal;
        }
        // return $count_products;
        $count_active=customer::count(); //phuong thuc lay so luong cua ORM->HAY
        $count_trash=customer::onlyTrashed()->count();//phuong thuc lay so luong cua ORM->HAY
        $count_cancel=customercancel::count();//Don hang da huy
        $count=[$count_active,$count_trash,$count_cancel];
        // $customers_id=array();
        // return $count_products;
        return view('admin.dashboard',compact('customers','list_act','count','orders','sum_subtotal','sum_subtotal_all','sum_onlyTrashed','count_products','count_customers'));
        // return view('admin.dashboard',compact('orders','list_act','count','count_customers','count_products','sum_subtotal','sum_subtotal_all'));
    }
  // Xoa khach hang
  function deletecustomer($id){
    $status=request()->input('status');
    $customer=customer::find($id);
    // return $customer;
    $customer->delete();
    // Xoa san pham cho vao thung rac theo khach hang
    $orders=order::where('customer_id',$id)->delete();
    // return $orders;
    // Xoa khach hang dong thoi xoa luon san pham(order) khong se bao loi
    // $deleteproduct=order::where('customer_id','=',$id)->delete();
    return redirect('admin')->with('status','Đã xóa tạm thời khách hàng thành công');
}

    function action(Request $request){
        $list_check=$request->input('list_check');
        // return $list_check;
        if(isset($list_check)){//Kiem tra $list_check da duoc tao thi
                    // return $request->input('list_check');
                    if(!empty($list_check)){
                        // $test=product::onlyTrashed()->get(); //lay id
                        // $test=customer::onlyTrashed()
                        // ->whereIn('id',$list_check)
                        // ->get();
                        // $list_productcat_id=array();
                        // foreach($test as $item ){
                        //     $list_productcat_id[]=$item->productcat_id;
                        // }
                        $act=$request->input('act');
                        if($act=='delete'){
                            // return $act;
                            customer::destroy($list_check);
                            return redirect('admin')->with('status','Bạn đã xóa tạm thời khách hàng thành công');
                        }
                        if($act=='restore'){
                                customer::withTrashed()
                                ->whereIn('id',$list_check) //Khoi phuc danh muc theo mang $list_productcat_id lay o tren
                                ->restore();

                                order::withTrashed()
                                ->whereIn('customer_id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                                ->restore();
                            return redirect('admin')->with('status','Bạn đã khôi phục khách hàng thành công');
                        }
                        // Phan 24 bai 277 : Xoa vinh vien customer
                        if($act=='forceDelete'){
                            // Xoa vinh vien khach hang
                            $order_cancel=customer::onlyTrashed()
                            ->whereIn('id',$list_check)->get();
                            // return $order_cancel;
                            foreach($order_cancel as $item){
                                customercancel::create(
                                    [
                                        'fullname'=>$item->fullname,
                                        'email'=>$item->email,
                                        'address'=>$item->address,
                                        'phone'=>$item->phone,
                                        'note'=>$item->note,
                                        'subtotal'=>$item->subtotal,
                                        'payment_method'=>$item->payment_method,
                                     ]
                                    );
                            }
                            customer::onlyTrashed()
                            ->whereIn('id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                            ->forceDelete();
                            // Xoa vinh vien san pham
                            order::withTrashed()
                            ->whereIn('customer_id',$list_check) //đk:id co thuoc tap hop $list_check hay khong : da hoc cau truc nay trong elequent ORM
                            ->forceDelete();
                            return redirect('admin')->with('status','Bạn đã xõa vĩnh viễn khách hàng và sản phẩm của khách hàng này thành công');
                        }
                    }
                    return redirect('admin')->with('status','Bạn phải chọn hình thức xóa tạm thời, xóa vĩnh viễn hoặc khôi phục');
        }else{
                return redirect('admin')->with('status','Bạn cần chọn phần tử cần thực hiện');
        }
    }

    // On lai : xu ly logout tai khoan theo cach minh xem sao ->khong duoc
    // function logout(){
    //     // unset(session) : khong duoc
    //     // return view('auth.login');
    // }
}
