@extends('layouts.admin')
@section('content')
     @if (session('status'))
        <div class="alert alert-success">
                {{session('status')}}
        </div>
     @endif
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách trang</h5>
                <div class="form-search form-inline">
                    <form action="#">
                        <input style="padding:0px;" type="" class="form-control form-search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Tìm kiếm">
                        <input style="padding:6px;" type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>

                <div class="card-body">
                    <div class="analytic">
                        <a href="{{request()->fullUrlwithQuery(['status'=>'active'])}}" class="text-primary">Kích hoạt<span class="text-muted">({{$count[0]}})</span></a>
                        <a href="{{request()->fullUrlwithQuery(['status'=>'trash'])}}" class="text-primary">Vô hiệu hóa<span class="text-muted">({{$count[1]}})</span></a>
                        {{-- <a href="" class="text-primary">Số trang<span class="text-muted"> : {{$count_page}}</span></a> --}}
                    </div>
                  <form action="{{url('admin/page/action')}}">
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
                                <th scope="col">Tiêu đề</th>
                                {{-- <th scope="col">Ảnh</th> --}}
                                <th scope="col">Nội dung</th>
                                {{-- <th scope="col">Danh mục</th> --}}
                                <th scope="col">Danh mục</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($listpages->total()>0)
                                @php
                                    $t=0;
                                @endphp
                                @foreach ($listpages as $listpage )
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" name ="list_check[]" value={{$listpage->id}}>
                                        </td>
                                        <td scope="row">{{$t}}</td>
                                        <td>{{$listpage->title}}</td>
                                        {{-- <td><img src="{{url('')}}{{'/'}}{{$listpage->thumbnail}}" alt=""></td> --}}
                                        <td><a href="">{{$listpage->content}}</a></td>
                                        {{-- <td>{{$listpage->checked}}</td> --}}
                                        <td>{{$listpage->category}}</td>
                                        <td>{{$listpage->birthday}}</td>
                                        @if(request()->status=='trash')
                                             <td>Đang trong thùng rác, chờ xử lý</td>
                                         @else
                                            <td style="">
                                                <a href="{{route('edit_page',$listpage->id)}}" class="btn btn-success btn-sm rounded-0 text-white float-left" style="padding:3px;" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('delete_page',$listpage->id)}}" onclick="return confirm('Ban co chac chan xoa ban ghi nay ?')" style="padding:3px;" class="btn btn-danger btn-sm rounded-0 text-white float-right" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                         @endif
                                    </tr>
                                @endforeach
                         @else
                            <tr>
                                <td colspan="7" class="bg-white text-danger">
                                    Không tìm thấy danh mục bài viết nào trong hệ thống
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
                {{$listpages->links()}}
            </div>
        </div>
    </div>
@endsection

