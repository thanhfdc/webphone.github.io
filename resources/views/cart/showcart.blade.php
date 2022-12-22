@extends('layouts.pople')
@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="http://localhost/project_unitop_wedsite_shop//" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏi hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <form class="form-control-lg" action="{{route('cart.update')}}" method="POST">
                    {{-- <!-- @csrf : Hình thức bảo mật của laravel cung cấp cho form  --> --}}
                       @csrf
                       {{ csrf_field() }}
                       @if(Cart::count()>0)

                        <table class="table">
                            <thead>
                                <tr>
                                    <td>STT</td>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                    <td>Xóa</td>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- Do du lieu san pham     --}}
                                    @php
                                        $t=0;
                                    @endphp
                                    @foreach(Cart::content() as $row)
                                        @php
                                            $t++;
                                        @endphp
                                        <tr>
                                            <td>{{$t}}</td>
                                            <td>{{$row->options->masp}}</td>
                                            <td>
                                                <a href="{{asset('/')}}" title="" class="thumb">
                                                    <img src="{{asset($row->options->thumbnail)}}" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" title="" class="name-product">{{$row->name}}</a>
                                            </td>
                                            <td>{{number_format($row->price,0,',','.')}}</td>
                                            <td>
                                                <input type="number" data-id="{{$row->rowId}}" name="qty[{{$row->rowId}}]" min=1 value="{{$row->qty}}" class="num-order">
                                            </td>
                                            <td id="sub-total-{{$row->rowId}}">{{number_format($row->total,0,',','.')}}đ</td>
                                            <td>
                                                <a href="{{route('cart.remove',$row->rowId)}}" title="" class="del-product"><i id="hover_delete" class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá: <strong>{{Cart::total()}}đ</strong></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                 <!-- Baif 238 : Cập nhật giỏ hàng-->
                                               <input type="submit" style="padding: 9px; background:#3f5da6;color:white" value="CẬP NHẬT GIỎ HÀNG" class="btn" name="btn-update">
                                                {{-- <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a> --}}
                                                <a href="{{route('cart.checkout')}}" title="" id="checkout-cart">Thanh toán</a>
                                                <a href="{{route('cart.destroy')}}" style="padding:13px;background:#3f5da6;color:white;">XÓA GIỎ HÀNG</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        @endif
                    </form>
            </div>
        </div>
        @if(Cart::count() >0)
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="{{route('product')}}" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="{{route('cart.destroy')}}" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
        @else
        <div class="section" id="action-cart-wp">

            <div class="section-detail">
               <form action="{{route('searchorder')}}" method="GET">
                @csrf
                    <label for="emailcustomer">Nhập email</label>
                    <br>
                    <input type="email" style="min-width:300px;" name="email" value="{{old('email')}}" id="email">
                    <br>
                    @error('email')
                            <small class="text-danger" style="color:red;margin-top:10px;">{{$message}}</small>
                    @enderror
                    <input type="submit" name="search" style="margin-top:10px;" value="Tìm kiếm">
               </form>
               @if (session('status'))
                    <div class="alert alert-success">
                        <p style="margin-top:10px;">{{session('status')}}</p>
                    </div>
                @endif
                <p class="title" style="color:red;margin-top:10px;">Không có sản phẩm nào trong giỏ hàng, Click vào <a href="{{route('product')}}">Trang sản phẩm</a> để quay về trang sản phẩm</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
