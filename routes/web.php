<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Dat ten / de logout chuyen ve trang ban dau xem sao
Route::get('/','ProductController@index')->name('product');
 // Ghép theme trang giỏ hàng
 Route::get('cart/detailproduct/{id}','CartController@detailproduct')->name('detailproduct');
//  Show đơn hàng
 Route::get('cart/showcart','CartController@showcart')->name('showcart');
//  Xử lý ajax đơn hàng
//  Route::post('cart/updateajax/{id}','CartController@updateajax')->name('ajaxlaravel');
 Route::post('cart/updateajax','CartController@updateajax')->name('ajaxlaravel');
//  Tim kiem don hang
 Route::get('cart/search','CartController@search')->name('searchorder');
    // Tạo url đặt hàng sản phẩm
 Route::get('cart/add/{id}','CartController@add')->name('cart.add');//Đặt tên thế này để tý nữa để quay lại CartController gọi đến 1 url theo name
    // Tạo url đặt hàng sản phẩm
 Route::get('cart/remove/{rowId}','CartController@remove')->name('cart.remove');
    //  Tạo url đặt hàng sản phẩm
 Route::get('cart/destroy','CartController@destroy')->name('cart.destroy');
    //  Cập nhật giỏ hàng, sử dụng phương thức là post
 Route::post('cart/update','CartController@update')->name('cart.update');
//  Checkout cart
 Route::get('cart/checkout','CartController@checkout')->name('cart.checkout');
//  Thanh toan don hang
 Route::post('cart/insertcart','CartController@insertcart')->name('insertcart');
//  Show đơn hàng của khách hàng vua đăn ký ch khách hàng
 Route::get('cart/showordercustomer/{email}','CartController@showordercustomer')->name('showordercustomer');

// Xay dung route trang bai viet phia nguoi dung
Route::get('/post','AdminPostController@post')->name('post');
Route::get('/detailpost/{id}','AdminPostController@detailpost')->name('detailpost');
Route::get('/catpost/{id}','AdminPostController@catpost')->name('catpost');
// Xay dung route trang gioi thieu phia nguoi dung
Route::get('/introduce/{id}','AdminPageController@introduce')->name('introduce');
// Xay dung route trang lien he phia nguoi dung
Route::get('/contact','AdminPageController@contact')->name('contact');

// Route::get('/', function () {
//     return view('welcome');
// })->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Phan 24 bai 265
// Route::get('dashboard', 'DashboardController@show');
// Phan 24 bao 266
// Route::get('dashboard', 'DashboardController@show')->middleware('auth'); //Khi nguoi dung chua login ma vao trang dashboard thi ta phai rang buoc ho khong se bao loi bang middleware

// Phan 24 bai 267 :them duong dan admin sau chuyen huong ve dashboard
//Route::get('admin', 'DashboardController@show'); //Thuong lam trang unimart thuong them duong dan admin dang sau

// Phan 24 bai 268 : Hien thi danh sach quan tri vien
//Route::get('admin/user/list', 'AdminUserController@list');//->middleware('auth'); Thu cong cho rang buoc middleware de khoi loi khi nguoi dung co tinh truy cap vao admin

// Phan 24 bai 271 : them user
//Route::get('admin/user/add', 'AdminUserController@add');//->middleware('auth');
// Phan 24 bai 271 : them user
//Route::post('admin/user/store', 'AdminUserController@store');//->middleware('auth');

// Phan 24 bai 273 : Su dung Route::middleware('auth')->group(function) de khac phuc loi khi nguoi dung chua login co tinh di vao admin
Route::middleware('auth')->group(function(){
        // Route::get('dashboard', 'DashboardController@show')->name('dashboard'); //Khi nguoi dung chua login ma vao trang dashboard thi ta phai rang buoc ho khong se bao loi bang middleware
        Route::get('dashboard', 'DashboardController@show'); //Khi nguoi dung chua login ma vao trang dashboard thi ta phai rang buoc ho khong se bao loi bang middleware
        // On lai bai xu ly logout chuyen den login
        // Route::get('logout', 'DashboardController@logout'); //Xu ly dc nhung khoang thoat han tai khoan login duoc
        // Phan 24 bai 267 :them duong dan admin sau chuyen huong ve dashboard
        Route::get('admin', 'DashboardController@show'); //Thuong lam trang unimart thuong them duong dan admin dang sau
        // Xu ly nhieu ban ghi trang dashboah
        Route::get('admin/dashboard/deletecustomer/{id}', 'DashboardController@deletecustomer')->name('dashboard.deletecustomer'); //Thuong lam trang unimart thuong them duong dan admin dang sau
        Route::get('admin/dashboard/action', 'DashboardController@action')->name('dashboard.action'); //Thuong lam trang unimart thuong them duong dan admin dang sau

        // Phan 24 bai 268 : Hien thi danh sach quan tri vien
        Route::get('admin/user/list', 'AdminUserController@list');//->middleware('auth'); Thu cong cho rang buoc middleware de khoi loi khi nguoi dung co tinh truy cap vao admin

        // Phan 24 bai 271 : them user
        Route::get('admin/user/add', 'AdminUserController@add');//->middleware('auth');
        // Phan 24 bai 271 : them user
        Route::post('admin/user/store', 'AdminUserController@store');//->middleware('auth');

        // Phan 24 bai 274 : Xoa user khoi he thong
        Route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('delete_user');//->middleware('auth');

        // Phan 24 bai 276 : Thuc hien tac vu tren nhieu ban ghi
        Route::get('admin/user/action', 'AdminUserController@action');//->middleware('auth');

         // Phan 24 bai 278 : Cap nhat thong tin nguoi dung
         Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('user.edit');//->middleware('auth');
         // Phan 24 bai 278 : Cap nhat thong tin nguoi dung
         Route::post('admin/user/update/{id}', 'AdminUserController@update')->name('user.update');//->middleware('auth');

         // Module Page
        Route::get('admin/page/list','AdminPageController@list');
        Route::get('admin/page/add','AdminPageController@add');
        Route::post('admin/page/store','AdminPageController@store');
        Route::get('admin/page/delete/{id}','AdminPageController@delete')->name('delete_page');
        Route::get('admin/page/edit/{id}','AdminPageController@edit')->name('edit_page');
        Route::post('admin/page/update/{id}','AdminPageController@update')->name('update_page');
        Route::get('admin/page/action', 'AdminPageController@action');//->middleware('auth');

        // Module Post
        Route::get('admin/post/list','AdminPostController@list');
        Route::get('admin/post/edit/{id}','AdminPostController@edit')->name('edit_post');
        Route::post('admin/post/update/{id}','AdminPostController@update')->name('update_post');
        Route::get('admin/post/delete/{id}','AdminPostController@delete')->name('delete_post');
        Route::get('admin/post/addpost','AdminPostController@addpost');
        Route::post('admin/post/store','AdminPostController@store');
        Route::get('admin/post/actionpost','AdminPostController@actionpost');
        //  Module cat post
        Route::get('admin/post/cat/addcat','AdminPostController@addcat');
        Route::post('admin/post/storeaddcat','AdminPostController@storeaddcat');
        Route::get('admin/post/cat/editcat/{id}','AdminPostController@editcat')->name('edit_cat_post');
        Route::get('admin/post/cat/updatecat/{id}','AdminPostController@updatecat')->name('update_cat_post');
        Route::get('admin/post/cat/deletecat/{id}','AdminPostController@deletecat')->name('delete_cat_post');

        // Module Product
        // Danh muc san pham
        Route::get('admin/product/cat/addcatproduct','AdminProductController@addcatproduct');
        Route::post('admin/product/storeaddcatproduct','AdminProductController@storeaddcatproduct');
        Route::get('admin/product/cat/editcatproduct/{id}','AdminProductController@editcatproduct')->name('edit_cat_product');
        Route::get('admin/product/cat/updatecatproduct/{id}','AdminProductController@updatecatproduct')->name('update_cat_product');
        Route::get('admin/product/cat/deletecatproduct/{id}','AdminProductController@deletecatproduct')->name('delete_cat_product');
        // San pham
        Route::get('admin/product/editcatproduct/{id}','AdminProductController@editcatproduct')->name('edit_cat_product');
        Route::get('admin/product/updatecatproduct/{id}','AdminProductController@updatecatproduct')->name('update_cat_product');
        Route::get('admin/product/deletecatproduct/{id}','AdminProductController@deletecatproduct')->name('delete_cat_product');
        // San pham
        Route::get('admin/product/addproduct','AdminProductController@addproduct');
        Route::get('admin/product/editproduct/{id}','AdminProductController@editproduct')->name('edit_product');
        Route::post('admin/product/updateproduct/{id}','AdminProductController@updateproduct');
        Route::post('admin/product/storeproduct','AdminProductController@storeproduct');
        Route::get('admin/product/deleteproduct/{id}','AdminProductController@deleteproduct')->name('delete_product');
        Route::get('admin/product/actionproduct','AdminProductController@actionproduct');
        Route::get('admin/product/listproduct','AdminProductController@listproduct');

        // Module sliceder
        Route::get('admin/sliceder/addsliceder','AdminslicederController@addsliceder');
        Route::post('admin/sliceder/addstoresliceder','AdminslicederController@addstoresliceder');
        Route::get('admin/sliceder/deletesliceder/{id}','AdminslicederController@deletesliceder')->name('delete_sliceder');

        // Module icon header, footer, backtotop
        Route::get('admin/icon/addicon','AdminIconController@addicon');
        Route::post('admin/icon/addstoresicon','AdminIconController@addstoresicon');
        Route::get('admin/icon/deleteicon/{id}','AdminIconController@deleteicon')->name('delete_icon');

        // Module don hang
        Route::get('admin/order/listorder','AdminOrderController@listorder');
        // Route::get('admin/order/deleteorder/{id}','AdminOrderController@deleteorder')->name('order.delete');
        Route::get('admin/order/deletecustomer/{id}','AdminOrderController@deletecustomer')->name('customer.delete');
        Route::get('admin/order/actioncustomer','AdminOrderController@actioncustomer');

    //    testcontroller
        // Route::get('admin/order/listorder','AdminCustomerController@listorder');
        // Route::get('admin/order/deletecustomer/{id}','AdminCustomerController@deletecustomer')->name('customer.delete');
        // Route::get('admin/order/actioncustomer','AdminCustomerController@actioncustomer');
});

