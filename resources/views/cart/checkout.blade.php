@extends('layouts.pople')
@section('content')
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('insertcart')}}" name="form-checkout">
        @csrf
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">

                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname" value="{{old('fullname')}}">
                            @error('fullname')
                                    <small class="text-danger" style="color:red;" >{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{old('email')}}">
                            @error('email')
                                    <small class="text-danger" style="color:red;">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="{{old('address')}}">
                            @error('address')
                                 <small class="text-danger" style="color:red;">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone" value="{{old('phone')}}">
                            @error('phone')
                                <small class="text-danger" style="color:red;">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note">{{old('note')}}</textarea>
                            @error('note')
                                 <small class="text-danger" style="color:red;">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                @if(Cart::count()>0)
                        <table class="shop-table">
                            <thead>
                                <tr>
                                    <td>Sản phẩm</td>
                                    <td>Tổng</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $row)
                                     <tr class="cart-item">
                                        <td class="product-name">{{$row->name}}<strong class="product-quantity">x {{$row->qty}}</strong></td>
                                        <td class="product-total">{{number_format($row->total,0,',','.')}}đ</td>
                                    </tr>
                                 @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="order-total">
                                    <td>Tổng đơn hàng:</td>
                                    <td><strong class="total-price">{{Cart::total()}}đ</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                @endif
                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment_method" value="online" >
                            <label for="direct-payment">Thanh toán online</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment_method" value="at-home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                        @error('payment_method')
                                 <small class="text-danger" style="color:red;">{{$message}}</small>
                        @enderror
                    </ul>
                </div>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Thực hiện">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

