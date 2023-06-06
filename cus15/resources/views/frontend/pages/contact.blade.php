@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')

@section('content')
    <div class="content-wrapper">
        <div class="main2">

            <div class="breadcrumbs clearfix">
                <div class="container">
                    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul>
                        <li class="breadcrumbs-item">
                            <a href="/index.php" title="trang chủ" style="color: #333;">
                            Trang chủ
                            </a>
                        </li>
                        <!--<li class="breadcrumbs-item"><span>/</span></li>-->
                        <li class="breadcrumbs-item" style="color: #333; padding-left:12px">
                            Liên hệ
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
            {{--<div class="group-tintuc-list">
                <div class="blog-group-lever2 blog-group">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="left-bot">
                                            <div class="ct-left">
                                                <p>Quý khách vui lòng điền đầy đủ các thông tin vào các ô dưới đây để gửi thông tin đến chúng tôi !</p>
                                                <form action="" method="post" name="frm" id="frm" onsubmit="return checkForm(this);">
                                                    <input type="text" placeholder="Họ và tên" required="required" name="congty">
                                                    <input type="text" placeholder="Email" required="required" name="email">
                                                    <input type="text" placeholder="Số điện thoại" required="required" name="dienthoai">
                                                    <textarea name="noidung" placeholder="Thông tin thêm" id="noidung" cols="30" rows="6"></textarea>
                                                    <button class="hvr-float-shadow" name="gone" id="gone">Gửi thông tin</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="left-bot">
                                            <div class="ct-right">
                                                @isset($dataAddress)
												<div class="address">
													<div class="footer-layer">
														<div class="title">
														{{ $dataAddress->value }}
														</div>
														<ul class="pt_list_addres">
														@foreach ($dataAddress->childs as $item)
														<li>{!! $item->slug !!} {{ $item->value }}</li>
														@endforeach

														</ul>
													</div>
												</div>
											@endisset
											@isset($map)
												<div class="map">
													{!! $map->description !!}
												</div>
											@endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="container ma-contact">
                <div class="row">
                    <div class="col-sm-5">
                        @if(isset($dataAddress) && $dataAddress->count()>0 )
                        <div class="c_left">
                            <h2 style="white-space:pre-wrap;">{{ $dataAddress->value }}.</h2>
                            {!! $dataAddress->description !!}
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-6">
                        <form  action="{{ route('contact.storeAjax') }}"  data-url="{{ route('contact.storeAjax') }}" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="POST" method="POST">
                            @csrf
                            <div class="c_right">
                                <div>
                                    <div class="title_name">
                                        Name
                                        <span>*</span>
                                    </div>
                                    <div class="first_name">
                                        <label for="">
                                            <input class="input_text" name="first_name" type="text"  maxlength="30" required="">
                                            <span>First Name</span>
                                        </label>
                                    </div>
                                    <div class="last_name">
                                        <label for="">
                                            <input class="input_text" name="last_name" type="text"  maxlength="30" required="">
                                            <span>Last Name</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mailbox">
                                    <label for="">
                                        Email
                                        <span>*</span>
                                    </label>
                                    <input type="email" name="email" class="mail_input" required="">
                                </div>
                                <div class="mess_are">
                                    <label for="">
                                        Message
                                        <span>*</span>
                                    </label>
                                    <textarea name="content" id="" required=""></textarea>
                                </div>
                                <div class="con_btn">
                                    <input type="submit" value="Send">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade in" id="modalAjax">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Chi tiết đơn hàng</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
             <div class="content" id="content">

             </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('js')
    <script>

        // ajax load form
        $(document).on('submit',"[data-ajax='submit']",function(){
            let formValues = $(this).serialize();
            let dataInput=$(this).data();
            // dataInput= {content: "#content", href: "#modalAjax", target: "modal", ajax: "submit", url: "http://127.0.0.1:8000/contact/store-ajax"}

            $.ajax({
                type: dataInput.method,
                url: dataInput.url,
                data: formValues,
                dataType: "json",
                success: function (response) {
                    if(response.code==200){
                        if(dataInput.content){
                            $(dataInput.content).html(response.html);
                        }
                        if(dataInput.target){
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
                    }else{
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
                error:function(response){
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
@endsection
