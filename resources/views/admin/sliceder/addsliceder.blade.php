@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4">
                @if (session('status'))
                    <div class="alert alert-success">
                            {{session('status')}}
                            {{-- status : du lieu tu cac action ben AdminPostController sang --}}
                    </div>
                @endif
                <div class="card">

                    <div class="card-header font-weight-bold">
                        Thêm ảnh cho sliceder
                    </div>
                    <div class="card-body">

                        <form action="{{url('admin/sliceder/addstoresliceder')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Ảnh sản phẩm</label><br>
                                <input type="file" name='file' value="{{old('file')}}"/><br>
                                @error('file')
                                     <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục cha</label>
                                <select class="form-control" id="">
                                    <option>Chọn danh mục</option>
                                    <option>Danh mục 1</option>
                                    <option>Danh mục 2</option>
                                    <option>Danh mục 3</option>
                                    <option>Danh mục 4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Chờ duyệt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Công khai
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="addsliceder" value="addcatsliceder">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">

                    <div class="card-header font-weight-bold">
                        Danh sách ảnh sliceder
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">ĐƯỜNG DẪN ẢNH</th>
                                    <th scope="col">NGÀY TẠO</th>
                                    <th scope="col">NGÀY CẬP NHẬT</th>
                                    <th scope="col">TÁC VỤ(XÓA)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t=0;
                                @endphp
                                @foreach ($sliceders as $sliceder )
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{$t}}</th>
                                        <td><a href="{{url($sliceder->image_sliceder)}}">{{$sliceder->image_sliceder}}</a></td>
                                        <td>{{$sliceder->created_at}}</td>
                                        <td>{{$sliceder->updated_at}}</td>
                                        @if(request()->status=='trash')
                                            <td>Đang trong thùng rác, chờ xử lý</td>
                                        @else
                                        <td>
                                            <a href="{{route('delete_sliceder',$sliceder->id)}}" onclick="return confirm('Ban co chac chan xoa ban ghi nay ?')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                        @endif
                                    </tr>
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
