@extends('layouts.admin')
@section('content')
@php
    use App\product;
    use App\productcat;
@endphp
@if (session('status'))
        <div class="alert alert-success">
                {{session('status')}}
        </div>
     @endif
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách sản phẩm</h5>
            <div class="form-search form-inline">
                <form action="#">
                    <input style="padding: 0px 10px;" type="" class="form-control form-search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Tìm kiếm">
                    <input style="padding:6px;" type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{request()->fullUrlwithQuery(['status'=>'active'])}}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}})</span></a>
                <a href="{{request()->fullUrlwithQuery(['status'=>'trash'])}}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{$count[1]}})</span></a>
            </div>
            <form action="{{url('admin/product/actionproduct')}}" method='GET'>
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" id="" name='act'>
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
                            <th scope="col">
                                <input name="checkall" type="checkbox">
                            </th>
                            <th scope="col">STT</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Chi tiết sản phẩm</th>
                            <th scope="col">Mô tả sản phẩm</th>
                            <th scope="col">Danh mục sản phẩm</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Tác vụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($listproducts->total()>0)
                                @php
                                    $t=0;
                                @endphp
                                @foreach ($listproducts as $product )
                                    @php
                                        $t++;
                                    @endphp
                                    <tr class="">
                                        <td>
                                            <input type="checkbox" name ="list_check[]" value={{$product->id}}>
                                        </td>
                                        <td>{{$t}}</td>
                                        <td>{{$product->masp}}</td>
                                        <td><img width="80px" height="80px" src="{{url('')}}{{'/'}}{{$product->thumbnail}}" alt=""></td>
                                        <td><a href="#">{{$product->name}}</a></td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->des_product}}</td>
                                        <td>{{$product->description}}</td>
                                        @if(request()->status=='trash')
                                            @foreach (productcat::withTrashed()->get() as $item)
                                                    @if($item->id==$product->productcat_id )
                                                            <td><a href=""> {{$item->catname}}</a></td>
                                                    @endif
                                            @endforeach
                                        @else
                                         <td><a href=""> {{productcat::find($product->productcat_id)->catname}}</a></td>
                                        @endif
                                        {{-- <td>{{productcat::find($product->productcats_id)->catname}}</td> --}}
                                        <td><span class="badge badge-success">{{$product->status}}</span></td>
                                        @if(request()->status=='trash')
                                            <td>Đang trong thùng rác, chờ xử lý</td>
                                        @else
                                            <td class="d-flex" style="transform: translateY(21px);">
                                                <a href="{{route('edit_product',$product->id)}}"  class="btn btn-success btn-sm rounded-0 text-white float-left" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('delete_product',$product->id)}}"  class="btn btn-danger btn-sm rounded-0 text-white float-right" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                         @else
                                <tr>
                                    <td colspan="7" class="bg-white text-danger">
                                        Không tìm thấy sản phẩm nào trong hệ thống
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
            {{$listproducts->links()}}
        </div>
    </div>
</div>
@endsection

