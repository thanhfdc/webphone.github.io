<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
   {{-- Phan 24 bai 266 --}}
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <title>Admintrator</title>
</head>

<body>
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="?">UNITOP ADMIN</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        {{-- Phan 24 bai 267 : Thiet lap duong dan cho cac tac vu --}}
                        <a class="dropdown-item" href="{{url('admin/page/add')}}">Thêm trang</a>
                        <a class="dropdown-item" href="{{url('admin/product/addproduct')}}">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="{{url('admin/order/list')}}">Thêm đơn hàng</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{-- Phan 24 bai 266 : hien thi user dang nhap --}}
                       {{Auth::user()->name}}

                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Tài khoản</a>

                        {{-- Phan 24 bai 266 --}}
                        {{-- Paste thang nay vao day moi logout duoc : --}}
                        {{-- He thong laravel bat phai logout qua phuong thuc nay(cua ben app.blade.php): copy ben app.blade.php(layout cua he thong auth cua laravel) --}}
                        <a class="dropdown-item" href="{{ url('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        {{-- Phan 24 bai 280 : Tao active cho module , xuat thu o day--}}
            @php
                $module_active=session('module_active');
            @endphp
            {{-- dd($module_active); --}}

        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <p class="text-danger">{{$module_active}}</p>

                <ul id="sidebar-menu">
                    <li class="nav-link {{$module_active=='dashboard'?'active':''}}">
                         {{-- Phan 24 bai 267 : Thiet lap duong dan cho cac tac vu --}}
                        <a href="{{url('dashboard')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Dashboard
                        </a>
                        {{-- <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/page/add')}}">Thêm mới</a></li>
                            <li><a href="{{url('admin/page/list')}}">Danh sách</a></li>
                        </ul> --}}
                    </li>
                    <li class="nav-link {{$module_active=='page'?'active':''}}">
                        <a href="{{url('admin/page/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Trang
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{url('admin/page/add')}}">Thêm mới</a></li>
                            <li><a href="{{url('admin/page/list')}}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='post'?'active':''}}">
                         {{-- Phan 24 bai 267 : Thiet lap duong dan cho cac tac vu --}}
                        <a href="{{url('admin/post/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Bài viết
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            {{-- Phan 24 bai 267 : Thiet lap duong dan cho cac tac vu --}}
                            <li><a href="{{url('admin/post/addpost')}}">Thêm bài viết</a></li>
                            <li><a href="{{url('admin/post/list')}}">Danh sách bài viết</a></li>
                            <li><a href="{{url('admin/post/cat/addcat')}}">Thêm danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='product'?'active':''}}">
                        <a href="{{url('admin/product/listproduct')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/product/addproduct')}}">Thêm sản phẩm</a></li>
                            <li><a href="{{url('admin/product/listproduct')}}">Danh sách sản phẩm</a></li>
                            <li><a href="{{url('admin/product/cat/addcatproduct')}}">Thêm danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='sliceder'?'active':''}}">
                        <a href="{{url('admin/sliceder/addsliceder')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Sliceder
                        </a>
                        <i class="arrow fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/sliceder/addsliceder')}}">Thêm sliceder</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='icon'?'active':''}}">
                        <a href="{{url('admin/icon/addicon')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Icon wedsite
                        </a>
                        <i class="arrow fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/icon/addicon')}}">Thêm icon header,footer,backtotop</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='order'?'active':''}}">
                        <a href="{{url('admin/order/listorder')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Bán hàng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/order/listorder')}}">Đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="nav-link {{$module_active=='user'?'active':''}}">
                        <a href="{{url('admin/user/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Users
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{url('admin/user/add')}}">Thêm mới</a></li>
                            <li><a href="{{url('admin/user/list')}}">Danh sách</a></li>
                        </ul>
                    </li>

                    <!-- <li class="nav-link"><a>Bài viết</a>
                        <ul class="sub-menu">
                            <li><a>Thêm mới</a></li>
                            <li><a>Danh sách</a></li>
                            <li><a>Thêm danh mục</a></li>
                            <li><a>Danh sách danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link"><a>Sản phẩm</a></li>
                    <li class="nav-link"><a>Đơn hàng</a></li>
                    <li class="nav-link"><a>Hệ thống</a></li> -->

                </ul>
            </div>
            <div id="wp-content">
              {{-- Phan 24 bai 266 --}}
                    @yield('content')
            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- Phan 24 bai 266 --}}
    <script src="{{url('public/js/app.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
