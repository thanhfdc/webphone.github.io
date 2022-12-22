<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CustomerMail;//Khi go lenh Mail::to('wedquach1981@gmail.com')->send(new DemoMail); se tự hiện ra, khong hien thi danh vao
use Illuminate\Support\Facades\Mail; //phai khai bao ca thu vien nay ko se loi
use App\productcat;
use App\product;
use App\customer;
use App\order;
use Gloudemans\Shoppingcart\Facades\Cart; //khai bao thu vien cart
class CartController extends Controller
{
        //  Ghép thêm trang giỏ hàng
        function showcart(Request $request){

            return view('cart/showcart');
        }
        function search(Request $request){
            $request->validate(
                [
                    'email' => 'required|email|max:50',
                ]);
            $email=request()->email;
            // return $email;
                return redirect(route('showordercustomer',$email));
            }
        // Trang chi tiet san pham
        function detailproduct($id){
            // $posts=post::paginate(5);
            $product=product::find($id);
            // return $product->the_firm;
            $products=product::where('the_firm','LIKE',$product->the_firm)->get();
            // return $products;
            $productcats=productcat::all();
            $the_firms=product::all()->unique('the_firm'); //hay
            return view('cart/detailproduct',compact('product','productcats','the_firms','products'));
        }

        function add(Request $request,$id){
            // cart + tab sẽ sinh ra thư viên Gloudemans\Shoppingcart\Facades\Cart trên cùng : VSC của mình lại không được là sao->tìm hiểu lại sau
            // Cart::add($id, "Product {$id}", 1, 9.99);
            // return Cart::content();
            // Hiển thị dạng print cho dễ nhìn
            // echo "<pre>";
            // print_r(Cart::content());
            // echo "</pre>";
            // return "Thêm sản phẩm {$id} vào giỏ hàng";

            // Bài 232 : Thêm sản phẩm vào giỏ hàng : cấu trúc dạng mảng
            // Lấy thông tin sản phẩm:
            $product=Product::find($id);
            // return $product;
            // Cart::destroy();//Xóa toàn bộ giỏ hàng

            $qty=request()->all();
            // return $qty['num_order'];
            // dd($request->input());
            if(!empty(request()->all())){
                $qty=request()->all()['num_order'];
            }else{
                $qty=1;
            }
            Cart::add(
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $qty,
                    'price' => $product->price,
                    //  CHỉ được 4 tham số chính thôi, còn lại phải cho vào tham số phụ : ảnh, kích thươc, mau sac
                    // 'options' => ['size' => 'large'] //Tham số đính kèm thêm những thông tn phụ
                    // Bài 234 : Hiển thị hình ảnh sản phẩm trong giỏ hàng
                    'options' => [
                                    'thumbnail' => $product->thumbnail,
                                    'masp'=>$product->masp
                                 ], //Tham số đính kèm thêm những thông tin phụ
                ]);
                // return Cart::content();
                // return Cart::get('54379001b5101c50449eb2b932ca5f2f');

            return redirect('cart/showcart');
        }
        // Bài 235 : Xóa sản phẩm trong giỏ hàng
        function remove($rowId){
            Cart::remove($rowId);
            return redirect('cart/showcart');
        }
        // Bài 237 : Xóa toàn bộ sản phẩm trong giỏ hàng
        function destroy(){
            Cart::destroy();//Xóa toàn bộ giỏ hàng
            return redirect('cart/showcart');
        }
        // Bài 239 : Cập nhật giỏ hàng
        function update(Request $request){
            // dd($request->all());//Hàm dd xuất dữ liệu tương tự nhue hàm prin_r
        // dd($request->input());//Hàm dd xuất dữ liệu tương tự nhu hàm prin_r
            // return Cart::get('rowId');
            $data=$request->get('qty');
            foreach($data as $k=>$v){
                Cart::update($k,$v);
            }
            return redirect('cart/showcart');

        }

        // Thanh toan gio hang:checkoutcart
        function checkout(){
            $cart=Cart::content();
            // return $cart;

            return view('cart.checkout');
        }
        // Luu thong tin gio hang
        function insertcart(Request $request){
            $cart=Cart::content();
            // $customer=$request->all();
            // return $customer;
            // return $cart;
            $request->validate(
                [
                    'fullname'=>'required|string|max:50',
                    'email'=>'required|email|max:50',
                    'address'=>'required|string|max:255',
                    'phone'=>'required|max:40',
                    'note'=>'required|string|max:255',
                    'payment_method'=>'required|string|max:50',
                ],
                [
                    'required'=>':attribute không được để trống',
                    'payment_method.required'=>':attribute phương thức thanh toán',
                    'max'=>':attribute có độ dài tối đa :max ký tự',
                    'unique'=>':attribute phải duy nhất'
                ],
                [
                    'fullname' => 'Họ và tên',
                    'email' => 'Email',
                    'address' => 'Địa chỉ',
                    'phone' => 'Số điện thoại',
                    'note' => 'Ghi chú',
                    'payment_method' => 'Bạn phải chọn',
                ]);
                $email=$request->input('email');
                // return $email;
                $subtotal=0;
                foreach (Cart::content() as $item){
                    $subtotal+=$item->subtotal;
                }
                $id_customerinsert=customer::create(
                [
                      'fullname'=>$request->input('fullname'),
                      'email'=>$request->input('email'),
                      'address'=>$request->input('address'),
                      'phone'=>$request->input('phone'),
                      'note'=>$request->input('note'),
                      'subtotal'=>$subtotal,
                      'payment_method'=>$request->input('payment_method'),
                   ]
                )->id;
                // return $id_customerinsert;
                // $id_insert=$this->conn->insert_id; lap trinh oop -> khong lay duoc id vua insert
                // echo  $id_insert; lap trinh php -> khong lay duoc id vua insert
                $customer_insert=customer::find($id_customerinsert); //tham khao tren google lay id cua thang vua insert->hay
                // return $customer_insert;

                // tu duy cua minh
                // $customer_insert=customer::where('email','=',$email)->first();

                // $id =  customer::create(
                //     [
                //           'fullname'=>$request->input('fullname'),
                //           'email'=>$request->input('email'),
                //           'address'=>$request->input('address'),
                //           'phone'=>$request->input('phone'),
                //           'note'=>$request->input('note'),
                //           'payment_method'=>$request->input('payment_method'),
                //        ]
                //     )->id; //cach lay id cua ban ghi vua insert oke
                    // return $id_customerinsert; //Lay id cua thang vua insert vao
                // return $id_insert;
                // return $id_insert->id;
                // $id_customerinsert=$customer_insert->id;
                $id_customerpayment=$customer_insert->payment_method;
                foreach ($cart as $item){
                    order::create(
                        [
                            'masp'=>$item->options->masp,
                            'thumbnail'=>$item->options->thumbnail,
                            'name'=>$item->name,
                            'price'=>$item->price,
                            'qty'=>$item->qty,
                            'subtotal'=>$item->subtotal,
                            'payment'=>$id_customerpayment,
                            'customer_id'=>$id_customerinsert,
                           ]
                        );
                }

                Cart::destroy();
                    // Gui mail cho khach hang
                    // Mail::to('Tên mail nhận')->send(new Tên email : Nội dung là tên file DemoMail(noi dung gui mail trong file Demomail tao o buoc truoc se return ve view/mails/demo.blade.php) ben nhan mail se la view nay(html));
                            // Bài 212 : Gửi dữ liệu động từ controller
                                $data=[
                                    'key1'=>'Đơn hàng đã được xác nhận, thời gian nhận hàng sơm nhất sau 1 tuần kể từ ngày nhận được mail này', //$data là mảng
                                ];
                            Mail::to($email)->send(new CustomerMail($data));
                           // $data la tham so(du lieu se la kieu mang truyen sang view demo.blade.php qua DemoMail.php)

                  // return redirect()->route('post.show');
                return redirect()->route('showordercustomer',$email);
        }

        // Show đơn hàng của khách hàng vừa đăng ký
        function showordercustomer($email){
            // return "Oke";
            // return $id_customerinsert;
            // return $email;
            $customer=customer::where('email','=',$email)->first();
            if(empty($customer)){
                return redirect('cart/showcart')->with('status','Không có đơn hàng nào');
            }
            // return $customer->id;
            // $order_customer=order::where('customer_id','=',$customer->id)->get(); //lay theo tu duy cua minh->oke
            $order_customer=customer::find($customer->id) // lay theo elequent model cung oke(moi quan he one to many)
            ->products;
            // return $order_customer;
            // Lay tong gia tri don hang
            //   $sumorder=order::count(); //lay so luong don hang
            //   return $sumorder;
            //   $testsumorder=order::sum('subtotal'); //lay tong gia tri don hang oke
            // $count = Post::where('publish', true)->count();
            //   $testsumorder=order::where('customer_id','=',$customer->id)->sum('subtotal'); //lay tong gia tri don hang co dieu kien oke
            //   return $testsumorder;
            // $sumorder=0;
            // foreach($order_customer as $subtotal){
            //     $sumorder+=$subtotal->subtotal;
            // }
            $sumorder=order::where('customer_id','=',$customer->id)->sum('subtotal'); //hay
            // return $sumorder;
            //  SELECT SUM(`subtotal`) FROM `orders`:Cau lenh trong mysql khong duoc

            return view('cart.showordercustomer',compact('order_customer','customer','sumorder'));
        }

    // Xử lý azax
    function updateajax(Request $request){
        $id = request()->id;
        $qty = request()->qty;
         Cart::update($id,$qty);
        $data=array(
            'sub_total'=>number_format(Cart::get($id)->subtotal,0,',','.')."đ",
            'total'=>Cart::total()."Đ",
            'count_cart'=>Cart::count()
        );
        echo json_encode($data);
    }

}
