@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Trang edit trang
            </div>
            <div class="card-body">
                <form action="{{url('admin/page/update',$page->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Tiêu đề trang</label>
                        <input class="form-control" type="text" name="title" id="name" value="{{$page->title}}">
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung trang</label>
                        <textarea name="content" class="form-control" id="content" cols="30" rows="5">{{$page->content}}</textarea>
                        @error('content')
                        <small class="text-danger">{{$message}}</small>
                   @enderror
                    </div>
                    <div class="form-group">
                        <label for="birthday">Ngày tạo</label>
                        <input class="form-control" type="date" name="birthday" id="birthday" value="{{$page->birthday}}">
                        @error('birthday')
                             <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="form-control" id="" name="category" >
                                    <option>Chọn danh mục</option>
                                @foreach ($categorys as $category )
                                    <option value="{{$category ->category}}" {{$category ->cat_id==$page->cat_id?"selected=selected":""}} >{{$category->category}}</option>
                                @endforeach
                        </select>
                        @error('category')
                                <small class="text-danger">{{$message}}</small>
                         @enderror
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
                    <button type="submit" class="btn btn-primary" name="btn-insertpage" value="btn-insertpage">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
