@extends('layouts.admin')
@section('content')

        <div id="content" class="container-fluid">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm sản phẩm
                </div>
                <div class="card-body">
                    <form action="{{url('admin/product/storeproduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="masp">Mã sản phẩm</label>
                                    <input class="form-control" type="text" name="masp" id="masp" value="{{old('masp')}}">
                                    @error('masp')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="file">Ảnh sản phẩm</label><br>
                                    <input type="file" name='file' value="{{old('file')}}"/><br>
                                    @error('file')
                                         <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên sản phẩm</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input class="form-control" type="number" name="price" id="price" value="{{old('price')}}" >
                                    @error('price')
                                         <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Tình trạng</label>
                                    <input class="form-control" type="text" name="status" id="price" value="{{old('status')}}">
                                    @error('status')
                                         <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="the_firm">Hãng</label>
                                    <input class="form-control" type="text" name="the_firm" id="price" value="{{old('the_firm')}}">
                                    @error('the_firm')
                                         <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Chi tiết sản phẩm</label>
                            <textarea name="description-product" class="form-control" id="intro" cols="30" rows="5">{{old('description-product')}}</textarea>
                            <script>
                                CKEDITOR.replace( 'description-product' );
                            </script>
                            @error('description')
                                    <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả sản phẩm</label>
                            <textarea name="description" class="form-control" id="intro" cols="30" rows="5">{{old('description')}}</textarea>
                            <script>
                                CKEDITOR.replace( 'description' );
                            </script>
                            @error('description')
                                    <small class="text-danger">{{$message}}</small>
                             @enderror
                        </div>
                        <div class="form-group">
                            <label for="list">Danh mục</label>
                            <select name="products_id" class="form-control" id="list">
                                <option value="">Chọn danh mục</option>
                                @foreach ($catproducts as $catproduct)
                                      <option value={{$catproduct->id}}>{{$catproduct->catname}}</option>
                                @endforeach
                            </select>
                            @error('products_id')
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
                        <button type="submit" class="btn btn-primary" name="btn_addproduct">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

