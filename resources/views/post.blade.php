@extends('layouts.pople')
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="http://localhost/project_unitop_wedsite_shop/" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="list-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">Bài viết:</h3>
                    </div>
                    <div class="section-detail">
                        @foreach ($listcatposts as $catpost )
                        <a href="{{route('catpost',$catpost->id)}}"style="font-size:28px;color:green;">{{$catpost->name}}</a>
                            <ul class="list-item">
                                        @foreach ($listposts as $post )
                                            @if($post->postcat_id==$catpost->id)
                                                <li class="clearfix">
                                                    <a href="{{route('detailpost',$post->id)}}" title="" class="thumb fl-left">
                                                        <img src="{{$post->thumbnail}}" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="{{route('detailpost',$post->id)}}" title="" class="title">{{$post->name}}</a>
                                                            <span class="create-date">Ngày tạo : {{$post->created_at}}</span>
                                                            <p class="desc">{{$post->content}}</p>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                            </ul>
                        @endforeach

                    </div>
                </div>

            </div>
            <div class="sidebar fl-left">
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="?" title="" class="thumb">
                            <img src="{{asset('public/image/banner.png')}}" alt="Logo">
                            {{-- <img src="public/image/banner.png" alt="Logo"> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

