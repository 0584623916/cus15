    @if( isset($footer['doitac']) && $footer['doitac']->count()>0 )
    <div class="doitac">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="group_title_heading">
                        <div class="title_heading">
                            ĐỐI TÁC CHIẾN LƯỢC
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="doitac_list slider autoplay5 ">
                        @foreach( $footer['doitac']->childs()->where('active',1)->orderBy('order')->get() as $item )
                        <div class="doitac_item">
                            <div class="image">
                                <a href="{{ $item->slug }}">
                                    <img src="{{asset($item->image_path)}}" alt="{{ $item->name }}">
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    @if(isset($footer['logo']) && $footer['logo'])
                        <div class="col-footer-logo col-footer col-sm-4 col-xs-12">
                            <div class="box_address" style="margin-bottom: 10px;">
                                <div class="logo-footer">
                                    <a href="{{ makeLink('home') }}"><img src="{{ asset($footer['logo']->image_path) }}" alt="Logo footer"></a>
                                </div>
                            </div>
                            <div class="box-footer-desc">
                                {!!$footer['logo']->description!!}
                            </div>
                            @if( isset($footer['socialParent']) && $footer['socialParent']->count()>0 )
                            <div class="group_social_foot">
                                {{--<span>Kết nối với chúng tôi</span>--}}
                                <div class="social_foot">
                                    <ul>
                                        @foreach( $footer['socialParent']->childs()->where('active',1)->orderBy('order')->get() as $item )
                                        <li><a href="{{ $item->slug }}">{!! $item->value !!}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    @endif

                    <div class="col-footer col-footer-links col-sm-2 col-xs-12">
                        @if( isset($footer['linklienket']) && $footer['linklienket']->count()>0 )
                        <h3 class="title_underline">
                            {{$footer['linklienket']->name}}
                        </h3>
                        <div class="footer_links">
                            @foreach( $footer['linklienket']->childs()->where('active',1)->orderBy('order')->get() as $item )
                            <li>
                                <a href="{{ asset($item->slug) }}">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i> 
                                    {{ $item->name }}
                                </a>
                            </li>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @if( isset($footer['dataAddress']) && $footer['dataAddress']->count()>0 )
                    <div class="col-footer col-footer-address col-sm-3 col-xs-12">
                        <h3 class="title_underline">
                            Thông tin liên lạc
                        </h3>
                        <div class="nd_chinhanh">
                            {{--
                            <div>
                                <span style="font-size:16px;">
                                    <strong>
                                        {{ $footer['dataAddress']->name }}
                                    </strong>
                                </span>
                            </div>
                            --}}
                            <div>
                                {!! $footer['dataAddress']->description !!}
                            </div>
                        </div>
                        {{--
                        <div class="box_address">
                            @if( isset($footer['dataAddress2']) && $footer['dataAddress2']->count()>0 )
                            <div class="logo_footer">
                                <h2>{{ $footer['dataAddress2']->name }}</h2>
                            </div>
                            <div class="">
                                {!! $footer['dataAddress2']->description !!}
                            </div>
                            @endif
                        </div>
                        --}}
                    </div>
                    @endif

                    @if(isset($footer['register_infomation']) && $footer['register_infomation'])
                        <div class="col-footer col-footer-form-register col-sm-3 col-xs-12">
                            <h3 class="title_underline">
                            {{$footer['register_infomation']->name}}
                            </h3>
                            <div class="desc-form-register">
                                {!!$footer['register_infomation']->description!!}
                            </div>
                            <div class="form_dky">
                                {{--
                                @if( isset($footer['map']) && $footer['map']->count()>0 )
                                    {!! $footer['map']->description !!}
                                @endif
                                --}}
                                <form action="{{ route('contact.storeAjax') }}"  data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                                    @csrf
                                    <div class="pt_box">
                                        <input type="email" name="email" id="txtemail" placeholder="Nhập email của bạn...">
                                        <button type="submit" name="gone" id="gone"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if( isset($footer['coppy_right']) && $footer['coppy_right']->count()>0 )
                        <div class="copyright-text">{{ $footer['coppy_right']->value }}</div>
                        @endif
                        <div class="back_to_top"><a onclick="topFunction();"><span>Về trang đầu</span>
                            <img src="{{ asset('frontend/images/icon_back_to_top.png') }}"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="float-contact">
    @if (isset($footer['zalo'])&&$footer['zalo'])
    <button class="chat-zalo">
        <a href="https://zalo.me/{{ $footer['zalo']->slug }}">Chat Zalo</a>
    </button>
    @endif
    @if (isset($footer['messenger'])&&$footer['messenger'])
    <button class="chat-face">
        <a href="https://m.me/{{ $footer['messenger']->slug }}">Chat Facebook</a>
    </button>
    @endif
    <button class="hotline">
        <a href="tel:{{ optional($footer['hotline'])->value }}">Hotline:{{ optional($footer['hotline'])->value }}</a>
    </button>
</div>

<div class="fix_hotline">
    <ul>
        @if (isset($footer['hotline'])&&$footer['hotline'])
        <li class="call-floating-menu">
            <a href="tel:{{ optional($footer['hotline'])->slug }}">
                <img src="{{ asset('frontend/images/dt.png') }}" alt="hotline">
            </a>
        </li>
        @endif
        @if (isset($footer['zalo'])&&$footer['zalo'])
        <li class="zalo-floating-menu">
            <a href="https://zalo.me/{{ $footer['zalo']->slug }}">
                <img src="{{ asset('frontend/images/zl.png') }}" alt="zalo">
            </a>
        </li>
        @endif

        @if (isset($footer['messenger'])&&$footer['messenger'])
        <li class="messenger-floating-menu">
            <a href="https://m.me/{{ $footer['messenger']->value }}">
                <img src="{{ asset('frontend/images/mes.png') }}" alt="mes">
            </a>
        </li>
        @endif
    </ul>
</div>
    <div class="modal fade form-tv" id="modal-form-dky" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                {{-- 
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                --}}
                <div class="modal-body">
                    <form action="{{ route('contact.storeAjax') }}" data-url="{{ route('contact.storeAjax') }}"
                        data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content"
                        data-method="POST" method="POST">
                        @csrf
                        <input type="hidden" name="title" value="Đăng ký tư vấn">
                        <div class="box-content-form">
                            <h4 class="modal-title">
                                <a href=""><img src="{{ asset(optional($header['logo'])->image_path) }}"></a>
                            </h4>
                            <div class="title-form-m">
                                Đăng ký tư vấn
                            </div>
                            <div class="title-form-sm">
                                Liên hệ với chúng tôi để được hỗ trợ
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Họ tên">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="content" placeholder="Nội dung tư vấn">
                            </div>
                            <button type="submit">Gửi đi</button>
                            <div class="text-center">
                                <a class="close-form-modal" data-dismiss="modal" aria-label="Close">Đóng lại X</a>
                            </div>
                            {{-- <div class="text">
                    Chúng tôi sẽ gọi lại cho quý khách hàng ngay khi nhận được thông tin quý khách hàng gửi.
                </div> --}}
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div> --}}
            </div>
        </div>
    </div>



    <div id="quick-view-modal" class="wrapper-quickview" style="display:none;">
        <div class="quickviewOverlay"></div>
        <div class="jsQuickview">
            <div class="modal-header clearfix" style="width:100%">
                <h4 id="product_quickview_title" class="p-title modal-title"></h4>
                <div class="quickview-close">
                    <a href="javascript:void(0);"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="row">
                    <div class="col-md-5">
                        <div id="product_quickview_image" class="quickview-image image-zoom">
                        </div>
                        <div id="quickview-sliderproduct">
                            <div class="quickview-slider">
                                <ul class="slides"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form id="form-quickview" method="post" action="/cart/add">
                            <div class="quickview-information">
                                <div class="form-input">
                                    <div class="quickview-price product-price">
                                        <span id="product_quickview_price"></span>
                                        <del id="product_quickview_price_old"></del>
                                    </div>
                                </div>
                                <div id="product_quickview_quantity" class="form-input">

                                </div>

                                <div id="dat_mua" class="form-input" style="width: 100%">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function() {
    $('.quickview').click(function() {
        var product_id = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
        $('.wrapper-quickview').fadeIn(500);
        $('.jsQuickview').fadeIn(500);
        $.ajax({
            url: "{{url('/quickview')}}",
            method: "POST",
            dataType: "JSON",
            data: {
                product_id: product_id,
                _token: _token
            },
            success: function(data) {
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('#product_quickview_image').html(data.product_image);
                $('#product_quickview_price').html(data.product_price);
                $('#product_quickview_quantity').html(data.product_quantity);
                $('#product_quickview_price_old').html(data.product_price_old);
                $('#dat_mua').html(data.dat_mua);
            }
        });
    });
});

$(document).on('click', '.quickview-close, .quickviewOverlay', function(e) {
    $(".wrapper-quickview").fadeOut(500);
    $('.jsQuickview').fadeOut(500);
});

$(document).on('change', '#quantity-quickview', function() {
    if ($(this).val() > 1) {
        var a = $(this).val();
        //   $(".optionChange").trigger('change');

        let url2 = $('#buyCartQuickView').attr('href');
        url2 += "?quantity=" + $('#quantity-quickview').val();
        $('#buyCartQuickView').attr('href', url2);
    }
});

// ajax load form
$(document).on('submit', "[data-ajax='submit']", function() {
    let myThis = $(this);
    let formValues = $(this).serialize();
    let dataInput = $(this).data();
    // dataInput= {content: "#content", href: "#modalAjax", target: "modal", ajax: "submit", url: "http://127.0.0.1:8000/contact/store-ajax"}

    $.ajax({
        type: dataInput.method,
        url: dataInput.url,
        data: formValues,
        dataType: "json",
        success: function(response) {
            if (response.code == 200) {
                myThis.find('input:not([type="hidden"]), textarea:not([type="hidden"])').val('');
                if (dataInput.content) {
                    $(dataInput.content).html(response.html);
                }
                if (dataInput.target) {
                    switch (dataInput.target) {
                        case 'modal':
                            $(dataInput.href).modal();
                            break;
                        case 'alert':
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: response.html,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        default:
                            break;
                    }
                }
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: response.html,
                    showConfirmButton: false,
                    timer: 1500
                });
            }

            // console.log( response.html);
        },
        error: function(response) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
    return false;
});
</script>