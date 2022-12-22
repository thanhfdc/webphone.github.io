@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Chỉnh sửa bài viết
            </div>
            <div class="card-body">
                <form action="{{url('admin/post/update',$post->id)}}" method="POST" enctype="multipart/form-data">
                {{-- <form action="{{url('admin/post/add')}}" method="GET"> --}}
                    @csrf
                    <div class="form-group">
                        <label for="name">Tiêu đề bài viết</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{$post->name}}">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">Ảnh bài viết</label><br>
                        <input type="file" name='file' value="{{old('file')}}"/><br>
                        @error('file')
                             <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung bài viết</label>
                        <textarea name="content" class="form-control" id="content" name="content" cols="30" rows="5">{{$post->content}}</textarea>
                        @error('content')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select class="form-control" id="" name="postcat">
                        <option value="">Chọn danh mục</option>
                            @foreach ($postcats as $name )
                                <option value="{{$name->id}}" {{$name->id==$post->postcat_id?'selected=selected':''}} >{{$name->name}}</option>
                            @endforeach
                        </select>
                        @error('postcat')
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
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
