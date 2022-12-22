@extends('layouts.pople')
@section('content')

        <div id="main-content-wp" class="clearfix detail-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="http://localhost/project_unitop_wedsite_shop//" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">{{$product->name}}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="{{asset('/')}}" title="" id="main-thumb">
                                <img id="" src="{{asset($product->thumbnail)}}"/>
                            </a>

                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name">Tên sản phẩm: {{$product->name}}</h3>
                            <div class="desc">
                               {!! $product->des_product !!}
                            </div>
                            <div class="num-product">
                                <span class="title">Tình trạng: </span>
                                <span class="status">Còn hàng</span>
                            </div>
                            <p class="price">{{number_format($product->price,0,',','.')}}đ</p>
                            <form action="{{route('cart.add',$product->id)}}" method="GET">
                                <div id="num-order-wp">
                                    <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                         <input type="text" name="num_order" min=1 value="1" id="num-order">
                                    <a title="" id="plus"><i class="fa fa-plus"></i></a>
                                </div>
                                <input type="submit" style="background:green;color:white;padding:5px;" name="add_cart" value="Thêm giỏ hàng">
                                {{-- <a href="{{route('cart.add',$product->id)}}" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a> --}}
                            </form>

                        </div>
                    </div>
                </div>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail">
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                <div class="section" id="same-category-wp">
                    <div class="section-head">
                        <h3 class="section-title">Cùng chuyên mục</h3>
                    </div>
                    <div class="section-detail">
                        @if(isset($products))
                            <ul class="list-item">
                                @foreach ($products as $item )
                                    <li>
                                            <a href="{{route('detailproduct',$item->id)}}" title="" class="thumb">
                                                <img src="{{asset($item->thumbnail)}}" alt="Logo">
                                            </a>
                                            <a href="" title="" class="product-name">{{$item->name}}</a>
                                            <div class="price">
                                                <span class="new">{{number_format($item->price,0,',','.')}}đ</span>
                                            </div>
                                            <div class="action clearfix">
                                                <a href="{{route('detailproduct',$item->id)}}" title="" style="margin-left:45px;" class="add-cart fl-left">Chọn sản phẩm</a>
                                            </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
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
                                                <a href="{{route('product','id='.$productcat->id)}}" title="">{{$productcat->catname}}</a>
                                                {{-- hay cai url nay --}}
                                                @if (count($productcat->products)>0)
                                                    <ul class="sub-menu">
                                                        @foreach ($the_firms as $the_firm )
                                                                @if($productcat->id==$the_firm->productcat_id)
                                                                    <li>
                                                                        <a href="{{route('product','the_firm='.$the_firm->the_firm)}}" title="">{{$the_firm->the_firm}}</a>
                                                                        {{-- hay cai url nay --}}
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

