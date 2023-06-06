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
    <div class="main">

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

    
        @if(isset($category) && $category->count()>0)
            @if(count($category->childs)>0)
                <div class="page_news">
                    <div class="container">
                        @if(count($category->posts)>0)
                            <div class="news_list">
                                @foreach($category->posts()->where('active',1)->latest()->get() as $post)
                                    @php
                                        $link = $post->slug_full;
                                    @endphp
                                    <div class="news_item">
                                        <div class="box-new_item">
                                            <div class="image">
                                                <a href="{{$link}}">
                                                    <img src="{{asset($post->avatar_path)}}" alt="{{$post->name}}" />
                                                </a>
                                            </div>
                                            <div class="news_infor">
                                                {{-- @isset($breadcrumbs,$typeBreadcrumb)
                                                    @include('frontend.components.breadcrumbs',[
                                                        'breadcrumbs'=>$breadcrumbs,
                                                        'type'=>$typeBreadcrumb,
                                                    ])
                                                @endisset --}}
                                                <p>{{date_format($post->created_at,'d/m/Y')}}</p>

                                                <h1>
                                                    <a href="{{$link}}">{{$post->name}}</a>
                                                </h1>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach  
                            </div>
                        @endif

                        <div class="tab-news-type">
                            <div class="row-tab-new d-flex flex-wrap">
                                @foreach($category->childs()->where('active', 1)->orderBy('order')->latest()->get() as $key => $item)
                                    <div class="col-tab-news-item">
                                        <div class="box-tab-news-item">
                                            <div class="tab-news-item-main text-center">
                                                <a class="tabs-links @if( ($key+1) == 1)active @endif" data-id="tab_new_{{$key+1}}">
                                                    <span class="btn-tab-link">
                                                        <span>{{$item->name}}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        @foreach($category->childs()->where('active', 1)->orderBy('order')->latest()->get() as $key => $item)
                        <div class="tab-link-content @if( ($key+1) == 1)active @endif" id="tab_new_{{$key+1}}">
                            @if(count($item->posts)>0)
                                <div class="news_list">
                                    
                                    @foreach($item->posts()->where('active',1)->latest()->get() as $post)
                                        @php
                                            $link = $post->slug_full;
                                        @endphp
                                        <div class="news_item">
                                            <div class="box-new_item">
                                                <div class="image">
                                                    <a href="{{$link}}">
                                                        <img src="{{asset($post->avatar_path)}}" alt="{{$post->name}}" />
                                                    </a>
                                                </div>
                                                <div class="news_infor">
                                                    {{-- @isset($breadcrumbs,$typeBreadcrumb)
                                                        @include('frontend.components.breadcrumbs',[
                                                            'breadcrumbs'=>$breadcrumbs,
                                                            'type'=>$typeBreadcrumb,
                                                        ])
                                                    @endisset --}}
                                                    <p>{{date_format($post->created_at,'d/m/Y')}}</p>

                                                    <h1>
                                                        <a href="{{$link}}">{{$post->name}}</a>
                                                    </h1>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach  
                                   
                                </div>
                                @if ($category->content)
                                    <div class="content-category" id="wrapSizeChange">
                                        {!! $category->content !!}
                                    </div>
                                @endif
                            @endisset
                        </div>
                        @endforeach

                        <div class="pagination-group">
                            @if (count($data))
                            {{$data->appends(request()->all())->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="page_news">
                    <div class="container">

                        @isset($data)
                            <div class="news_list">
                                @foreach($data as $post)
                                    @php
                                        $link = $post->slug_full;
                                    @endphp
                                    <div class="news_item">
                                        <div class="box-new_item">
                                            <div class="image">
                                                <a href="{{$link}}">
                                                    <img src="{{asset($post->avatar_path)}}" alt="{{$post->name}}" />
                                                </a>
                                            </div>
                                            <div class="news_infor">
                                                {{-- @isset($breadcrumbs,$typeBreadcrumb)
                                                    @include('frontend.components.breadcrumbs',[
                                                        'breadcrumbs'=>$breadcrumbs,
                                                        'type'=>$typeBreadcrumb,
                                                    ])
                                                @endisset --}}
                                                <p>{{date_format($post->created_at,'d/m/Y')}}</p>

                                                <h1>
                                                    <a href="{{$link}}">{{$post->name}}</a>
                                                </h1>

                                                <div class="post_text">
                                                    <div class="ptext">
                                                        <p>We are proud sponsors of the Fifa 2022 World Cup in Qatar. To celebrate we are offering the chance for selected partners throughout Europe to join us in Qatar for the experience of a lifetime attending a World Cup match. Simply register your details below and one of our team will be in touch. </p>
                                                    </div>
                                                    <div class="pmore"><a href="{{$link}}">ReadMore</a></div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach  
                            </div>

                            @if ($category->content)
                                <div class="content-category" id="wrapSizeChange">
                                    {!! $category->content !!}
                                </div>
                            @endif
                        @endisset
     
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
    <script>
        $(document).on('click','.tabs-links', function(){
            let id = $(this).data('id');
            $('.tabs-links').removeClass('active');
            $(this).addClass('active');

            $('.tab-link-content').removeClass('active');
            $('#'+id).addClass('active');
        });
    </script>

@endsection
@section('js')

@endsection