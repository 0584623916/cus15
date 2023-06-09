@extends('frontend.layouts.main')
@section('title', __('contact.gio_hang'))
@section('css')
   <style>
       .btn-light{
        color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    background-color: #a3a3a3;
       }
   </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="main">
            {{-- <div class="text-left wrap-breadcrumbs">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="breadcrumb">
                                </ul>
                        </div>
                    </div>
                </div>
            </div> --}}

			<div class="breadcrumbs clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<ul>
								<li class="breadcrumbs-item">
                                    <a href="{{ makeLink('home') }}">{{ __('home.home') }}</a>
                                </li>
                                <li class="breadcrumbs-item active"><a href="#" class="currentcat">{{ __('contact.gio_hang') }}</a></li>
                            </ul>
						</div>
					</div>
				</div>
			</div>

			<div class="box_cart">
				<div class="container container-cart">
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-danger">
								@include('frontend.components.cart-component',[
								])
							</div>
							<div class="bg-cart">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12">
										<div class="form-buy">
											<form action="{{ route('cart.order.submit') }}" method="POST" enctype="multipart/form-data" id="buynow">
												@csrf
												<div class="row">
													<div class="col-md-6 col-sm-12 col-xs-12 col-12">
														<h2 class="title-cart">
															{{ __('contact.thong_tin_khach_hang') }}
														</h2>

														 <div class="form-group row">
															<label for="" class="col-sm-3">{{ __('contact.name') }} <strong>*</strong></label>
															<div class="col-sm-9">
																<input type="text" class="form-control   @error('name')is-invalid   @enderror" id="" name="name" placeholder="{{ __('contact.name') }}">
															</div>

															<div class="col-sm-12">
																@error('name')
																	<div class="invalid-feedback">{{ $message }}</div>
																@enderror
															</div>
														  </div>
														  <div class="form-group row">
																<label for="" class="col-sm-3">{{ __('contact.email') }} <strong>*</strong></label>
																<div class="col-sm-9">
																	<input type="email" class="form-control  @error('email')is-invalid @enderror" id="" name="email" placeholder="{{ __('contact.email') }}">
																</div>

																<div class="col-sm-12">
																	@error('email')
																		<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
																</div>

														   </div>
														   <div class="form-group row">
																<label for="" class="col-sm-3">{{ __('contact.phone') }} <strong>*</strong></label>
																<div class="col-sm-9">
																	<input type="text" class="form-control   @error('phone')is-invalid   @enderror" id="" name="phone" placeholder="{{ __('contact.phone') }}">
																</div>
																<div class="col-sm-12">
																	@error('phone')
																		<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
																</div>
															</div>
															<div class="form-group row">
																<label for="" class="col-sm-3">Tỉnh/TP <strong>*</strong></label>
																<div class="col-sm-9">
																	<select name="city_id" id="city" class="form-control @error('city_id') is-invalid   @enderror"  data-url="{{ route('ajax.address.districts') }}">
																		<option value="">Chọn tỉnh/Thành phố</option>
																		{!! $cities !!}
																	</select>
																</div>

															   <div class="col-sm-12">
																	@error('city_id')
																		<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
															   </div>
															</div>
															<div class="form-group row">
																<label for="" class="col-sm-3">Quận/huyện <strong>*</strong></label>
																<div class="col-sm-9">
																	<select name="district_id" id="district" class="form-control    @error('district_id') is-invalid   @enderror"  data-url="{{ route('ajax.address.communes') }}" >
																		<option value="">Chọn quận/huyện</option>
																	</select>
																</div>

																@error('district_id')
																	<div class="invalid-feedback">{{ $message }}</div>
																@enderror
															</div>

															<div class="form-group row">
																<label for="" class="col-sm-3">Xã/phường <strong>*</strong></label>
																<div class="col-sm-9">
																	<select name="commune_id" id="commune" class="form-control   @error('commune_id')is-invalid   @enderror" >
																		<option value="">Chọn xã/phường/thị trấn</option>
																	</select>
																</div>
																<div class="col-sm-12">
																	@error('commune_id')
																		<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
																</div>
															</div>
															<div class="form-group row">
																<label for="" class="col-sm-3">{{ __('contact.address') }} </label>
																<div class="col-sm-9">
																	<input type="text" name="address_detail" class="form-control    @error('address_detail')is-invalid   @enderror" id="" placeholder="{{ __('contact.address') }}">
																</div>
																@error('address_detail')
																	<div class="invalid-feedback">{{ $message }}</div>
																@enderror
															</div>
															<div class="form-group row">
																<label for="" class="col-sm-3">{{ __('contact.yeu_cau_khac') }} </label>
																<div class="col-sm-9">
																	<input type="text" name="note" class="form-control   @error('note')is-invalid   @enderror" id="" placeholder="{{ __('contact.yeu_cau_khac') }} ({{ __('contact.khong_bat_buoc') }})">
																</div>

															   <div class="col-sm-12">
																	@error('note')
																		<div class="invalid-feedback">{{ $message }}</div>
																	@enderror
															   </div>
															</div>
															<div class="group-btn">
																<button type="submit" class="btn btn-primary">{{ __('contact.hoan_tat') }}</button>
															</div>
													</div>
													<div class="col-md-6 ol-sm-12 col-xs-12 col-12">
														<div class="row">
															<div class="col-md-12 col-sm-12 col-xs-12 col-12">

																@if (isset($vanchuyen)&&$vanchuyen)
																<h2 class="title-cart">
																   {{ $vanchuyen->name }}
																 </h2>
																  <div class="desc-collapse">
																	{!!  $vanchuyen->description !!}
																  </div>
																  @endif
																  <h2 class="title-cart">
																	{{ $thanhtoan->name }}
																   </h2>
																   @if (isset($thanhtoan)&&$thanhtoan)
																   <input type="hidden"  name="httt" id="hinhthuc" required value="{{ optional($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->first())->id }}">
																   @endif
																  <div id="list-thanhtoan">
																	  @if (isset($thanhtoan)&&$thanhtoan)
																		  @foreach ($thanhtoan->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)

																		  <div class="card colsap @if ($loop->first) active @endif" data-value='{{ $item->id }}'>
																			<div class="card-header btn-colsap @if ($loop->first) active @endif">
																				{{ $item->name }}
																			</div>
																			<div class="card-body content-colsap">
																				{!!  $item->description !!}
																			</div>
																		</div>
																		  @endforeach
																	  @endif
																 </div>
															</div>
															{{-- <div class="col-md-6 col-sm-12 col-xs-12 col-12">

																<select name="cn" id="chinhanh" class="form-control" required>
																	<option value="0">Chọn chi nhánh *</option>
																	@if (isset($chinhanh)&&$chinhanh)
																		@foreach ($chinhanh->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)
																		<option value="{{ $item->id }}">{{ $item->name }}</option>
																		@endforeach
																	@endif
																</select>
																<div class="list-chinhanh">
																	@if (isset($chinhanh)&&$chinhanh)
																		@foreach ($chinhanh->childs()->orderby('order')->orderByDesc('created_at')->get() as $item)
																		<div class="item" id="cn_{{ $item->id }}">
																			<div class="name">{{ $item->name }}</div>
																			<div class="diachi">
																			   {!! $item->description !!}
																			</div>
																		</div>
																		@endforeach
																	@endif
																</div>
																<div class="group-btn">
																	<a href="{{ route('home.index') }}" class="btn btn-light">Tiếp tục mua hàng</a>
																	<button type="submit" class="btn btn-primary">Gửi đơn hàng</button>
																</div>
															</div> --}}
														</div>
													</div>
												</div>
											</form>
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
@endsection

@section('js')
<script src="{{ asset('frontend/js/load-address.js') }}"></script>
<script>
    $(document).on('click','.btn-colsap',function(){
        $('#list-thanhtoan').find('.active').removeClass('active');
        $(this).addClass('active');
        $(this).parent('.colsap').addClass('active');
        let value= $(this).parent('.colsap.active').data('value');
        $('#hinhthuc').val(value);
        console.log(value);
        $('#list-thanhtoan').find('.colsap:not(".active") .content-colsap').slideUp();
            $(this).parent('.colsap.active').find('.content-colsap').slideDown();
    });
    $("#chinhanh").change(function () {
        var id = $(this).val();
        if (id != "0") {
            $(".list-chinhanh #cn_" + id).addClass("active").siblings().removeClass("active");
        }
        else
            $(".list-chinhanh .item").removeClass("active");
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {

        $("#buynow").submit(function() {

            var msg = "";

            if (buynow.email.value == '') {
                msg += "+ Vui lòng nhập tên của bạn \n";
            }

            if (buynow.phone.value == '') {
                msg += "+ Vui lòng nhập số điện thoại của bạn \n";
            }

            if (buynow.email.value == '') {
                msg += "+ Vui lòng nhập email của bạn \n";
            }


            if (buynow.city_id.value == '') {
                msg += "+ Vui lòng chọn tỉnh/thành phố \n";
            }

            if (buynow.district_id.value == '') {
                msg += "+ Vui lòng chọn quận huyện \n";
            }

            if (buynow.commune_id.value == '') {
                msg += "+ Vui lòng chọn phường xã \n";
            }


            if (buynow.address_detail.value == '') {
                msg += "+ Vui lòng nhập địa chỉ của bạn \n";
            }

           


            if (msg != "") {
                alert("Vui lòng nhập đầy đủ thông tin các thông tin sau:\n" + msg);
                return false;
            } else {
                return true;
            }



            return false;
        });

        // het 


    });
</script>
@endsection
