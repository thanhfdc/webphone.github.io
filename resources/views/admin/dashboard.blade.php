{{-- Phan 24 bai 266 --}}
@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-5">
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                            <div class="card-body">
                                <h5 class="card-title">{{number_format($sum_subtotal_all-$sum_onlyTrashed,0,',','.')}}</h5>
                                <p class="card-text">Đơn hàng giao dịch thành công</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">ĐANG XỬ LÝ</div>
                            <div class="card-body">

                                <h5 class="card-title">@if($count[1]>0) {{$count[1]}} @else 0 @endif</h5>
                                <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">DOANH SỐ</div>
                            <div class="card-body">
                                <h5 class="card-title">{{number_format($sum_subtotal_all,0,',','.')}}</h5>
                                <p class="card-text">Doanh số hệ thống</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header">ĐƠN HÀNG HỦY</div>
                            <div class="card-body">
                                <h5 class="card-title">@if($count[2]>0) {{$count[2]}} @else 0 @endif</h5>
                                <p class="card-text">Số đơn hàng bị hủy trong hệ thống</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end analytic  -->
                <div class="card">
                    <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                        <h5 class="m-0 ">Danh sach Khách hàng</h5>
                        <div class="form-search form-inline">
                            <form action="#">
                                <input style="padding: 5px; margin-left:10px" type="" class="form-control form-search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Tìm kiếm">
                                <input style="padding: 5px; margin-left:10px" type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="analytic">
                            <a href="{{request()->fullUrlwithQuery(['status'=>'active'])}}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}}</span></a>
                            <a href="{{request()->fullUrlwithQuery(['status'=>'trash'])}}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{$count[1]}})</span></a>
                        </div>
                 <form action="{{url('admin/dashboard/action')}}" method="GET">
                        <div class="form-action form-inline py-3">
                            <select class="form-control mr-1" id="" name="act">
                                <option>Chọn</option>
                                @foreach ($list_act as $k => $act)
                                     <option value="{{$k}}">{{$act}}</option>
                                 @endforeach
                            </select>
                            <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                        </div>
                        <table class="table table-striped table-checkall">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="checkall">
                                    </th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Ghi chú</th>
                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Thanh toán</th>
                                    <th scope="col">Thời gian đặt hàng</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($customers->total()>0) --}}
                                @if (!empty($customers))
                                {{-- @if ($posts->total()>0) --}}
                                    @php
                                        $t=0;
                                    @endphp
                                    @foreach ($customers as $customer )
                                        @php
                                            $t++;
                                        @endphp
                                        <tr>
                                            <td>
                                                <input type="checkbox" name ="list_check[]" value={{$customer->id}}>
                                            </td>
                                            <td>{{$t}}</td>
                                            <td>{{$customer->fullname}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->note}}</td>
                                            <td>{{number_format($customer->subtotal,0,',','.')}}</td>
                                            <td>{{$customer->payment_method}}</td>
                                            <td>{{$customer->created_at}}</td>
                                            @if (request()->status=='trash')
                                                 <td>Đang trong thùng rác, chờ xử lý</td>
                                                 @else
                                                 <td>
                                                    <a href="{{route('dashboard.deletecustomer',$customer->id)}}" onclick="return confirm('Ban co chac chan xoa ban ghi nay ?')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="bg-white text-danger">
                                            Không tìm thấy khách hàng nào trong hệ thống
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </form>
                    <h3>Tổng khách hàng :{{$count_customers}}</h3>
                    <h3>Tổng Tiền : {{number_format($sum_subtotal,0,',','.')}}</h3>
                        {{$customers->links()}}

                    </div>
                </div>
            </div>


            <h1>Danh sach sản phẩm của các đơn hàng</h1>
            <div id="content" class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-checkall">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="checkall">
                                    </th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã SP</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên SP</th>
                                    <th scope="col">Giá SP</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Thanh toán</th>
                                    <th scope="col">Mã KH(ĐH)</th>
                                    <th scope="col">Thời gian đặt hàng</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t=0;
                                @endphp
                                @foreach ($orders as $order)
                                    @php
                                        $t++;
                                    @endphp
                                        <tr>
                                            <td>
                                                <input type="checkbox">
                                            </td>
                                            <td>{{$t}}</td>
                                            <td>{{$order->masp}}</td>
                                            {{-- <td><img src="{{url($order->thumbnail)}}" alt=""></td> --}}
                                            <td>{{$order->thumbnail}}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{number_format($order->price,0,',','.')}}</td>
                                            <td>{{$order->qty}}</td>
                                            <td>{{number_format($order->subtotal,0,',','.')}}</td>
                                            <td>{{$order->payment}}</td>
                                            <td>{{$order->customer_id}}</td>
                                            <td>{{$order->created_at}}</td>
                                            @if(request()->status=='trash')
                                                 <td>Chờ xử lý</td>
                                                 @else
                                                 <td>Thành công</td>
                                            @endif
                                        </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <h3>Tổng sản phẩm : {{$count_products}}</h3>
                        <h3>Tổng Tiền : {{number_format($sum_subtotal,0,',','.')}}</h3>

                       {{$orders->links()}}
                    </div>
                </div>
            </div>
    </div>
@endsection

