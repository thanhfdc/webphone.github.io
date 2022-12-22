@extends('layouts.pople')
@section('content')
        <div id="main-content-wp" class="cart-page">
            <div class="section" id="breadcrumb-wp">
                <div class="wp-inner">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <a href="http://localhost/project_unitop_wedsite_shop/" title="">Trang chủ</a>
                            </li>
                            <li>
                                <a href="" title="">Giới thiệu</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="wrapper" class="wp-inner clearfix">
                {{-- KHÁCH HÀNG --}}
                <div class="section" id="info-cart-wp">
                    <h1 style="font-size:24px;color:red;margin:15px;">{{$category}}</h1>
                    <div class="section-detail table-responsive">
                        @if(isset($pages))
                            <form class="form-control-lg" action="{{route('cart.update')}}" method="POST">
                                {{-- <!-- @csrf : Hình thức bảo mật của laravel cung cấp cho form  --> --}}
                                @csrf

                                        <table class="table">
                                                <thead>
                                                    <tr>
                                                        <td>Tiêu đề trang</td>
                                                        <td>Nội dung trang</td>
                                                        <td>Danh mục trang</td>
                                                        <td>Ngày tạo</td>
                                                        <td>Ngày cập nhật</td>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($pages)>0)
                                                        @foreach($pages as $page)
                                                                <tr>
                                                                    <td>{{$page->title}}</td>
                                                                    <td>{{$page->content}}</td>
                                                                    <td>{{$page->category}}</td>
                                                                    <td>{{$page->birthday}}</td>
                                                                    <td>{{$page->created_at}}</td>
                                                                </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan=5><p style="color:red;font-size:20px;">Không có trang nào</p></td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                        </table>

                                </form>
                            @else
                                <p style="color:red;font-size:20px;">Không tồn tại trang</p>
                         @endif
                    </div>

                </div>

            </div>
        </div>

@endsection

