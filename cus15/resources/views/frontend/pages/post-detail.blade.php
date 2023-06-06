@extends('frontend.layouts.main')

@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')

@section('css')

@endsection

@section('content')
<div class="content-wrapper">
  <div class="main2">
    {{--<div class="banner-breadcrumds" style="background-image: url({{$category->icon_path}});">
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
    </div>--}}

      <div class="news_detail">
          <div class="container">
              <div class="row justify-content-center">
                  {{--<div class="col-md-4 hidden-sm hidden-xs col-left">
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
                  </div>--}}
                  <div class="col-right">
                      <div class="box_news_detail">
                          <div class="date_time">
                              <i class="fa fa-calendar" aria-hidden="true"></i>
                              <span>{{date_format($data->created_at,'d/m/Y')}}</span>
                          </div>
                          <h1>{{$data->name}}</h1>
                          
                          
                          <div class="noi_dung_in">
                              {!!$data->content!!}
                          </div>

                          

                         @if(isset($postContact) && $postContact)
                            {{--<div class="thong_tin_lien_he">
                                <div class="title_l">
                                    <strong>{{$postContact->name}}</strong>
                                </div>
                                {!!$postContact->description!!}
                            </div>--}}
                          @endif
                          {{--<div class="share">
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
                                                          style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"
                                                      >
                                                          <title id="at-svg-facebook-1">Facebook</title>
                                                          <g>
                                                              <path
                                                                  d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z"
                                                                  fill-rule="evenodd"
                                                              ></path>
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
                                                          style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"
                                                      >
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
                                                          style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"
                                                      >
                                                          <title id="at-svg-email-3">Email</title>
                                                          <g>
                                                              <g fill-rule="evenodd"></g>
                                                              <path
                                                                  d="M27 22.757c0 1.24-.988 2.243-2.19 2.243H7.19C5.98 25 5 23.994 5 22.757V13.67c0-.556.39-.773.855-.496l8.78 5.238c.782.467 1.95.467 2.73 0l8.78-5.238c.472-.28.855-.063.855.495v9.087z"
                                                              ></path>
                                                              <path
                                                                  d="M27 9.243C27 8.006 26.02 7 24.81 7H7.19C5.988 7 5 8.004 5 9.243v.465c0 .554.385 1.232.857 1.514l9.61 5.733c.267.16.8.16 1.067 0l9.61-5.733c.473-.283.856-.96.856-1.514v-.465z"
                                                              ></path>
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
                                                          style="fill: rgb(255, 255, 255); width: 16px; height: 16px;"
                                                      >
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
                          </div>--}}
                      </div>
                  </div>
              </div>
          </div>
      </div>
                        <div class="post_link d-flex justify-content-center">
                            <a class="plink_left" href="">
                                <div class="link_left d-flex">    
                                    <div class="iconpost"><i class="far fa-chevron-left"></i></div>
                                    <span><h2>Parc des Princes & Champs-Élysées Flagship Store LED & Digital Signage Showcase</h2></span>
                                </div>
                            </a>
                            <a class="plink_right" href="">
                                <div class="link_right d-flex">
                                    <span><h2>Hisense B2B Europe is expanding into the Swiss digital signage market with Telion AG</h2></span>
                                    <div class="iconpost"><i class="far fa-chevron-right"></i></div>
                                </div>
                            </a>
                            
                          </div>
  </div>
</div>

@endsection
@section('js')
<script>
    $(function(){

        let normalSize=parseFloat($('#wrapSizeChange').css('fontSize'));
        $(document).on('click','.prevSize',function(){
            let font=$('#wrapSizeChange').css('fontSize');
            console.log(parseFloat(font));
            let prevFont;
            if(parseFloat(font)<=10){
                prevFont =parseFloat(font);
            }else{
                 prevFont= parseFloat(font) -1;
            }
            $('#wrapSizeChange').css({'fontSize':prevFont});
        });
        $(document).on('click','.nextSize',function(){
            let font=$('#wrapSizeChange').css('fontSize');
            console.log(parseFloat(font));
            let nextFont;
            nextFont= parseFloat(font) + 1;
            $('#wrapSizeChange').css({'fontSize':nextFont});
        });
        $(document).on('click','.mormalSize',function(){
            $('#wrapSizeChange').css({'fontSize':normalSize});
        });
    })
</script>
<script src="{{ asset('frontend/js/Comment.js') }}">
</script>
{{-- <script>
    console.log($('div').createFormComment());
</script> --}}
@endsection
