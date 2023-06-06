@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')

@section('content')
    <div class="content-wrapper">
        <div class="main2">
            <div class="banner-breadcrumds box_banner_project" style="background-image: url({{$category->icon_path}});">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {{--
                            
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
                            --}}

                            <div class="title-breadcrumbM">
                                {{$category->name}}
                            </div>
                            <div class="description">
                                {!! $category->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>                                
            <style>
                .form-action ul li:before {
                    content: "— ";
                }
            </style>
            {{--
            <div class="page-project-detail">
                <div class="container">
                    <div class="wrapper-project">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="group-project-title">
                                    <h2>{{$data->name}}</h2>
                                    <div class="list-info">
                                        @if($data->text1)
                                        <span class="li"><i class="fas fa-crop"></i>Quy mô: <span class="f-rb">{{ $data->text1 }}</span>  <span class="db-none">|</span> </span>
                                        @endif

                                        @if($data->text2)
                                        <span class="li"><i class="fas fa-dollar-sign"></i>Tổng mức đầu tư: <span class="f-rb">{{ $data->text2 }}</span>  <span class="db-none">|</span> </span>
                                        @endif

                                        @if($data->text3)
                                        <span class="li"><i class="fas fa-map-marker-alt"></i>{{ $data->text3 }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-sm-12">
                                <div class="project-image">
                                    <img src="{{asset($data->avatar_path)}}" alt="{{$data->name}}">
                                </div>
                            </div>
        
                            <div class="col-lg-5 col-sm-12">
                                <div class="project-nd">
                                    {!!$data->description!!}
                                </div>
                            </div>
                            
        
                            <div class="col-md-12 col-sm-12 col-xs-12 col-content-detail">
                                <div class="detail_summary">
                                    <div class="content-project-title">
                                        <h3>Mô tả dự án</h3>
                                    </div>
                                    <p>
                                        {!!$data->content!!}
                                    </p>
                                    
                                    <p class="text-center">
                                        <a onclick="ShowContent();" class="load-more">
                                            Xem thêm
                                        </a>
                                    </p>
                                    
                                </div>
                                <div class="btn-show-all-detail">
                                    <p class="text-center">
                                        <a onclick="ShowContent();" class="load-more">
                                            Xem thêm
                                        </a>
                                    </p>
                                </div>
                                <div class="show-less-detail" style="display:none">
                                    <p class="text-center">
                                        <a onclick="HideContent();" class="load-more">
                                            Rút gọn
                                        </a>
                                    </p>
                                </div>
                                
                                <div class="detail_content" style="display:none">
                                    <div class="content-project">
                                        <div class="content-project-title">
                                            <h3>Mô tả dự án</h3>
                                        </div>
                                        {!!$data->content!!}
                                        <p class="text-center">
                                            <a onclick="HideContent();" class="load-more">
                                                Rút gọn
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
        
                            @if($data->images->count() > 0)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="content-project-title">
                                        <h3>Hình ảnh dự án</h3>
                                    </div>
                                    <div class="list-images-project">
                                        <div class="slider-detail-project">
                                            @foreach($data->images()->latest()->limit(4)->get() as $item)
                                                <div class="project-slider-item">
                                                    <a href="{{asset($item->image_path)}}" class="hrefImg" data-lightbox="image">
                                                        <img src="{{asset($item->image_path)}}" alt="{{$item->name}}">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
        
                        @if(isset($dataRelate) && $dataRelate)
                            <div class="project-relate">
                                <div class="sec_lvhd-main">
                                    <div class="content-project-title">
                                        <h3>Dự án liên quan</h3>
                                    </div>
                                    <div class="row-lvhd">
                                        @foreach($dataRelate as $project)

                                            @php
                                                $link = route('project.detail',['category' => $project->category->slug, 'slug' => $project->slug]);
                                            @endphp
                                            <div class="col-lvhd-item">
                                                <div class="lvhd-item-box">
                                                    <div class="project-relate-item-box">
                                                        <div class="project-relate-item-img">
                                                            <img src="{{asset($project->avatar_path)}}" alt="{{$project->name}}" />
                                                        </div>
                                                        <div class="project-relate-item-name">
                                                            <a href="{{$link}}">{{$project->name}}</a>
                                                        </div>
                                                        <div class="project-relate-item-desc">
                                                            <span class="li"><i class="fas fa-crop"></i>Quy mô: <span class="f-rb">{{$project->text1}}</span> </span>
                                                            <span class="li"><i class="fas fa-dollar-sign"></i>Tổng mức đầu tư: <span class="f-rb">{{$project->text2}}</span> </span>
                                                            <span class="li address-lst"><i class="fas fa-map-marker-alt"></i></i>{{$project->text3}}</span>
                                                        </div>
                                                        <a href="{{ $link }}">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            --}}
            {{--
            <div class="slider-project">
                @isset($slider)
                    <div class="box-slide faded cate-arrows-1">
                        @foreach ($slider as $item)
                            <div class="item-slide">
                                <a>
                                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endisset
            </div>
            --}}
            <div class="ab-page-tab">
                <div class="container v2">
                    <ul class="psy-pane">
                        @if(isset($tong_the) && $tong_the->count()>0)
                        <li><a class="smooth psy-btn active" href="#tab_{{$tong_the->id}}" title="{{$tong_the->title_seo}}">{{$tong_the->title_seo}}</a></li>
                        @endif

                        @if(isset($vi_tri) && $vi_tri->count()>0)
                        <li><a class="smooth psy-btn" href="#tab_{{$vi_tri->id}}" title="{{$vi_tri->title_seo}}">{{$vi_tri->title_seo}}</a></li>
                        @endif

                        @if(isset($mat_bang) && $mat_bang->count()>0)
                        <li><a class="smooth psy-btn" href="#tab_{{$mat_bang->id}}" title="{{$mat_bang->title_seo}}">{{$mat_bang->title_seo}}</a></li>
                        @endif

                        @if(isset($can_ho) && $can_ho->count()>0)
                        <li><a class="smooth psy-btn" href="#tab_{{$can_ho->id}}" title="{{$can_ho->title_seo}}">{{$can_ho->title_seo}}</a></li>
                        @endif

                        @if(isset($tien_ich) && $tien_ich->count()>0)
                        <li><a class="smooth psy-btn" href="#tab_{{$tien_ich->id}}" title="{{$tien_ich->title_seo}}">{{$tien_ich->title_seo}}</a></li>
                        @endif

                        @if(isset($chinh_sach) && $chinh_sach->count()>0)
                        <li><a class="smooth psy-btn" href="#tab_{{$chinh_sach->id}}" title="{{$chinh_sach->title_seo}}">{{$chinh_sach->title_seo}}</a></li>
                        @endif

                    </ul>
                </div>
            </div>

            @if(isset($tong_the) && $tong_the->count()>0)
            <div id="tab_{{ $tong_the->id }}" class="section_1 section sec_1080">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-section_1">
                            <div class="col-inner text-center">
                                <h2 class="title22" >{{ $tong_the->name }}</h2>
                                <p>{{ $tong_the->description }}</p>
                                
                            </div>
                            <div class="headline">
                                    <hr>
                            </div>
                            <div class="headtext">
                                <p>
                                Our WR series of Hisense Interactive Digital Display include the latest smart features to improve collaboration and create a leading engaging experience for users. The new WR series is available in 3 sizes (65”, 75”, 86”) and their 4K Ultra HD picture quality ensures perfect colour and rich detail. They are touch enabled allowing multiple people to use them at once to present, illustrate and share information. When using the digital whiteboard, our improved IR software now recognises touch points as little as 2mm ensuring the experience is as accurate as writing with pen and paper. New for 2022, the WR range features an optical bonded display that diffuses reflections and bright light to keep the display visible in any lighting conditions. Users can also now wirelessly connect with two or more additional Hisense displays.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="news1 col-4">
                        <div class="news-pic"><img src="../frontend/images/lab1.png" alt=""></div>
                        <div>
                            <div class="news-title">Digital Whiteboard</div>
                            <div class="news-detail">Hisense’s WR Interactive Digital Boards (65”/75”/86”) have been designed to facilitate inspirational knowledge sharing in both business and educational environments. They are touch enabled and multiple people can use them at once to present, illustrate and share ideas and information. Creating a collaborative, communicative and interactive atmosphere that will make user-groups thrive. </div>
                        </div>
                    </div>
                    <div class="news2 col-4">
                        <div class="news-pic"><img src="../frontend/images/lab1.png" alt=""></div>
                        <div>
                            <div class="news-title">Digital Whiteboard</div>
                            <div class="news-detail">Hisense’s WR Interactive Digital Boards (65”/75”/86”) have been designed to facilitate inspirational knowledge sharing in both business and educational environments. They are touch enabled and multiple people can use them at once to present, illustrate and share ideas and information. Creating a collaborative, communicative and interactive atmosphere that will make user-groups thrive. </div>
                        </div>
                    </div>
                    <div class="news3 col-4">
                        <div class="news-pic"><img src="../frontend/images/lab1.png" alt=""></div>
                        <div>
                            <div class="news-title">Digital Whiteboard</div>
                            <div class="news-detail">Hisense’s WR Interactive Digital Boards (65”/75”/86”) have been designed to facilitate inspirational knowledge sharing in both business and educational environments. They are touch enabled and multiple people can use them at once to present, illustrate and share ideas and information. Creating a collaborative, communicative and interactive atmosphere that will make user-groups thrive. </div>
                        </div>
                    </div>
                </div>
            </div>


            {{--@if(isset($thong_tin) && $thong_tin->count()>0)
            <div class="section_4 section">
                <div class="row-full-width">
                    <div class="col-sec_4-left">
                        <div class="col-inner dark">
                            <h3>{{ $thong_tin->name }}</h3>
                            {!! $thong_tin->content !!}
                        </div>
                    </div>
                    <div class="col-sec_4-right">
                        <div class="col-inner">
                            <div class="img has-hover x md-x lg-x y md-y lg-y">
                                <div class="img-inner image-zoom-long dark">
                                    <img src="{{asset($thong_tin->avatar_path)}}" alt="{{ $thong_tin->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif--}}

            
            @if(isset($vi_tri) && $vi_tri->count()>0)
            <div id="tab_{{ $vi_tri->id }}" class="section_8 section sec_1080 elle">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-lg-12 sec_8-title">
                            <div class="col-inner">
                                <h2 class="title22 elle-bold" style="text-align: center;">{{ $vi_tri->name }}</h2>
                                <div class="content_md_top">
                                    {{ $vi_tri->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section_9 section elle">
                <div class="row row-collapse row-full-width fix-bg3">
                    <div id="col-1653062027" class="col medium-8 large-8">
                        <div class="col-inner">
                            <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1808621195">
                                <div >		
                                    <div class="img-inner dark">
                                        <img width="1600" height="822" src="{{ asset($vi_tri->avatar_path) }}" class="attachment-original size-original" alt="{{ $vi_tri->name }}" >						
                                    </div>
                                </div>						
                            </div>
                        </div>
                    </div>
                    <div class="vitri-ketnoi ">
                        <div class="col-inner">     
                            <div class="col-inner dark" style="padding: 5% 5% 5% 5%;">
                                {!! $vi_tri->content !!}
                                <p>
                                    <a class="button primary white expand elle btn-sec_9" target="_blank" href="https://goo.gl/maps/VBmEVHzwRva3NjQKA" rel="noopener noreferrer">Xem trên bản đồ</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

                  
            @if(isset($tu_van) && $tu_van->count()>0)      
            <div class="section_2 section sec_1080">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-sec_2-title">
                            <div class="sec_2-title text-center">
                                <b></b>
                                <span class="section-title-main">{{ $tu_van->name }}</span>
                                <b></b>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-sec_2-content">
                            <div class="col-inner">
                                <p class="text-center">
                                    {{ $tu_van->description }}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 col-sec_2-main">
                            <div class="row">
                                @if(count($tu_van->childs)>0)
                                @foreach($tu_van->childs()->where('active',1)->orderBy('order')->get() as $item)
                                <div class="col-12 col-sm-12 col-md-4 col-sec_2-main-item">
                                    <div class="col-inner">
                                        <div class="icon-box-img" style="width:60px">
                                            <div class="icon">
                                                <div class="icon-inner">
                                                    <img src="{{asset($item->icon_path)}}" alt="{{$item->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="icon-box-text last-reset">
                                            <h3 style="text-align: center; color: #000;"><span >{{$item->name}}</span></h3>
                                            <p>
                                                {{ $item->description }}
                                            </p>
                                  
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
            @endif
            
            @if(isset($mat_bang) && $mat_bang->count()>0) 
            <div id="tab_{{ $mat_bang->id }}" class="section_11 section sec_1080 elle">
                <div class="container">
                    <div class="row">
                        <div  class="col-12 col-lg-12">
                            <div class="col-inner">
                                <h2>{{ $mat_bang->name }}</h2>
                                <div class="content_md">
                                    {!! $mat_bang->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="content_md">
                <img src="{{asset($mat_bang->avatar_path)}}" alt="{{ $mat_bang->name }}">
            </div>
            @endif

            @if(isset($can_ho) && $can_ho->count()>0) 
            <div id="tab_{{ $can_ho->id }}" class="section_5 sec_1080">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-sec_5-title">
                            <h2 class="sec_2-title text-center">
                                <b></b>
                                <span class="section-title-main">
                                    <i class="fas fa-bars"></i>
                                    {{ $can_ho->name }}
                                </span>
                                <b></b>
                            </h2>
                        </div>
                        <div class="col-12 col-lg-12 col-sec_5-content">
                            <div class="col-inner">
                                <div class="tabbed-content">
                                    <ul class="nav nav-tabs nav-uppercase nav-size-normal nav-center">
                                        @php
                                            $i=0;
                                        @endphp

                                        @foreach($can_ho->childs()->where('active',1)->orderBy('order')->get() as $item)
                                            @php
                                                $i++;
                                            @endphp
                                            <li class="tab has-icon @if($i==1) active @endif" data-id="Tab{{$i}}">
                                                <a href="javascript:;" >
                                                    <span>{{ $item->name }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-panels">
                                        @php
                                            $j=0;
                                        @endphp

                                        @foreach($can_ho->childs()->where('active',1)->orderBy('order')->get() as $item)
                                            @php
                                                $j++;
                                            @endphp
                                            <div class="panel @if($j==1) active @endif" id="Tab{{$j}}">
                                                <div class="message-box relative" style="padding-top:30px;padding-bottom:30px;">
                                                    <div class="message-box-bg-image bg-fill fill"></div>
                                                    <div class="message-box-bg-overlay bg-fill fill" style="background-color:rgb(238, 238, 238);"></div>
                                                    <div class="container relative">
                                                        <div class="inner last-reset">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-12 col-tabbed-left">
                                                                    <div class="col-inner">
                                                                        <div class="img has-hover x md-x lg-x y md-y lg-y">
                                                                            <div class="img-inner dark">
                                                                                <img src="{{asset($item->avatar_path)}}" class="attachment-original size-original" alt="{{$item->name}}" loading="lazy" >						
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-12 col-tabbed-right">
                                                                    <div class="col-inner">
                                                                        {!! $item->content !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="section_6 section">
		        <div class="bg section-bg fill bg-fill bg-loaded"></div>
		        <div class="section-content relative">
                    <div class="row-full-width">
                        <div class="col-12 form-action col-md-5 col-sm-12">
		                    <div class="col-inner">
                                <p class="text-center">ĐĂNG KÝ ĐỂ NHẬN</p>
                                <h3 class="text-center">ƯU ĐÃI &amp; BẢNG GIÁ</h3>
                                <div class="hr_dots" style="margin: 0 auto 10px;"></div>
                                <div role="form" class="wpcf7" id="wpcf7-f6-p7-o10">
                                    <div class="screen-reader-response">
                                        <p></p>
                                        <ul></ul>
                                    </div>
                                    <form class="wpcf7-form init" action="{{ route('contact.storeAjax') }}"  data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                        @csrf
                                        <p>
                                            <span class="wpcf7-form-control-wrap your-name">
                                                <input type="text" name="name" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" required placeholder="Tên khách hàng*">
                                                <input type="hidden" name="title" value="ƯU ĐÃI & BẢNG GIÁ">
                                            </span>
                                            <br>
                                            <span class="wpcf7-form-control-wrap your-phone">
                                                <input type="tel" name="phone" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" required=""  placeholder="Số điện thoại*">
                                            </span>
                                            <br>
                                            <span class="wpcf7-form-control-wrap your-email">
                                                <input type="email" name="email" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" required="" placeholder="Địa chỉ Email*">
                                            </span>
                                            <br>
                                            <input type="submit" value="NHẬN BẢNG GIÁ" class="wpcf7-form-control wpcf7-submit">
                                            <span class="ajax-loader"></span>
                                        </p>
                                        <div class="wpcf7-response-output" aria-hidden="true"></div>
                                    </form>
                                </div>
                                @if(isset($thongtin_baogia) && $thongtin_baogia->count()>0) 
                                {!! $thongtin_baogia->description !!}
                                @endif
		                    </div>
			            </div>
                    </div>
		        </div>
	        </div>

            
            @if(isset($uu_diem) && $uu_diem->count()>0) 
            <div class="section_3 section sec_1080">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12 col-sec_3-title">
                            <h2 class="sec_2-title text-center">
                                <b></b>
                                    <span class="section-title-main">{{ $uu_diem->name }}</span>
                                <b></b>
                            </h2>
                        </div>
                        <div class="col-12 col-lg-12 col-sec_3-content">
                            <div class="row">
                                @foreach($uu_diem->childs()->where('active',1)->orderBy('order')->get() as $item)
                                <div class="col-12 col-sm-12 col-md-4 col-sec_3-item">
                                    <div class="box- has-hover">
                                        <div class="col-inner text-center">
                                            <div class="box-image">
                                                <div >
                                                    <img src="{{asset($item->icon_path)}}" alt="{{ $item->name }}">
                                                </div>
                                            </div>
                                            <div class="box-text text-center">
                                                <div class="box-text-inner">
                                                    <p>{{ $item->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            @if(isset($tien_ich) && $tien_ich->count()>0) 
            <div id="tab_{{ $tien_ich->id }}" class="section_7 section sec_1080">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="col-inner">
                                <h2>{{ $tien_ich->name }}</h2>
                                <div class="desc">
                                    {!! $tien_ich->content !!}
                                </div>
                                <div class="row row-m-15">
                                    @foreach($tien_ich->childs()->where('active',1)->orderBy('order')->latest()->get() as $item)
                                    <div class="col-md-3 col-sm-2 col-6 col-sec_7-image">
                                        <div class="gallery">
                                            <div class="col-inner">
                                                <a class="image-lightbox lightbox-gallery fancybox image" href="{{ asset($item->avatar_path) }}">
                                                    <div class="box has-hover gallery-box box-overlay dark">
                                                        <div class="box-image image-overlay-add-50 image-cover" style="border-radius:7%;padding-top:75%;">
                                                            <img width="951" height="627" src="{{ asset($item->avatar_path) }}" class="attachment-original size-original" alt="{{ $item->name }}">
                                                            <div class="overlay fill" style="background-color: rgba(0,0,0,.15)"></div>
                                                        </div>
                                                        <div class="box-text text-left">
                                                            <p>{{ $item->name }}</p>
                                                        </div>
                                                    </div>
                                                </a>          
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if(isset($chinh_sach) && $chinh_sach->count()>0)
            <div id="tab_{{ $chinh_sach->id }}" class="section_12 section sec_1080 elle">
                <div class="container">
                    <div class="row">
                        <div  class="col-12 col-lg-12">
                            <div class="col-inner">
                                <h2 class="title22 elle-bold" style="text-align: center;">{{ $chinh_sach->name }}</h2>
                                <div class="description">
                                    {!! $chinh_sach->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            @if(isset($canho_mau) && $canho_mau->count()>0)
            <div class="section_13 section sec_1080 elle">
                <div class="container">
                    <div class="row m-x-15">
                        @foreach($canho_mau->childs()->where('active',1)->orderBy('order')->latest()->get() as $item)
                        <div  class="col-md-6 col-12 col-lg-6">
                            <div class="col-inner">
                                <div class="img has-hover x md-x lg-x y md-y lg-y" >			
                                    <div class="img-inner image-cover dark" style="padding-top:75%;">
                                        <img width="800" height="519" src="{{ asset($item->avatar_path) }}" class="attachment-original size-original" alt="{{ $item->name }}" >						
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>


    <form action="" method="get" name="formfill" id="formfill" class="d-none">
        @csrf
    </form>
    <script>
       
        function ShowContent() {
            $(".detail_summary").addClass('show-detail');
            $(".btn-show-all-detail").css('display', 'none');
            $(".show-less-detail").css('display', 'block');
            
        }
        function HideContent() {
            $(".detail_summary").removeClass('show-detail');
            $(".show-less-detail").css('display', 'none');
            $(".btn-show-all-detail").css('display', 'block');
        }
    </script>
    <script>
         $(document).on('click','.tab', function(){
        let id = $(this).data('id');
        $('.tab').removeClass('active');
        $(this).addClass('active');

        $('.tab-panels .panel').removeClass('active');
        $('#'+id).addClass('active');
    })
    </script>
@endsection
@section('js')
@endsection
