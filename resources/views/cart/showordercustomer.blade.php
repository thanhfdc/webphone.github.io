@extends('layouts.pople')
@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản phẩm đã mua</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        {{-- KHÁCH HÀNG --}}
        <div class="section" id="info-cart-wp">
            <h1 style="font-size:24px;color:red;margin:15px;">KHÁCH HÀNG</h1>
            <div class="section-detail table-responsive">
                <form class="form-control-lg" action="{{route('cart.update')}}" method="POST">
                    {{-- <!-- @csrf : Hình thức bảo mật của laravel cung cấp cho form  --> --}}
                       @csrf
                       @if(!empty($customer))
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Họ tên</td>
                                    <td>Email</td>
                                    <td>Địa chỉ</td>
                                    <td>Số điện thoại</td>
                                    <td>Ghi chú</td>
                                    <td>Thanh toán</td>
                                    <td>Thời gian đặt hàng</td>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- Do du lieu khach hang  --}}
                                        <tr>
                                            <td>{{$customer->fullname}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->note}}</td>
                                            <td>{{$customer->payment_method}}</td>
                                            <td>{{$customer->created_at}}</td>
                                        </tr>
                            </tbody>
                        </table>
                        @endif
                    </form>
            </div>
            <h1 style="font-size:24px;color:red;margin:15px;">SẢN PHẨM ĐÃ MUA</h1>
                {{-- Don hang --}}
            <div class="section-detail table-responsive">
                <form class="form-control-lg" action="{{route('cart.update')}}" method="POST">
                    {{-- <!-- @csrf : Hình thức bảo mật của laravel cung cấp cho form  --> --}}
                       @csrf
                       @if(!empty($order_customer))

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
                                    <td>Thanh toán</td>
                                    <td>Thời gian đặt hàng</td>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- Do du lieu san pham  --}}
                                    @php
                                        $t=0;
                                    @endphp
                                    @foreach($order_customer as $row)
                                        @php
                                            $t++;
                                        @endphp
                                        <tr>
                                            <td>{{$t}}</td>
                                            <td>{{$row->masp}}</td>
                                            <td>
                                                <a href="{{asset('/')}}" title="" class="thumb">
                                                    <img src="{{asset($row->thumbnail)}}" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" title="" class="name-product">{{$row->name}}</a>
                                            </td>
                                            <td>{{number_format($row->price,0,',','.')}}</td>
                                            <td>
                                                <input type="number" name="qty[{{$row->id}}]" value="{{$row->qty}}" class="num-order">
                                            </td>
                                            <td>{{number_format($row->subtotal,0,',','.')}}đ</td>
                                            <td>{{$row->payment}}</td>
                                            <td>{{$row->created_at}}</td>
                                        </tr>
                                        @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">TỔNG ĐƠN HÀNG: <strong>{{number_format($sumorder,0,',','.')}}đ</strong></p>
                                        </div>
                                    </td>
                                </tr>

                            </tfoot>
                        </table>
                        @endif
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
