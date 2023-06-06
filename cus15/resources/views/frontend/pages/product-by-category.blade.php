@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')
@section('content')
<div class="content-wrapper">
    <div class="main2">
        @if(count($category->childs)>0)
        @else
        <div class="banner-breadcrumds" style="background-image: url({{$category->avatar_path}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="title-breadcrumbM">
                            {{$category->name}}
                        </div>
                        <div class="breadcrumbsM clearfix">
                            <ul>
                                @isset($breadcrumbs,$typeBreadcrumb)
                                    @include('frontend.components.breadcrumbs',[
                                        'breadcrumbs'=>$breadcrumbs,
                                        'type'=>$typeBreadcrumb,
                                    ])
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <script type="text/javascript">
            $(document).ready(function() {
                $('.filter-title').click(function() {
                    $(this).parent().find('.filters-container').slideToggle();
                });

                $('.filter-item-name').click(function() {
                    $(this).parent().toggleClass('active');
                });
            });
        </script>

        <div class="sec-lvhd-child">
            <div class="container">
                <div class="noidung_in" style="margin-bottom: 20px;">
                    {!! $category->content !!}
                </div>
            </div>
        </div>

        <div class="section_project p-y-30">
                <div class="container">
					
                    <div class="project-content">
                      
                        <div class="row row-project">
                                
                            <div class="product-item col-lg-4 col-md-5">
                                <div class="product-title">
                                    <div>
                                        <p>
                                            <a href="">
                                                <strong>65WR6BE</strong>
                                            </a>
                                            <a href=""><br></a>
                                            65” ADVANCED INTERACTIVE DISPLAY
                                        </p>
                                    </div>
                                </div>
                                <div class="product-img">
                                    <a href=""><img src="../frontend/images/product.png" alt=""></a>
                                </div>
                                <div class="product-more">
                                    <a href="">Learn More<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-2"></div>

                            <div class="product-item2 col-lg-4 col-md-5">
                            <div class="product-title">
                                    <div>
                                        <p>
                                            <a href="">
                                                <strong>65WR6BE</strong>
                                            </a>
                                            <a href=""><br></a>
                                            65” ADVANCED INTERACTIVE DISPLAY
                                        </p>
                                    </div>
                                </div>
                                <div class="product-img">
                                    <a href=""><img src="../frontend/images/product.png" alt=""></a>
                                </div>
                                <div class="product-more">
                                    <a href="">Learn More<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>                       
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="pagination-group">
                                    @if (count($data))
                                    {{$data->appends(request()->all())->links()}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    
                    </div>
    
                </div>
            </div>


    
       {{-- <div class="section_lvhd p-t-95 p-b-125 relative" style="background-image:url({{$category->avatar_path}})">
            <div class="bg-overlay absolute"></div>
            <div class="container">
                
                <div class="noidung_in" style="margin-bottom: 20px;">
                    {!!$category->content!!}
                </div>
                
            </div>
            <div class="container">
                <div class="section_lvhd-title-more">
                    <div class="section_lvhd-title relative">
                        <h3 class="relative white txt-uppercase ">{{$category->name}}</h3>
                    </div>
                </div>
                <div class="sec_lvhd-main new-lvhd">
                    <div class="row-lvhd">
                        @if(isset($data) && $data->count() > 0)
                            @foreach($data as $product)
                                @php
                                    $link = route('product.detail',['slug'=> $product->slug]); 
                                @endphp
                                <div class="col-lvhd-item">
                                    <div class="lvhd-item-box">
                                        <div class="lvhd-item-img">
                                            <img src="{{asset($product->avatar_path)}}" alt="{{$product->name}}">
                                        </div>
                                        <div class="lvhd-item-content">
                                            <span>{{$product->name}}</span>
                                        </div>
                                        <div class="lvhd-item-readmore">
                                            <a href="{{$link}}">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>--}}
      
        {{--
        <div class="product_page">
            <div class="container">
                <div class="row">
					
                    <div class="col-md-12 col-sm-12 col-xs-12 fl_right">
                        <div class="row">
                            <div class="product_list1">
                               @if(isset($data) && $data->count() > 0)
                                @foreach($data as $product)
                                
                                        <div class="product_item">
                                            <div class="box_product">
                                                <div class="image">
                                                    <a href="{{$link}}">
                                                        <img src="{{asset($product->avatar_path)}}" alt="{{$product->name}}">
                                                    </a>
                                                </div>
                                                <div class="box_info">
                                                    <h3>
                                                        <a href="{{$link}}">{{$product->name}}</a>
                                                    </h3>
                                           
                                                    <div class="box_order">
                                                        <div class="view_more">
                                                            <a href="{{$link}}">
                                                                <i class="fa fa-angle-double-right"></i> Chi tiết</a>
                                                        </div>
                                                        <div class="order_button">
                                                            <a class="add-to-cart" data-url="{{ route('cart.add',['id' => $product->id,]) }}" data-start="{{ route('cart.add',['id' => $product->id,]) }}" data-info="Thêm vào giỏ hàng" data-agree="Đồng ý" data-skip="Hủy" data-addfail="Thêm sản phẩm thất bại"><i class="fa fa-shopping-cart"></i>
                                                                Đặt mua</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                               @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
    </div>
    @endsection
    @section('js')
    <script>
    $(function() {
        $(document).on('change', '.field-form', function() {
            // $( "#formfill" ).submit();

            let contentWrap = $('#dataProductSearch');

            let urlRequest = '{{ url()->current() }}';

            let data = $("#formfill").serialize();
            $.ajax({
                type: "GET",
                url: urlRequest,
                data: data,
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                    }
                }
            });
        });

        $(document).on('click', '.btn-search', function(event) {
            // $( "#formfill" ).submit();
            event.preventDefault();

            let contentWrap = $('#dataProductSearch');

            let urlRequest = '{{ url()->current() }}';

            let data = $("#formfill").serialize();
            $.ajax({
                type: "GET",
                url: urlRequest,
                data: data,
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                    }
                }
            });
        });

        $(document).on('submit', "[data-ajax='submit']", function(event) {
            // $( "#formfill" ).submit();
            event.preventDefault();

            let contentWrap = $('#dataProductSearch');

            let urlRequest = '{{ url()->current() }}';

            let data = $("#formfill").serialize();
            $.ajax({
                type: "GET",
                url: urlRequest,
                data: data,
                success: function(data) {
                    if (data.code == 200) {
                        let html = data.html;
                        contentWrap.html(html);
                    }
                }
            });
        });

        $(document).on('change', '.field-change-link', function() {
            // $( "#formfill" ).submit();

            let link = $(this).val();
            if (link) {
                window.location.href = link;
            }
        });
        // load ajax phaan trang
        $(document).on('click', '.pagination a', function() {
            event.preventDefault();
            let contentWrap = $('#dataProductSearch');
            let href = $(this).attr('href');
            //alert(href);
            $.ajax({
                type: "Get",
                url: href,
                // data: "data",
                dataType: "JSON",
                success: function(response) {
                    let html = response.html;

                    contentWrap.html(html);
                }
            });
        });


    });
    </script>
    @endsection