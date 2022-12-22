@extends('layouts.pople')
@section('content')

{{-- Khai bao thang nay de su dung cho danh muc san pham:Tu bang productcat tim ra cac san pham tuong ung de cho xuat hien ul li cho dep --}}
        @php
            use App\product;
        use App\productcat;
        @endphp
        <div id="main-content-wp" class="clearfix category-product-page">
            <div class="wp-inner">
                <div class="secion" id="breadcrumb-wp">
                    <div class="secion-detail">
                        <ul class="list-item clearfix">
                           @if (!empty(request()->input('id')))
                            <li>
                            <a href="http://localhost/project_unitop_wedsite_shop/" title="">Trang chủ</a>
                             </li>
                             <li>
                                <a href="" title="">{{ $productcat->catname }}</a>
                                 </li>
                            @else
                            <li>
                                <a href="http://localhost/project_unitop_wedsite_shop/" title="">Trang chủ</a>
                                 </li>

                           @endif

                        </ul>
                    </div>
                </div>
                <div class="main-content fl-right" style="height: 400px">

                    <div class="section" id="slider-wp">
                        @if($slider->count() > 0)
                        <div class="section-detail"  >
                            @foreach ($slider as $sli )
                            <div class="item" style="max-height: 300px;">
                                <img  src="{{ url($sli->image_sliceder)}}" class=".img-fluid"  alt="Logo 3">
                            </div>
                            @endforeach

                        </div>

                        @endif
                    </div>
                    <div class="section" id="list-product-wp">
                        <div class="section-head clearfix">
                            {{-- <h3 class="section-title fl-left">Laptop</h3> --}}
                            
                            <div class="section" id="support-wp">
                                
                                <div class="section-detail" >
                                    <ul class="list-item clearfix">
                                        <li>
                                            <div class="thumb">
                                                <img src="{{asset('public/image/icons/icon-1.png')}}">
                                            </div>
                                            <h3 class="title">Miễn phí vận chuyển</h3>
                                            <p class="desc">Tới tận tay khách hàng</p>
                                        </li>
                                        <li>
                                            <div class="thumb">
                                                <img src="{{asset('public/image/icons/icon-2.png')}}">
                                            </div>
                                            <h3 class="title">Tư vấn 24/7</h3>
                                            <p class="desc">1900.9999</p>
                                        </li>
                                        <li>
                                            <div class="thumb">
                                                <img src="{{asset('public/image/icons/icon-3.png')}}">
                                            </div>
                                            <h3 class="title">Tiết kiệm hơn</h3>
                                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                                        </li>
                                        <li>
                                            <div class="thumb">
                                                <img src="{{asset('public/image/icons/icon-4.png')}}">
                                            </div>
                                            <h3 class="title">Thanh toán nhanh</h3>
                                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                                        </li>
                                        <li>
                                            <div class="thumb">
                                                <img src="{{asset('public/image/icons/icon-5.png')}}">
                                            </div>
                                            <h3 class="title">Đặt hàng online</h3>
                                            <p class="desc">Thao tác đơn giản</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="filter-wp fl-right">
                                <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>
                                <div class="form-filter">
                                    <form method="" action="">
                                        <select name="select">
                                            <option value="0" {{request()->input('select')==0?"selected=selected":''}}>Sắp xếp</option>
                                            <option value="1" {{request()->input('select')==1?"selected=selected":''}}>Từ A-Z</option>
                                            <option value="2" {{request()->input('select')==2?"selected=selected":''}} >Từ Z-A</option>
                                            <option value="3" {{request()->input('select')==3?"selected=selected":''}}>Giá cao xuống thấp</option>
                                            <option value="4" {{request()->input('select')==4?"selected=selected":''}}>Giá thấp lên cao</option>
                                        </select>
                                        <button type="submit">Lọc</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Test onlai --}}
                        {{-- @empty($users)
                             <p>Không có user nào</p>
                         @endempty --}}
                        <div class="section-detail">
                            @if(isset($products))
                                <ul class="list-item clearfix">
                                    @if(count($products))
                                            @foreach ($products as $product )
                                                <li>
                                                    <a href="{{route('detailproduct',$product->id)}}" title="" class="thumb">
                                                        <img src="{{$product->thumbnail}}">
                                                    </a>
                                                    <a href="{{route('detailproduct',$product->id)}}" title="" class="product-name">{{$product->name}}</a>
                                                    <div class="price">
                                                        <span class="new">{{number_format($product->price,0,',','.')}}đ</span>
                                                    </div>
                                                    <div class="action clearfix">
                                                        <a href="{{route('cart.add',$product->id)}}" style="margin-left:45px;" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                                    </div>
                                                </li>
                                            @endforeach
                                    @else
                                        <a href="" title="" class="thumb">
                                            <p style="color:red;">Không có sản phẩm nào phù hợp tiêu chí tìm kiếm</p>
                                        </a>
                                    @endif
                                </ul>
                            @endisset
                        </div>

                    </div>

                    <div class="section" id="paging-wp">
                         <div class="section-detail">
                            <ul class="list-item clearfix">
                                 {{$products->links()}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="sidebar fl-left">
                    <div class="section" id="category-product-wp">
                        <div class="section-head">
                            <h3 class="section-title">Danh mục sản phẩm</h3>
                        </div>
                        @if(isset($productcats))
                                <div class="secion-detail">
                                    @foreach ($productcats as $productcat )
                                            <ul class="list-item">
                                                <li>
                                                    <a href="{{request()->fullUrlwithQuery(['id'=>$productcat->id])}}" title="">{{$productcat->catname}}</a>
                                                    @if (count($productcat->products)>0)
                                                        <ul class="sub-menu">
                                                            @foreach ($the_firms as $the_firm )
                                                                    @if($productcat->id==$the_firm->productcat_id)
                                                                        <li>
                                                                            <a href="{{request()->fullUrlwithQuery(['the_firm'=>$the_firm->the_firm])}}" title="">{{$the_firm->the_firm}}</a>
                                                                        </li>
                                                                    @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            </ul>
                                    @endforeach
                                </div>
                        @endif
                    </div>
                    <div class="section" id="filter-product-wp">
                        <div class="section-head">
                            <h3 class="section-title">Bộ lọc</h3>
                        </div>
                        <div class="section-detail">
                            <form method="GET" action="">
                                <table>
                                    <thead>
                                        <tr>
                                            <td colspan="2">Giá</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="radio" name="price" value=5></td>
                                            <td>Dưới 5.000.000đ</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="price" value=1></td>
                                            <td>5.000.000đ - 10.000.000đ</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="price" value=2></td>
                                            <td>10.000.000đ - 15.000.000đ</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="price" value=3></td>
                                            <td>15.000.000đ - 20.000.000đ</td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="price" value=4></td>
                                            <td>Trên 20.000.000đ</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table>
                                    <thead>
                                        <tr>
                                            <td colspan="2">Hãng</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($the_firms))
                                            @foreach ($the_firms as $the_firm )
                                                <tr>
                                                    <td><input type="radio" name="brand" value="{{$the_firm->the_firm}}"></td>
                                                    <td>{{$the_firm->the_firm}}</td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                                <table>
                                    <thead>
                                        <tr>
                                            <td colspan="2">Loại</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($productcats))
                                            @foreach ($productcats as $productcat )
                                                <tr>
                                                    <td><input type="radio" name="species" value={{$productcat->id}}></td>
                                                    <td>{{$productcat->catname}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <input type="submit" name="select_fillter" value="Submit">
                            </form>
                        </div>
                    </div>
                    <div class="section" id="banner-wp">
                        <div class="section-detail">
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="{{asset('public/image/banner.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

