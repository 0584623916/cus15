@extends('frontend.layouts.main')
@section('title', $header['seo_home']->name)
@section('image', asset($header['seo_home']->image_path))
@section('keywords', $header['seo_home']->slug)
@section('description', $header['seo_home']->value)
@section('abstract', $header['seo_home']->slug)

@section('content')
<div class="content-wrapper">
    <div class="main">
        <div class="slide">
            @isset($slider)
                <div class="box-slide faded cate-arrows-1">
                    @foreach ($slider as $item)
                        <div class="item-slide">
                            <a>
                                <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                                {{--<div class="slide-content">
                                    <div class="container">
                                        <div class="box-slide-content">
                                            <h3>{{$item->name}}</h3>
                                            <p>{!!$item->description!!}</p>
                                            @if(isset($categoryRoot) && $categoryRoot)
                                                <button type="button" onclick="window.location.href='{{$categoryRoot->slug_full}}'" class="bnt-slide">Khám phá
                                                    <span>
                                                    <img src="{{asset('frontend/images/arrow-slider-icon-1.png')}}" alt="{{$item->name}}"></span>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>--}}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endisset
           
            <div class="slide-button">
                <div class="container">
                    <div class="slide-button-box">
                        <div class="btn-slider-prev">
                            <img src="{{asset('frontend/images/slick-next.png')}}" alt="next">
                        </div>
                        <div class="btn-slider-next">
                            <img src="{{asset('frontend/images/slick-next.png')}}" alt="next">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section_form-register section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="box-top-title">
                            <div class="title_home">
                                <h2>Register Your Interest</h2>
                            </div>
                            <div class="desc">
                                <p>Enter your details and someone from our sales team will reach out with more information</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="newsletter-form-body"> 
                            <div class="newsletter-form-fields-wrapper form-fields"> 
                                <fieldset  class="newsletter-form-name-fieldset form-item fields name required"> 
                                    <div class="newsletter-form-field-wrapper field first-name"> 
                                        <label class="newsletter-form-field-label title">First Name</label> 
                                        <input class="newsletter-form-field-element field-element field-control" type="text" spellcheck="false" placeholder="First Name"> 
                                    </div> 
                                    <div class="newsletter-form-field-wrapper field last-name"> 
                                        <label class="newsletter-form-field-label title">Last Name</label> 
                                        <input class="newsletter-form-field-element field-element field-control" x-autocompletetype="surname" type="text" placeholder="Last Name" maxlength="30" > 
                                    </div> 
                                </fieldset> 
                                <div class="newsletter-form-field-wrapper form-item field email required"> 
                                    <label class="newsletter-form-field-label title">Email Address</label> 
                                    <input class="newsletter-form-field-element field-element" type="email" placeholder="Email Address"> 
                                </div> 
                            </div> 
                            <div class="newsletter-form-button-wrapper submit-wrapper"> 
                                <button class="newsletter-form-button sqs-system-button sqs-editable-button-layout sqs-editable-button-style sqs-editable-button-shape  sqs-button-element--primary" type="submit" value="Submit"> 
                                    <span class="newsletter-form-spinner sqs-spin light large"></span> 
                                    <span class="newsletter-form-button-label">Submit</span> 
                                    <span class="newsletter-form-button-icon"></span> 
                                </button> 
                            </div> 
                            <div class="model"></div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($display_partner) && $display_partner->count()>0 )
        <div class="section_home_1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-1 col-sec_home_1-empty"></div>
                    <div class="col-12 col-lg-4 col-sec_home_1-left">
                        <div class="box-sec-content">
                            <div class="sec_title">
                                <h2 style="white-space:pre-wrap;">{{ $display_partner->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-1 col-sec_home_1-empty"></div>
                    <div class="col-12 col-lg-6 col-sec_home_1-right">
                        <div class="box-sec-content">
                            <div class="sec-content">
                                {!! $display_partner->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(isset($hoat_dong) && $hoat_dong->count()>0 )
        <div class="section_home_2">
            <div class="container">
                <div class="row-fix-sec_2">
                    @foreach($hoat_dong->childs()->where('active',1)->orderBy('order')->get() as $item)
                    <di class="col-sec_2-item">
                        <div class="box-content">
                            <img src="{{asset($item->image_path)}}" alt="{{ $item->name }}">
                        </div>
                    </di>
                    @endforeach
                </div>
            </div>
        </div>
        @endif


        
        
        <div class="section_home_3">
            <div class="container container-py-0">
                @if(isset($commercial_solutions) && $commercial_solutions->count()>0 )
                <div class="sec_home_3-item">
                    <div class="row row-my-0">
                        <div class="col-sec_3-content  wow fadeInLeft" data-wow-duration="1.8s" data-wow-delay="0.3s">
                            <div class="box-sec_3-content">
                                <div class="image-title-wrapper">
                                    <div class="image-title sqs-dynamic-text">
                                        <h2 style="white-space:pre-wrap;">{{ $commercial_solutions->name }}</h2>
                                    </div>
                                </div>
                                <div class="image-subtitle-wrapper">
                                    <div class="image-subtitle sqs-dynamic-text">
                                        {!! $commercial_solutions->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sec_home_3-image wow fadeInRight" data-wow-duration="1.8s" data-wow-delay="0.3s">
                            <div class="box-sec_3-image">
                                <img class="sqs-image-min-height loaded" src="{{ $commercial_solutions->image_path }}" alt="{{ $commercial_solutions->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($world_class) && $world_class->count()>0 )
                <div class="sec_home_3-item">
                    <div class="row row-my-0">
                        <div class="col-sec_3-content  wow fadeInLeft" data-wow-duration="1.8s" data-wow-delay="0.3s">
                            <div class="box-sec_3-content">
                                <div class="image-title-wrapper">
                                    <div class="image-title sqs-dynamic-text">
                                        <h2 style="white-space:pre-wrap;">{{ $world_class->name }}</h2>
                                    </div>
                                </div>
                                <div class="image-subtitle-wrapper">
                                    <div class="image-subtitle sqs-dynamic-text">
                                        {!! $world_class->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sec_home_3-image  wow fadeInRight" data-wow-duration="1.8s" data-wow-delay="0.3s">
                            <div class="box-sec_3-image">
                                <img class="sqs-image-min-height loaded" src="{{ $world_class->image_path }}" alt="{{ $world_class->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($think_big) && $think_big->count()>0 )
                <div class="sec_home_3-item">
                    <div class="row row-my-0">
                        <div class="col-sec_3-content wow fadeInLeft" data-wow-duration="1.8s" data-wow-delay="0.3s">
                            <div class="box-sec_3-content">
                                <div class="image-title-wrapper">
                                    <div class="image-title sqs-dynamic-text">
                                        <h2 style="white-space:pre-wrap;">{{ $think_big->name }}</h2>
                                    </div>
                                </div>
                                <div class="image-subtitle-wrapper">
                                    <div class="image-subtitle sqs-dynamic-text">
                                        {!! $think_big->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sec_home_3-image  wow fadeInRight" data-wow-duration="1.8s" data-wow-delay="0.3s">
                            <div class="box-sec_3-image">
                                <img class="sqs-image-min-height loaded" src="{{ $think_big->image_path }}" alt="{{ $think_big->name }}">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        @if(isset($big_in_sport) && $big_in_sport->count()>0 )
        <div class="section_home_1 section_home_1-edit">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-1 col-sec_home_1-empty"></div>
                    <div class="col-12 col-lg-4 col-sec_home_1-left">
                        <div class="box-sec-content">
                            <div class="sec_title">
                                <h2>{{ $big_in_sport->slug }}<br>{{ $big_in_sport->value }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-1 col-sec_home_1-empty"></div>
                    <div class="col-12 col-lg-6 col-sec_home_1-right">
                        <div class="box-sec-content">
                            <div class="sec-content">
                                {!! $big_in_sport->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{--
        @if(isset($postsHot) && $postsHot)
            <div class="section_event">
                <div class="container">
                    <div class="row m-b-40">
                        <div class="col-12">
							<div class="project-title">
								<h3 class=" text-center">
									<span class="txt-uppercase f-w-700 12999f relative">Tin tức nổi bật</span>
								</h3>
							</div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($postsHot as $post)
						<div class="col-lg-6 col-md-12 col-event-item col-12">
							<div class="news_item">
                                <div class="image">
                                    <a href="{{ $post->slug_full }}"><img src="{{asset($post->avatar_path)}}"alt="{{ $post->name }}"></a>
                                </div>
                                <div class="news_infor">
                                    <h3><a href="{{ $post->slug_full }}">{{$post->name}}</a></h3>
                                    <div class="desc">
                                        {{$post->description}}
                                    </div>
                                    <div class="date">
                                        <label class="m-b-0 12999f">Cập nhật ngày {{$post->created_at->format('d/m/Y')}}</label>
                                        <span class="icon-date"><a href="{{ $post->slug_full }}"><i class="fas fa-plus"></i></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        --}}

    </div>
    
    {{-- @if(isset($why) && $why->count()>0 )
    <div class="number_special">
        <div class="mx_width">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="group_title_heading">
                            <div class="title_heading">
                                Bạn nên chọn <span>An Thành</span> bởi:
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="img_bg_number">
                            <img src="{{asset($why->image_path)}}" alt="">
                        </div>
                        <div class="list_count">
                            @foreach($why->childs()->where('active',1)->orderBy('order')->get() as $item)
                            <div id="counter1" class="item">
                                <div class="box_nd">
                                    <div class="counter-value number_ok pt_counter-value" data-count="{{ $item->name }}">{{ $item->name }}</div>
                                    <p>{{ $item->slug }}</p>
                                </div>
                                <div class="desc">
                                    {{ $item->value }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif --}}

    {{-- <div class="news news_home">
        <div class="img_tamgiac">
            <img src="{{asset('frontend/images/tamgiac_goc.png')}}">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="group_title_heading">
                        <div class="title_heading">
                            SỰ KIỆN <span>NỔI BẬT</span>
                        </div>
                    </div>
                </div>
                @if(isset($postsHot) && $postsHot->count()>0 )
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        @foreach( $postsHot as $item )
                            @if($loop->first)
                            <div class="first_news">
                                <div class="image">
                                    <a href="{{ $item->slug_full }}">
                                        <img src="{{asset($item->avatar_path)}}" alt="{{ $item->name }}">
                                    </a>
                                </div>
                                <h3>
                                    <a href="{{ $item->slug_full }}">
                                        {{ $item->name }}
                                    </a>
                                </h3>
                                <div class="desc">
                                    {{ $item->description }}
                                </div>
                            </div>
                            @endif
                        @endforeach

                        <div class="news_right">
                            <div class="row">
                                @foreach( $postsHot as $item )
                                    @if($loop->first)
                                    @else
                                    <div class="news_item">
                                        <div class="image">
                                            <a href="{{ $item->slug_full }}">
                                                <img src="{{asset($item->avatar_path)}}"
                                            alt="{{ $item->name }}">
                                            </a>
                                        </div>
                                        <div class="news_infor">
                                            <h3>
                                                <a href="{{ $item->slug_full }}">
                                                    {{ $item->name }}
                                                </a>
                                            </h3>
                                            <div class="desc">
                                                {{ $item->description }}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div> --}}
    

    @endsection
    @section('js')
    <script>
    $(function() {
        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            $('.autoplay4-pro').slick('setPosition');
        });
    });
    // setTimeout(() => $('#modal-add-cart').modal('show'), 10000);
    </script>
    <script>
    $(function() {
        var now = new Date();
        var date = now.getDate();
        var month = (now.getMonth() + 1);
        var year = now.getFullYear();
        var timer;
        var then = year + '/' + month + '/' + date + ' 23:59:59';
        var now = new Date();
        var compareDate = new Date(then) - now.getDate();
        timer = setInterval(function() {
            timeBetweenDates(compareDate);
        }, 1000);

        function timeBetweenDates(toDate) {
            var dateEntered = new Date(toDate);
            var now = new Date();
            var difference = dateEntered.getTime() - now.getTime();
            if (difference <= 0) {
                clearInterval(timer);
            } else {
                var seconds = Math.floor(difference / 1000);
                var minutes = Math.floor(seconds / 60);
                var hours = Math.floor(minutes / 60);
                var days = Math.floor(hours / 24);
                hours %= 24;
                minutes %= 60;
                seconds %= 60;
                $("#days").text(days);
                $("#hours").text(hours);
                $("#minutes").text(minutes);
                $("#seconds").text(seconds);
            }
        }
    });
    </script>
    <script>
    $('.autoplay5').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            },
            {
                breakpoint: 551,
                settings: {
                    slidesToShow: 2,
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }
        ]
    });
    </script>
    
    <script>
		$(function(){
			var a = 0;
            var ooTop = $('#counter').offset().top - window.innerHeight;
            if (ooTop < 0) {
                $('.pt_counter-value').each(function () {
                    var $this = $(this);
                    let data_count = parseInt($this.attr("data-count"));
                    $({ countNum: 0 }).animate({
                        countNum: data_count
                    }, {
                        duration: 4000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum+"+");
                        }
                    });
                });
                a = 1;
            }

            $(window).scroll(function () {
                var ooTop = $('#counter').offset().top - window.innerHeight;
                if (a == 0 && $(window).scrollTop() > ooTop ) {
                    $('.pt_counter-value').each(function () {
                        var $this = $(this);
                        let data_count = parseInt($this.attr("data-count"));
                        $({ countNum: 0 }).animate({
                            countNum: data_count
                        }, {
                            duration: 4000,
                            easing: 'swing',
                            step: function () {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function () {
                                $this.text(this.countNum+"+");
                            }
                        });
                    });
                    a = 1;
                }
            });
		});
	</script>
    <script>
        function openTab(tabName) {
            var i;
            var x = document.getElementsByClassName("tab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            document.getElementById(tabName).style.display = "block";  
        };
        $(document).on('click','.btn-tab-1', function(){
            let id = $(this).data('id');
            $('.btn-tab-1').removeClass('active');
            $(this).addClass('active');

            $('.tab').removeClass('active');
            $('#'+id).addClass('active');
        })
    </script>
@endsection