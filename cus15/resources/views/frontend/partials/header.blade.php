<div class="menu_fix_mobile">
    <div class="close-menu">
        <div class="logo_menu">
            <a href="{{ makeLink('home') }}">
                <img src="{{asset($header['logo']->image_path)}}" alt="banner_top">
            </a>
        </div>
        <a href="javascript:;" id="close-menu-button">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
    <div class="search">
        <form class="form_search" id="form1" name="form1" method="POST" action="{{ makeLink('search') }}">
            <input class="form-control" type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm..." required="">
            <button class="form-control" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>
    <ul class="nav-main">
        @include('frontend.components.menu',[
            'limit'=>3,
            'icon_d'=>'',
            'icon_r'=>'',
            'data'=>$header['menu_mobile'],
            'active'=>'',
        ])
        @if(isset($header['duan']) && $header['duan']->count()>0)
        @foreach ($header['duan']->childs()->where('active',1)->orderBy('order')->latest()->get() as $item)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('project.projectByCategory',['slug'=>$item->slug]) }}">
                {{ $item->name }}
            </a>
            @if(count($item->childs)>0)
                <ul class="nav-sub">
                    @foreach($item->childs()->where('active',1)->orderBy('order')->latest()->get() as $item2)
                        <li class="nav-sub-item">
                            <a href="{{ route('project.projectByCategory',['slug'=>$item2->slug]) }}">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                {{ $item2->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif 
        </li>
        @endforeach
        @endif

        @if(isset($header['tuyen-dung']) && $header['tuyen-dung']->count()>0)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.postByCategory',['slug' => $header['tuyen-dung']->slug]) }}">
                {{ $header['tuyen-dung']->name }}
            </a>
            @if(count($header['tuyen-dung']->childs)>0)
                <ul class="nav-sub">
                    @foreach ($header['tuyen-dung']->childs()->where('active',1)->orderBy('order')->latest()->get() as $item)
                        <li class="nav-sub-item">
                            <a href="{{ route('post.postByCategory',['slug' => $item->slug]) }}">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                {{ $item->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif 
        </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="/lien-he">
                Liên hệ
            </a>
        </li>
    </ul>
</div>
<div class="header">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="box-header-top">
                    <div class="box-info1 d-none d-lg-block">
                        <ul>
                            @if(isset($header['tai_sao']) && $header['tai_sao'])
                                <li>
                                    <a class="address">
                                        <i class="fas fa-map-marker-alt"></i>{{$header['tai_sao']->value}}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="box-social-header-top">
                        <div class="box-info">
                            <ul>
                                @if(isset($header['hotline_top']) && $header['hotline_top'])
                                    <li>
                                        <a href="tel:{{$header['hotline_top']->slug}}" class="phone"><i class="fas fa-phone-alt"></i>{{$header['hotline_top']->slug}}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="width_fix_logo">
                    <div class="logo-head">
                        <a href="{{ makeLink('home') }}"><img class="logo-desk" src="{{asset($header['logo']->image_path)}}"></a>
                        <div class="list-bar" onclick="myFunction(this)">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </div>
                </div>
                <div class="box-menu-top-header">
                    <div class="menu-desktop menu">
                        <ul class="nav-main">
                            @include('frontend.components.menu',[
                                'limit'=>3,
                                'icon_d'=>'',
                                'icon_r'=>'<i class="fa fa-angle-down mn-icon"></i>',
                                'data'=>$header['menu_mobile'],
                                'active'=>'',
                            ])

                            @if(isset($header['duan']) && $header['duan']->count()>0)
                            @foreach ($header['duan']->childs()->where('active',1)->orderBy('order')->latest()->get() as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('project.projectByCategory',['slug'=>$item->slug]) }}">
                                    {{ $item->name }}
                                </a>
                                @if(count($item->childs)>0)
                                    <ul class="nav-sub">
                                        @foreach ($item->childs()->where('active',1)->orderBy('order')->latest()->get() as $item2)
                                            <li class="nav-sub-item">
                                                <a href="{{ route('project.projectByCategory',['slug'=>$item2->slug]) }}">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    {{ $item2->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif 
                            </li>
                            @endforeach
                            @endif

                            @if(isset($header['tuyen-dung']) && $header['tuyen-dung']->count()>0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('post.postByCategory',['slug' => $header['tuyen-dung']->slug]) }}">
                                    {{ $header['tuyen-dung']->name }}

                                    @if(count($header['tuyen-dung']->childs)>0)
                                    <i class="fa fa-angle-down mn-icon"></i>
                                    @endif
                                </a>
                                @if(count($header['tuyen-dung']->childs)>0)
                      
                                    <ul class="nav-sub">
                                        @foreach ($header['tuyen-dung']->childs()->where('active',1)->orderBy('order')->latest()->get() as $item)
                                            <li class="nav-sub-item">
                                                <a href="{{ route('post.postByCategory',['slug' => $item->slug]) }}">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    {{ $item->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif 
                            </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link" href="{{ makeLink('contact') }}">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                {{-- <div class="group_hotline_header">
                    @if( isset($header['hotline_top']) && $header['hotline_top']->count()>0 )
                    <div class="box_hotline_header">
                        <div class="image_hotline">
                            <div class="hotline_mobi">
                                <a href="tel:{{ $header['hotline_top']->slug }}">
                                    <div class="duyanh-alo-phone">
                                        <div class="animated infinite zoomIn duyanh-alo-ph-circle"></div>
                                        <div class="animated infinite pulse duyanh-alo-ph-circle-fill"></div>
                                        <div class="animated infinite tada duyanh-alo-ph-img-circle"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="phone_number">
                            {!! $header['hotline_top']->description !!}
                        </div>
                    </div>
                    @endif
                </div>
                <div class="box_search">
                    <div class="search">
                        <a href="tel:{{ $header['hotline_top']->slug }}"><img src="{{asset('frontend/images/hotline.png')}}" alt="hotline"></a>
                    </div>
                    <div class="language">
                        <span>VI</span>
                    </div>
                </div>
                <div class="menu menu-desktop menu-center">
                    <div class="nav-main-left">
                        <ul class="nav-main">
                            @include('frontend.components.menu',[
                                'limit'=>3,
                                'icon_d'=>'',
                                'icon_r'=>'',
                                'data'=>$header['menu_left'],
                                'active'=>'',
                            ])
                        </ul>
                    </div>
                    <div class="nav-main nav-main-center">
                        <div class="logo-head">
                            <div class="image">
                                <a href="{{ makeLink('home') }}"><img class="logo-desk" src="{{asset($header['logo']->image_path)}}"></a>
                            </div>
                        </div>
                    </div>
                    <div class="nav-main-right">
                        <ul class="nav-main ">
                            @include('frontend.components.menu',[
                                'limit'=>3,
                                'icon_d'=>'',
                                'icon_r'=>'',
                                'data'=>$header['menu_right'],
                                'active'=>'',
                            ])

                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
