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
                        THÊM Danh mục sản phẩm
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/product/storeaddcatproduct')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input class="form-control" type="text" name="catname" id="name" value="{{old('catname')}}">
                                @error('catname')
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
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh sách Danh mục
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Danh mục sản phẩm</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Ngày cập nhật</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t=0;
                                @endphp
                                @foreach ($catproducts as $catproduct)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{$t}}</th>
                                        <td>{{$catproduct->catname}}</td>
                                        <td>{{$catproduct->created_at}}</td>
                                        <td>{{$catproduct->updated_at}}</td>
                                        @if(request()->status=='trash')
                                        <td>Đang trong thùng rác, chờ xử lý</td>
                                    @else
                                    <td>
                                        <a href="{{route('edit_cat_product',$catproduct->id)}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="{{route('delete_cat_product',$catproduct->id)}}" onclick="return confirm('Ban co chac chan xoa ban ghi nay ?')" class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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
