{{-- Phan 24 bai 268 --}}
@extends('layouts.admin')
@section('content')
<?php use Illuminate\Support\Facades\Auth; ?>
{{-- Khai bao use Illuminate\Support\Facades\Auth; -> de su dung thu vien auth o dong 83 --}}
    <div id="content" class="container-fluid">
        <div class="card">
            {{-- Phan 24 bai 272 --}}
            @if (session('status'))
            <div class="alert alert-success">
                    {{session('status')}}
                    {{-- status : du lieu tu cac action ben AdminUserController sang --}}
            </div>
            @endif

            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách thành viên</h5>
                {{-- Phan 24 bai 269 : Viet chuc nang tim kiem nguoi dung --}}
                <div class="form-search form-inline">
                    <form action="#">
                        {{-- <input style="padding : 10px;" type="text" class="form-control form-search float-left" name="keyword" value="{{old('keyword')}}" placeholder="Tìm kiếm"> --}}
                        <input style="padding : 10px;" type="text" class="form-control form-search float-left" name="keyword" value="{{request()->input('keyword')}}" placeholder="Tìm kiếm">
                        {{-- {{request()->input('keyword')}} : cho thang nay vao de khi nguoi dung nhap gia tri tim kiem thi van hien thi khi an submit form:HAY --}}
                        <input style="margin-left:5px;"type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary float-left">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    {{-- Phan 24 bai 275 : Tao trang thai cua user : active va vô hieu hóa(trash) --}}
                    {{-- Ham fullUrlwithquery : Hệ thống sẽ lấy request hien tai nối thêm 1 tham so nua:https://localhost/ten du an?status=active hoac trash --}}
                    {{-- <a href="{{request()->url('')."?status"."="."active"}}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}})</span></a> --}}
                    {{-- Dung cau truc tren them tham so cung duoc nhung dai dong ho cua thay Cuong --}}
                    <a href="{{request()->fullUrlwithQuery(['status'=>'active','speed'=>'fast'])}}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}})</span></a>
                    <a href="{{request()->fullUrlwithQuery(['status'=>'trash'])}}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{$count[1]}})</span></a>
                    {{-- <a href="{{request()->url('')."?status"."="."trash"}}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{$count[1]}})</span></a> --}}
                </div>
                {{-- Phan 24 bai 276 : Thuc hien tac vu tren nhieu ban ghi:khai bao the mo form, dong form va thay doi gia tri cua option thanh chon, xoa, khoi phuc --}}
                <form action="{{url('admin/user/action')}}" method="">
                        <div class="form-action form-inline py-3">
                            <select class="form-control mr-1" id="" name="act">
                                <option>Chọn</option>
                                @foreach ($list_act as $k => $act)
                                    <option value="{{$k}}">{{$act}}</option>
                                @endforeach
                                {{-- <option value="delete">Xóa</option>
                                <option value="restore">Khôi phục</option> --}}
                            </select>
                            <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                        </div>
                        <table class="table table-striped table-checkall">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="checkall">
                                    </th>
                                    <th scope="col">#</th>
                                    <th scope="col">Họ tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Quyền</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Su dung cau truc duet mang de xuat du lieu --}}
                                {{-- Phan 24 bai 269 : dung if kiem tra de xuat du lieu --}}
                                @if ($users->total()>0)
                                        @php
                                            $t=0;
                                        @endphp
                                        @foreach ($users as $user)
                                                @php
                                                    $t++;
                                                @endphp
                                                <tr>
                                                    <td>
                                                        {{-- Phan 24 bai 276 : Thuc hien tac vu tren nhieu ban ghi, tao name="list_check" --}}
                                                        <input type="checkbox" name ="list_check[]" value={{$user->id}}>
                                                        {{-- name ="list_check[]" : quy tac dat ten cho input checkbox trong php--}}
                                                    </td>
                                                    <th scope="row">{{$t}}</th>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>Admintrator(lam sau)</td>
                                                    <td>{{$user->created_at}}</td>
                                                    @if(request()->status=='trash')
                                                        <td>Đang trong thùng rác</td>
                                                    @else
                                                        <td>
                                                            {{-- route('user.edit : ten cua  Route::get('admin/user/edit/{id} --}}
                                                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-success btn-sm rounded-0 text-white float-left" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                        {{-- Phan 24 bai 274 : Xoa ban ghi ra khoi he thong --}}
                                                            @if(auth::id()!=$user->id)
                                                                    {{--auth::id(): id cua user login,$user->id la id cua user trong vong lap  --}}
                                                                    {{-- onclick="return confirm('Ban co chac chan xoa ban ghi nay ?') : su kien cua javascript : muon hien thi thong bao the nao thi dien vao --}}
                                                                    <a href="{{route('delete_user',$user->id)}}" onclick="return confirm('Ban co chac chan xoa ban ghi nay ?')" class="btn btn-danger btn-sm rounded-0 text-white float-right" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                            {{-- route('delete_user' : ten cua Route::get('admin/user/delete/{id} --}}
                                                            {{-- onclick="return confirm('Ban co chac chan xoa ban ghi nay ?')" --}}
                                                            @endif
                                                        </td>
                                                    @endif
                                                </tr>
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="bg-white text-danger">
                                            Không tìm thấy user nào trong hệ thống
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                </form>
                {{-- <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">Trước</span>
                                <span class="sr-only">Sau</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav> --}}

                {{-- Su dung laravel xuat thanh phan trang --}}
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection

