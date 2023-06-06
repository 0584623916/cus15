@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/xzoom/xzoom.css') }}">
    <script type="text/javascript" src="{{ asset('frontend/js/xzoom/xzoom.min.js') }}"></script>
    @if(Session::has('msg'))
    <script type="text/javascript">
        alert("{{ Session::get('msg') }}");
    </script>
    @endif
    <div class="content-wrapper">
    <div class="main2">
        <div class="banner-breadcrumds" style="background-image: url({{$category->icon_path}});">
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
        {{--
        <div class="page-product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="group-product-detail">
                            <div class="box_images_detail">
                                <div class="images_detail">
                                    <div class="image">
                                        <a class="hrefImg" href="" title="{{$data->name}}" data-lightbox="mygallery">
                                            <img id="expandedImg" src="{{asset($data->avatar_path)}}" alt="{{$data->name}}" title="{{$data->name}}" />
                                        </a>
                                    </div>
                                </div>
                                <div class="img_nho">
                                    <div class="column">
                                        <img src="{{asset($data->avatar_path)}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="info_detail">
                                <div class="thong_so">
                                    <h1>{{$data->name}}</h1>
                                </div>
                                <div class="tinhtrang_in">
                                    <div class="tinhtrang">
                                        <p>Mã sản phẩm: </p>
                                        <span>{{$data->masp}}</span>
                                    </div>
                                </div>
                                <div class="tinhtrang_in">
                                    <div class="tinhtrang">
                                        <p>Tình trạng:</p>
                                        <span> {{$data->tinhtrang}}</span>
                                    </div>
                                </div>
                                <div class="box_dat_mua">
                                    <div class="box_price">
                                        <div class="price_top">
                                            <div class="name_price">Giá bán:</div>
                                            <span style="color: #f00; font-weight: 600; line-height: 25px; font-size: 17px;">{{ $data->price_after_sale?number_format($data->price_after_sale).$unit." ": 'Liên hệ' }}</span>
                                            @if ($data->sale>0 && $data->price > 0)
                                                <span class="old-price">{{ number_format($data->price) }} {{ $unit  }}</span>
                                            @endif
                                        </div>
                                        <div class="price_top"></div>
                                    </div>
        
                                    <div class="box_status">
                                        <div class="group_nd_button">
                                            <div class="value_status">
                                                <a class="dat_mua buy-now" data-url="{{ route('cart.add',['id' => $data->id,]) }}" data-start="{{ route('cart.add',['id' => $data->id,]) }}" data-info="Thêm vào giỏ hàng" data-agree="Đồng ý" data-skip="Hủy" data-addfail="Thêm sản phẩm thất bại">Mua ngay</a>
                                            </div>
                                            <button>
                                                <a class="dat_mua add-to-cart" data-url="{{ route('cart.add',['id' => $data->id,]) }}" data-start="{{ route('cart.add',['id' => $data->id,]) }}" data-info="Thêm vào giỏ hàng" data-agree="Đồng ý" data-skip="Hủy" data-addfail="Thêm sản phẩm thất bại">Thêm vào giỏ hàng</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="info_payment">
                                    <div class="item">
                                        <div class="payment_left">
                                            Giao hàng:
                                        </div>
                                        <div class="payment_right">
                                            <div class="sh-nwr"></div>
                                        </div>
                                    </div>
        
                                    <div class="item">
                                        <div class="payment_left"></div>
                                        <div class="payment_right1">
                                            <div class="sh-nwr">Cửa hàng: 175 Hoàng Quốc Việt, Cầu Giấy, Hà Nội.</div>
                                        </div>
                                    </div>
        
                                    <div class="item bot-10">
                                        <div class="payment_left"></div>
                                        <div class="payment_right1">
                                            <div class="sh-nwr">Giao đi: Các tỉnh thành</div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="payment_left"></div>
                                        <div class="payment_right">
                                            <div class="sh-nwr"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
        {{--
        <div class="para_product">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="tab_product">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#overview">Thông tin chi tiết</a></li>
                                <li><a data-toggle="tab" href="#product_support">Hỗ trợ sản phẩm</a></li>
                            </ul>
        
                            <div class="tab-content">
                                <div id="overview" class="tab-pane fade in active">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="box_thong_so">
                                            <div class="content">
                                                {!!$data->content!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="box_thong_so">
                                            <div class="content">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="product_support" class="tab-pane fade">
                                    <div class="content">
                                        Đang cập nhật !
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
        <div class="news_detail">
          <div class="container">
              <div class="row">
                  <div class="col-md-4 hidden-sm hidden-xs col-left">
                      <div class="project">
                            <h3 class="widget-title penci-border-arrow">
                                <span class="inner-arrow">BÀI VIẾT LIÊN QUAN</span>
                            </h3>
                          <ul>
                              @if(isset($dataRelate) && $dataRelate)
                                @foreach($dataRelate as $post)
                                  @php
                                    $link = $post->slug_full;
                                  @endphp
                                  <li>
                                      <h4><a href="{{$link}}">{{$post->name}}</a></h4>
                                      <div class="box_content">
                                          <div class="image">
                                              <img alt="{{$post->name}}" class="pointer" title="{{$post->name}}" src="{{asset($post->avatar_path)}}" />
                                          </div>
                                          <div class="desc">
                                            {!!$post->description!!}
                                          </div>
                                      </div>
                                  </li>
                                @endforeach
                              @endif
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-8 col-sm-12 col-xs-12 col-right">
                      <div class="box_news_detail">
                          <h1>{{$data->name}}</h1>
                          <div class="date_time">
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                              <span>Ngày đăng: {{date_format($data->created_at,'d/m/Y')}}</span>
                          </div>
                          
                          <div class="noi_dung_in">
                              {!!$data->content!!}
                          </div>
                          @if(isset($postContact) && $postContact)
                            <div class="thong_tin_lien_he">
                                <div class="title_l">
                                    <strong>{{$postContact->name}}</strong>
                                </div>
                                {!!$postContact->description!!}
                            </div>
                          @endif
                            <div class="share">
                                <div class="share-article">
                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-591d2f6c5cc3d5e5"></script>
                                    <div class="addthis_inline_share_toolbox" data-url="http://anthanhvvp.vn/thong-bao-nghi-le-30-4-2021" data-title="Thông Báo Nghỉ Lễ Tháng 4" style="clear: both;">
                                        <div id="atstbx" class="at-resp-share-element at-style-responsive addthis-smartlayers addthis-animated at4-show" aria-labelledby="at-f08535d8-9c1c-440b-8e8a-245612407f67" role="region">
                                            <span id="at-f08535d8-9c1c-440b-8e8a-245612407f67" class="at4-visually-hidden">AddThis Sharing Buttons</span>
                                            <div class="at-share-btn-elements">
                                                <a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-facebook" style="background-color: rgb(59, 89, 152); border-radius: 2px;">
                                                    <span class="at4-visually-hidden">Share to Facebook</span>
                                                    <span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 32 32"
                                                            version="1.1"
                                                            role="img"
                                                            aria-labelledby="at-svg-facebook-1"
                                                            class="at-icon at-icon-facebook"
                                                            style="fill: rgb(255, 255, 255); width: 16px; height: 16px;">
                                                            <title id="at-svg-facebook-1">Facebook</title>
                                                            <g>
                                                                <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill-rule="evenodd"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Facebook</span>
                                                </a>
                                                <a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-twitter" style="background-color: rgb(29, 161, 242); border-radius: 2px;">
                                                    <span class="at4-visually-hidden">Share to Twitter</span>
                                                    <span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 32 32"
                                                            version="1.1"
                                                            role="img"
                                                            aria-labelledby="at-svg-twitter-2"
                                                            class="at-icon at-icon-twitter"
                                                            style="fill: rgb(255, 255, 255); width: 16px; height: 16px;">
                                                            <title id="at-svg-twitter-2">Twitter</title>
                                                            <g>
                                                                <path
                                                                    d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336"
                                                                    fill-rule="evenodd"
                                                                ></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Twitter</span>
                                                </a>
                                                <a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-email" style="background-color: rgb(132, 132, 132); border-radius: 2px;">
                                                    <span class="at4-visually-hidden">Share to Email</span>
                                                    <span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 32 32"
                                                            version="1.1"
                                                            role="img"
                                                            aria-labelledby="at-svg-email-3"
                                                            class="at-icon at-icon-email"
                                                            style="fill: rgb(255, 255, 255); width: 16px; height: 16px;">
                                                            <title id="at-svg-email-3">Email</title>
                                                            <g>
                                                                <g fill-rule="evenodd"></g>
                                                                <path d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"></path>
                                                                <path d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Email</span>
                                                </a>
                                                <a role="button" tabindex="0" class="at-icon-wrapper at-share-btn at-svc-compact" style="background-color: rgb(255, 101, 80); border-radius: 2px;">
                                                    <span class="at4-visually-hidden">Share to Thêm...</span>
                                                    <span class="at-icon-wrapper" style="line-height: 16px; height: 16px; width: 16px;">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            viewBox="0 0 32 32"
                                                            version="1.1"
                                                            role="img"
                                                            aria-labelledby="at-svg-addthis-4"
                                                            class="at-icon at-icon-addthis"
                                                            style="fill: rgb(255, 255, 255); width: 16px; height: 16px;">
                                                            <title id="at-svg-addthis-4">AddThis</title>
                                                            <g><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z" fill-rule="evenodd"></path></g>
                                                        </svg>
                                                    </span>
                                                    <span class="at-label" style="font-size: 10.2px; line-height: 16px; height: 16px; color: rgb(255, 255, 255);">Thêm...</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>



        <div class="description_product_detai">
            <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="share">
                    <div class="cmt">
                        <div id="fb-root" class=" fb_reset">
                            <div style="position: absolute; top: -10000px; width: 0px; height: 0px;">
                                <div>

                                </div>
                            </div>
                            <div class=" fb_iframe_widget fb_invisible_flow" fb-iframe-plugin-query="app_id=&amp;attribution=setup_tool&amp;container_width=1200&amp;current_url=http%3A%2F%2Fanthanhvvp.vn%2Fkhoa-cua-nhom-vvp&amp;is_loaded_by_facade=true&amp;local_state=%7B%22v%22%3A1%2C%22path%22%3A2%2C%22chatState%22%3A1%2C%22visibility%22%3A%22hidden%22%2C%22showUpgradePrompt%22%3A%22not_shown%22%2C%22greetingVisibility%22%3A%22hidden%22%2C%22shouldShowLoginPage%22%3Afalse%7D&amp;locale=vi_VN&amp;log_id=074661ff-d9f4-4c50-8e28-00c74f1311b9&amp;logged_in_greeting=Ch%C3%A0o%20B%E1%BA%A1n!%20AnThanhVVP%20c%C3%B3%20th%E1%BB%83%20gi%C3%BAp%20g%C3%AC%20%C4%91%C6%B0%E1%BB%A3c%20cho%20B%E1%BA%A1n%3F&amp;logged_out_greeting=Ch%C3%A0o%20B%E1%BA%A1n!%20AnThanhVVP%20c%C3%B3%20th%E1%BB%83%20gi%C3%BAp%20g%C3%AC%20%C4%91%C6%B0%E1%BB%A3c%20cho%20B%E1%BA%A1n%3F&amp;page_id=1873364722744690&amp;request_time=1658391696376&amp;sdk=joey"><span style="vertical-align: bottom; width: 1000px; height: 0px;"></div></div></div>
                        <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8";
                        fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid_desktop" data-href="http://cus13.largevendor/san-pham" data-width="100%" data-numposts="5" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=1200&amp;height=100&amp;href=http%3A%2F%2Fanthanhvvp.vn%2Fkhoa-cua-nhom-vvp&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;version=v2.8&amp;width=" style="width: 100%;"><span style="vertical-align: bottom; width: 100%; height: 204px;"></span></div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        {{--
        <div id="sanphamlienquan" class="product related_products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="title">
                            Sản phẩm liên quan
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="product_list">
                                @if(isset($dataRelate) && $dataRelate)
                                    @foreach($dataRelate as $product)
                                        @php
                                            $link = route('product.detail',[$product->slug]);
                                        @endphp

                                        <div class="product_item">
                                            <div class="box_product">
                                                <div class="image">
                                                    <a href="">
                                                        <img src="{{asset($product->avatar_path)}}" alt="{{$product->name}}" />
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
    <script type="text/javascript" src="{{ asset('frontend/js/xzoom/setup.js') }}"></script>
    <form action="" method="get" name="formfill" id="formfill" class="d-none">
        @csrf
    </form>
    <script>
       //setTimeout(() => $('#modal-add-cart').modal('show'), 10000);
    </script>
    <script>
        $(document).ready(function(){
            $('.change_size').click(function(){
                var option_id = $(this).data('id_option');
                // alert(option_id);
                $.ajax({
                    url : '{{route('option.changeSize')}}',
                    method : 'Get',
                    data : {option_id : option_id},
                    success : function(data){
                        // load_size();
                        $('#dataSizeProductM').html(data);

                    } 
                });
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.autoplay1').slick({
                dots: false,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                speed: 300,
                autoplaySpeed: 3000,
            });
            // $('.column').click(function() {
            //     var src = $(this).find('img').attr('src');
            //     $(".hrefImg").attr("href", src);
            //     $("#expandedImg").attr("src", src);
            // });
            $('.column').click(function() {
                var src = $(this).find('img').attr('src');
                let parent = $(this).parents('.image-main');
                parent.find(".hrefImg").attr("href", src);
                parent.find(".expandedImg").attr("src", src);
            });
            $('.slide_small').slick({
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                }]
            });

            $(document).on('click','.nav-tabs li',function(){

                    $('.nav-tabs li').removeClass('active');
                    $(this).addClass('active');

            });

            $('.autoplay5-product-detail-new').slick({
                dots: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 3000,
                responsive: [{
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 5,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 551,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 425,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
       
                        }
                    }
                ]
            });

            $(document).on('change','.field-form',function(){
          // $( "#formfill" ).submit();

                let contentWrap = $('#dataProductSearch');

                let urlRequest = '{{ makeLinkById('category_products',$data->category->id) }}';
                let data=$("#formfill").serialize();
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    data:data,
                    success: function(data) {
                        if (data.code == 200) {
                            let html = data.html;
                            contentWrap.html(html);
                        }
                    }
                });
            });
            // load ajax phaan trang
            $(document).on('click','.pagination a',function(){
                event.preventDefault();
                let contentWrap = $('#dataProductSearch');
                let href=$(this).attr('href');
                //alert(href);
                $.ajax({
                    type: "Get",
                    url: href,
                // data: "data",
                    dataType: "JSON",
                    success: function (response) {
                        let html = response.html;

                        contentWrap.html(html);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var boxnumber = $('.box-add-cart input').val();
            parseInt(boxnumber);
            $('.cart_qty_add').click(function() {
                if ($(this).parent().parent().find('input').val() < 50) {
                    var a = $(this).parent().parent().find('input').val(+$(this).parent().parent().find(
                        'input').val() + 1);
                        //  let url = $('#addCart').data('start');
                        //  url += "?quantity=" + $('#cart_quantity').val();
                        //  $('#addCart').attr('data-url',url);

                        //  let url2 = $('#buyCart').attr('href');
                        //  url2 += "?quantity=" + $('#cart_quantity').val();
                        //  $('#buyCart').attr('href',url2);
                        $(".optionChange").trigger('change');
                }
            });

            $('.cart_qty_reduce').click(function() {
                if ($(this).parent().parent().find('input').val() > 1) {
                    if ($(this).parent().parent().find('input').val() > 1) $(this).parent().parent().find(
                        'input').val(+$(this).parent().parent().find('input').val() - 1);
                        //   let url = $('#addCart').data('start');
                        //  url += "?quantity=" + $('#cart_quantity').val();

                        //  $('#addCart').attr('data-url',url);

                        //  let url2 = $('#buyCart').attr('href');
                        //  url2 += "?quantity=" + $('#cart_quantity').val();
                        //  $('#buyCart').attr('href',url2);
                        $(".optionChange").trigger('change');
                }
            });
            

            $(document).on('change','#cart_quantity',function(){
                if ($(this).parent().parent().find('input').val() > 1) {
                    var a = $(this).val();
                       $(".optionChange").trigger('click');


                    // let url = $('#addCart').data('start');
                    // url += "?quantity=" + $('#cart_quantity').val();
                    // $('#addCart').attr('data-url',url);
                    
                    // let url2 = $('#buyCart').attr('href');
                    //      url2 += "?quantity=" + $('#cart_quantity').val();
                    //      $('#buyCart').attr('href',url2);
                }
            });

            $(document).on('change','.optionChange',function(){
                // let val= ($(this).val());
                let val= $('input[name=size]:checked').val() ?? $(this).val();
                let arrPriceAndId = val.split("-").map(function(value,index){
                    return parseInt(value);
                });
                //Giá cũ
                let old_price = $(this).data('old_price');
                let name_option = $(this).data('tooltop-title');
                let arrPriceAndId2 = old_price.split("-").map(function(value2,index){
                    return parseInt(value2);
                });
 
                var nf = Intl.NumberFormat();

                let text= 'Liên hệ';
                let text2= '';
                let url = $('#addCart').data('start');
                url += "?quantity=" + $('#cart_quantity').val();
                if(arrPriceAndId[1]){
                    url += "&option=" + arrPriceAndId[1];
                }
                if(arrPriceAndId[0]>0){
                    let price= nf.format(arrPriceAndId[0]);
                    text=price+' /' + name_option;
                }
                if(arrPriceAndId2[0]>0){
                    let price2= nf.format(arrPriceAndId2[0]);
                    // text2=price2+' <span>₫</span>';
                    text2=price2+' /' + name_option;
                }
                $('#addCart').attr('data-url',url);
                $('#priceChange').html(text);
                $('#name_option').html(name_option);
                $('#old_priceChange').html(text2);
            });

            
        });
    </script>
@endsection
@section('js')
@endsection
