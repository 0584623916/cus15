@extends('frontend.layouts.main-profile')
@section('title',"Thêm bài viết")
@section('css')
<style>
    .card{
        font-size: 14px;
		font-weight: 600;
		color: #333;
    }
    textarea,input,select{
        font-size: 14px !important;
    }
    .alert {
        font-size: 13px;
    }
	.select2-container--default .select2-selection--single .select2-selection__rendered {
		color: #333;
		font-weight: 400;
		padding: 0 20px;
		line-height: 35px;
	}
	.select2-container--default .select2-selection--single {
		height: 35px;
		color: #333;
	}
	.select2-results__option {
		padding: 2px 20px;
		font-size: 13px;
	}
	.alert-info {
		color: #333;
		background-color: #eee;
		border-color: #eee;
	}
	.btn-primary {
		margin-top: 20px;
		background: #e90000;
		padding: 5px 20px;
		color: #fff;
		border-radius:0;
		border: none;
		font-weight: 600;
		font-size: 15px;
	}
	.btn-danger {
		margin-top: 20px;
		background: #ccc;
		padding: 5px 20px;
		color: #333;
		border-radius:0;
		border: none;
		font-weight: 600;
		font-size: 15px;
	}
</style>
@endsection
@section('content')
@if( isset($bannerKmMember) && $bannerKmMember )
<div class="image_km">
    <img src="{{ asset($bannerKmMember->image_path) }}" alt="{{ $bannerKmMember->name }}">
</div>
@endif
<div class="content-wrapper">
    <div class="content">

            <div class="row">
                <div class="col-md-12">
                    @if(session()->has("alert"))
                    <div class="alert alert-success">
                        {{session()->get("alert")}}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session("error")}}
                    </div>
                    @endif
                    <form id="form_dangtin" action="{{route('profile.storeProduct')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="title-h">
                                    <span>Đăng tin rao vặt</span>
                                </div>
                                <div class="alert alert-info">
                                    - Để nâng cấp chất lượng nội dung tin rao bất động sản, chúng tôi tiến hành duyệt toàn bộ tin rao đăng mới. <br>
                                    - Tin rao đúng sẽ được duyệt chậm nhất trong vòng 9h làm việc.
                                </div>
                                <div class="card card-outline card-primary">
                                    <div class="card-body table-responsive p-3">



                                        <div class="row">
                                            <div class="col-sm-12 col-12">
                                                <div class="title_dangtin">
                                                    Thông tin cơ bản
                                                </div>
                                                <p class="note">Thông tin có dấu <span>(*)</span> là bắt buộc, không đăng lại tin đã đăng trên Bất Động Sản Xanh</p>
                                            </div>
                                            <div class="col-sm-12 col-12">
                                                <div class="form-group form-group-plus">
                                                    <div class="label-s">
                                                        <label>Tiêu đề <span>(*)</span></label>
                                                    </div>
                                                    <div class="content-s">
                                                        <input type="text" class="form-control
                                                        @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required="" name="name" placeholder="Tên bài đăng">
                                                        @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            {{--
                                            <div class="col-sm-12 col-12">
                                                <div class="form-group form-group-plus">
                                                    <div class="label-s">
                                                        <label>Giới thiệu <span>(*)</span></label>
                                                    </div>
                                                    <div class="content-s">
                                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="" rows="3"  placeholder="Nhập giới thiệu">{{ old('description') }}</textarea>
                                                        @error('description')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            --}}

                                            <div class="col-sm-12 col-12">
                                                <div class="form-group form-group-plus">
                                                    <div class="label-s">
                                                        <label>Nội dung <span>(*)</span></label>
                                                    </div>
                                                    <div class="content-s">
                                                        <textarea class="form-control tinymce_editor_init @error('content') is-invalid  @enderror" name="content" id="" rows="10" required="" placeholder="Nhập nội dung"> {{ old('content') }}</textarea>

                                                        @error('content')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Tên liên hệ <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input id="" type="text" class="form-control" name="name_chunha" required="" placeholder="Tên liên hệ">
                                                                @error('name_chunha')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Số điện thoại <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input id="" type="text" class="form-control" name="phone_chunha" placeholder="Số điện thoại chủ nhà">
                                                                @error('phone_chunha')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            {{--
                                            <div class="col-sm-12 col-12">
                                                <div class="form-group form-group-plus">
                                                    <div class="label-s">
                                                        <label>Email <span>(*)</span></label>
                                                    </div>
                                                    <div class="content-s">
                                                        <input id="" type="text" class="form-control" name="email_chunha" placeholder="Email chủ nhà">
                                                        @error('email_chunha')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            --}}

                                            <div class="col-sm-12 col-12">
                                                <div class="form-group form-group-plus">
                                                    <div class="label-s">
                                                        <label>Loại tin <span>(*)</span></label>
                                                    </div>
                                                    <div class="content-s">
                                                        <select class="form-control  @error('category_id')
                                                        is-invalid
                                                        @enderror" id=""
                                                        
                                                            value="{{ old('category_id') }}"
                                                            name="category_id">
                                                            <option value="">--- Chọn danh mục ---</option>
                                                            {!!$option!!}
                                                        </select>
                                              
                                                        @error('category_id')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Tỉnh/Thành <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <select name="city_id" id="city" class="form-control" onchange="initMaps()" data-url="{{ route('ajax.address.districts') }}">
                                                                    <option value="">Chọn tỉnh/thành phố</option>
                                                                    {!! $cities !!}
                                                                </select>
                                                                @error('city_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Quận/huyện <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <select onchange="initMaps()" name="district_id" id="district" class="form-control" data-url="{{ route('ajax.address.communes') }}">
                                                                    <option value="">Chọn quận/huyện</option>
                                                                </select>
                                                                @error('district_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Đường/Phố <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <select name="street_id" onchange="initMaps()" id="street" class="form-control">
                                                                    <option value="">Chọn Đường/Phố</option>
                                                                </select>
                                                                @error('street_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
         
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Phường/Xã <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <select name="commune_id" onchange="initMaps()" id="commune" class="form-control">
                                                                    <option value="">Chọn xã/phường/thị trấn</option>
                                                                </select>
                                                                @error('commune_id')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="form-group form-group-plus">
                                                    <div class="label-s">
                                                        <label>Địa chỉ <span>(*)</span></label>
                                                    </div>
                                                    <div class="content-s">
                                                        <input id="address" onchange="initMaps()" type="text" class="form-control" name="address_detail" placeholder="Số nhà 2x...">
                                                        @error('address_detail')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Diện tích MB <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="text" class="form-control @error('dientich') is-invalid @enderror" id="" value="{{ old('dientich') }}" name="dientich" placeholder="Nhập diện tích (m2)">
                                                                @error('dientich')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Diện tích SD <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="text" class="form-control @error('dientich_sp') is-invalid @enderror" id="" value="{{ old('dientich_sp') }}" name="dientich_sp" placeholder="Nhập diện tích (m2)">
                                                                @error('dientich_sp')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Mức giá <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="text" class="form-control
                                                                @error('price') is-invalid @enderror" id="price" onchange="changePrice()" value="{{ old('price') }}" name="price" placeholder="Nhập giá">
                                                                @error('price')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Đơn vị tính <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <select class="form-control tag-select-choose"  name="donvi">
                                                                    <option value="">Chọn giá trị</option>
                                                                    @foreach ($donvi as $item)
                                                                        <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('donvi')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="title_dangtin">
                                                    Các thông tin khác
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Chiều rộng <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="text" class="form-control
                                                                @error('chieu_rong') is-invalid @enderror" value="0" name="chieu_rong" placeholder="Nhập chiều rộng">
                                                                @error('chieu_rong')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Chiều dài <span>(*)</span></label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="text" class="form-control
                                                                @error('chieu_dai') is-invalid @enderror" value="0" name="chieu_dai" placeholder="Nhập chiều dài">
                                                                @error('chieu_dai')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="form-group form-group-plus">
                                                    <div class="label-s">
                                                        <label>Giấy pháp lý <span>(*)</span></label>
                                                    </div>
                                                    <div class="content-s">
                                                        <input type="text" class="form-control @error('giay_to') is-invalid @enderror" value="{{ old('giay_to') }}" name="giay_to" placeholder="VD: Sổ đỏ,....">
                                                        @error('giay_to')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Hướng</label>
                                                            </div>
                                                            <div class="content-s">
                                                                <select class="form-control @error('huongnha') is-invalid @enderror" value='' name="huongnha">
                                                                    <option value="">Chọn hướng</option>
                                                                    @foreach ($huongnha as $item)
                                                                        <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('huongnha')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Đường trước nhà</label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="text" class="form-control
                                                                @error('duong_truoc_nha') is-invalid @enderror" value="0" name="duong_truoc_nha" placeholder="m">
                                                                @error('duong_truoc_nha')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-4-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Số tầng</label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="number" class="form-control
                                                                @error('so_tang') is-invalid @enderror" value="0" name="so_tang" placeholder="Nhập số tầng">
                                                                @error('so_tang')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Số phòng ngủ</label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="number" class="form-control
                                                                @error('so_phong') is-invalid @enderror" value="0" name="so_phong" placeholder="Nhập số phòng">
                                                                @error('so_phong')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Phòng tắm/vệ sinh</label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="number" class="form-control
                                                                @error('so_phong_tam') is-invalid @enderror" value="0" name="so_phong_tam" placeholder="Nhập số phòng">
                                                                @error('so_phong_tam')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-3-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Phòng khách</label>
                                                            </div>
                                                            <div class="content-s content-ss">
                                                                <input type="checkbox" class="form-control
                                                                @error('phong_khach') is-invalid @enderror" value="1" name="phong_khach">
                                                                @error('phong_khach')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Phòng bếp</label>
                                                            </div>
                                                            <div class="content-s content-ss">
                                                                <input type="checkbox" class="form-control
                                                                @error('phong_bep') is-invalid @enderror" value="1" name="phong_bep">
                                                                @error('phong_bep')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Sân thượng</label>
                                                            </div>
                                                            <div class="content-s content-ss">
                                                                <input type="checkbox" class="form-control
                                                                @error('san_thuong') is-invalid @enderror" value="1" name="san_thuong">
                                                                @error('san_thuong')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Chỗ để xe hơi</label>
                                                            </div>
                                                            <div class="content-s content-ss">
                                                                <input type="checkbox" class="form-control
                                                                @error('cho_de_xe_hoi') is-invalid @enderror" value="1" name="cho_de_xe_hoi">
                                                                @error('cho_de_xe_hoi')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="title_dangtin">
                                                    Bản đồ
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-12">
                                                <div class="map_description">Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách chọn đúng tỉnh/thành phố và địa chỉ nhà bạn.</div>
                                                <div class="static_map"><iframe title="Bản đồ" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?&amp;q=Bình Thạnh, Hồ Chí Minh&amp;output=embed"></iframe></div>
                                                <input id="vitrimap" type="hidden" name="vitri_map" value="">
                                                @error('vitri_map')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            {{--
                                            <div class="col-sm-12 col-12">
                                                <textarea class="form-control tinymce_editor_init @error('vitri_map') is-invalid  @enderror" name="vitri_map" id="" rows="20" value="" placeholder="Thêm iframe Google Map hoặc thêm ảnh chụp Google Map vào đây"> {{ old('vitri_map') }}</textarea>
                                            </div>
                                            --}}

                                            <div class="col-sm-12 col-12">
                                                <div class="title_dangtin">
                                                    Hình ảnh
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-3-15">
                                                        <div class="form-group">
                                                            <label for="">Ảnh đại diện</label>
                                                            <input type="file" class="form-control-file img-load-input border @error('avatar_path')
                                                            is-invalid
                                                            @enderror" id="" name="avatar_path">
                                                        </div>
                                                        @error('avatar_path')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <img class="img-load border p-1 w-100" src="{{asset('admin_asset/images/upload-image.png')}}" style="height: 158px;object-fit:contain;">
                                                    </div>
                                                    <div class="col-7-15">
                                                        <div class="form-group">
                                                            <label for="">Ảnh liên quan</label>
                                                            <input type="file" class="form-control-file img-load-input border @error('image')
                                                                is-invalid
                                                                @enderror" id="" name="image[]" multiple>
                                                        </div>
                                                        @error('image')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                        <div class="load-multiple-img">
                                                            <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                            <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                            <img class="" src="{{asset('admin_asset/images/upload-image.png')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="title_dangtin">
                                                    Hình thức đăng tin
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Thời gian</label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input  type="date" class="form-control  @error('created_at')
                                                                is-invalid
                                                                @enderror"  name="created_at" placeholder="dd-mm-yyyy" value="{{ old('created_at')?? Carbon::now()->format('Y-m-d') }}" style="pointer-events: none;">
                                                                @error('created_at')
                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Ngày kết thúc</label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input type="date" class="form-control  @error('time_expires')
                                                                is-invalid
                                                                @enderror" id="" name="time_expires" placeholder="dd-mm-yyyy" value="{{ old('time_expires') ?? Carbon::now()->addDays(7)->format('Y-m-d') }}">
                                                                @error('time_expires')
                                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-12">
                                                <div class="row-6-15">
                                                    <div class="col-6-15">
                                                        <div class="form-group form-group-plus">
                                                            <div class="label-s">
                                                                <label>Số ngày đăng</label>
                                                            </div>
                                                            <div class="content-s">
                                                                <input  type="number" class="form-control  @error('created_at')
                                                                is-invalid
                                                                @enderror" name="so_ngay" value="7" style="pointer-events: none;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                             
                                            {{-- <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-12" for="">Loại giao dịch  </label>
                                                    <div class="col-md-12">
                                                        <select class="form-control" value="{{ old('category_id') }}" name="category_id_2"
                                                            data-url="{{ route('profile.loadCategoryChildProduct') }}"
                                                            id="typeGD"
                                                            >

                                                            <option value="">--- Chọn loại giao dịch ---</option>
                                                            @foreach ($typeGD as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                             {!!$option!!}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-12" for="">Danh muc</label>
                                                   <div class="col-md-12">
                                                    <select class="form-control @error('category_id')
                                                    is-invalid
                                                    @enderror"  value="{{ old('category_id') }}" name="category_id"
                                                    id="categoryChild"
                                                    >

                                                    <option value="">--- Chọn danh mục ---</option>
                                                   {!!$option!!}
                                                </select>
                                                   </div>
                                                </div>
                                                @error('category_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div> --}}
                            
                                    

                                 
                                   
                                            
                                        </div>

                              

                                            
                                 

                                            {{-- <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Sale(%)</label>
                                                    <input type="number" class="form-control @error('sale')
                                                        is-invalid
                                                        @enderror" id="" value="{{ old('sale') }}" name="sale" placeholder="Nhập %">
                                                </div>
                                                @error('sale')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div> --}}

                                        <div class="form-group" style="overflow: hidden;">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('hot')
                                                        is-invalid
                                                        @enderror" value="1" name="hot" @if(old('hot')==="1" ) {{'checked'}} @endif>

                                                    Nổi bật
                                                    
                                                </label>
                                            </div>
                                        </div>
                                        @error('hot')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        
                                        <div class="form-group" style="overflow: hidden;">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input @error('vip')
                                                        is-invalid
                                                        @enderror" value="1" name="vip" @if(old('vip')==="1" ) {{'checked'}} @endif>

                                                    Tin vip
                                                    
                                                </label>
                                            </div>
                                        </div>
                                        @error('vip')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                           
                                        
                                        {{-- <div class="form-group">
                                        <label for="">Number</label>
                                        <input type="text" class="form-control" id="" value="{{ old('number') }}" name="number" placeholder="Nhập number">
                                        </div>
                                        @error('number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror --}}
                                        <div class="form-group" style="display: none">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1" name="active" @if(old('active')==="1" ||old('active')===null) {{'checked'}} @endif>Hiện
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="0" @if(old('active')==="0" ){{'checked'}} @endif name="active">Ẩn
                                                </label>
                                            </div>
                                        </div>
                                        @error('active')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        {{--
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" name="checkrobot" id="" required>
                                            <label class="form-check-label" for="" required>{{ $thongBaoTruTienDangTin }}</label>
                                        </div>
                                        @error('checkrobot')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        --}}
                                        {{--
                                        <p>
                                            {{ $thongBaoTruTienDangTin }}
                                        </p>
                                        --}}
                                        <input type="hidden" name="vat" value="{{ $vat->value }}">
                                        <input type="hidden" name="priceThuong" value="{{ $priceTinThuong->value }}">
                                        <input type="hidden" name="priceNB" value="{{ $priceTinNoiBat->value }}">
                                        <input type="hidden" name="priceVip" value="{{ $priceTinVip->value }}">
                                        <input type="hidden" name="priceVip2" value="{{ $priceTinVip2->value }}">

                                        <div class="bangia_tin">
                                            <div class="column">
                                                <div class="bangia_left">
                                                    Đơn giá/ngày
                                                </div>
                                                <div class="bangia_right">
                                                    <span id="price2">{{ $priceTinThuong->value }}</span> VNĐ
                                                </div>
                                            </div>
                                            <div class="column">
                                                <div class="bangia_left">
                                                    Số ngày đăng tin
                                                </div>
                                                <div class="bangia_right">
                                                    <span id="date">7</span> ngày
                                                </div>
                                            </div>
                                            <div class="column">
                                                <div class="bangia_left">
                                                    VAT({{ $vat->value }}%):
                                                </div>
                                                <div class="bangia_right">
                                                    <span id="vat"></span> VNĐ
                                                </div>
                                            </div>
                                            <div class="column">
                                                <div class="bangia_left">
                                                    <b>
                                                        Bạn trả:
                                                    </b>
                                                    
                                                </div>
                                                <div class="bangia_right">
                                                    <b>
                                                        <span id="total"></span> VNĐ
                                                    </b>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">ĐĂNG TIN RAO VẶT</button>
                                            <button type="reset" class="btn btn-danger">NHẬP LẠI</button>
                                        </div>


                                        {{-- <div class="form-group row">
                                            <label class="col-md-4 col-sm-4" for="">Slug</label>
                                            <input class="col-md-8 col-sm-8" type="text" class="form-control
                                            @error('slug') is-invalid  @enderror" id="slug" value="{{ old('slug') }}" name="slug" placeholder="Nhập slug">
                                        </div>
                                        @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror --}}

                                        {{-- <div class="form-group">
                                            <label for="">Mã sản phẩm</label>
                                            <input type="text" class="form-control
                                                @error('name') is-invalid @enderror" id="masp" value="{{ old('masp') }}" name="masp" placeholder="Nhập mã sản phẩm" required>
                                            @error('masp')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Thời gian bảo hành (tháng)</label>
                                            <input type="text" class="form-control @error('warranty')
                                            is-invalid
                                            @enderror" id="" value="{{ old('warranty') }}" name="warranty" placeholder="Nhập thời gian">
                                        </div>
                                        @error('warranty')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror --}}

                                        {{-- <div class="form-group">
                                            <label for="">Số lượt xem</label>
                                            <input type="mumber" class="form-control @error('view')
                                            is-invalid
                                            @enderror" id="" value="{{ old('view') }}" name="view" placeholder="Nhập view">
                                        </div>
                                        @error('view')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror --}}

                                        {{-- <div class="form-group">
                                            <label for="">Nhập mô tả seo</label>
                                            <input type="text" class="form-control @error('description_seo') is-invalid @enderror" id="" value="{{ old('description_seo') }}" name="description_seo" placeholder="Nhập mô tả seo">
                                        </div>
                                        @error('description_seo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror --}}

                                        {{-- <div class="form-group">
                                            <label for="">Nhập title seo</label>
                                            <input type="text" class="form-control @error('title_seo') is-invalid @enderror" id="" value="{{ old('title_seo') }}" name="title_seo" placeholder="Nhập title seo">
                                        </div>
                                        @error('title_seo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror --}}

                                        {{-- <div class="form-group">
                                            <label for="">Nhập tags</label>
                                            <select class="form-control tag-select-choose" multiple="multiple" name="tags[]">
                                            </select>
                                        </div> --}}


                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>

    </div>
</div>
@endsection
@section('js')

<script type="text/javascript">
    function changePrice(){
        var value = $('#price').val();

        value = value.replace(',', ".");

        $('#price').val(value);
    }
</script>



<script src="{{asset('lib/sweetalert2/js/sweetalert2.all.min.js')}}"></script>
{{-- <script src="{{asset('lib/tinymce5/js/tinymce.min.js')}}"></script> --}}
<script src="https://cdn.tiny.cloud/1/si5evst7s8i3p2grgfh7i5gdsk2l26daazgefvli0hmzapgn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{-- <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script> --}}
<script src="{{asset('lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin_asset/ajax/deleteAdminAjax.js')}}"></script>
<script src="{{asset('admin_asset/js/function.js')}}"></script>
<script src="{{ asset('frontend/js/load-address.js') }}"></script>


<script>

    // js tinymce
    let editor_config = {
        path_absolute: "/",
        selector: 'textarea.tinymce_editor_init',
        relative_urls: false,
        plugins: [
            "advlist autolink lists link  charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime  nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link ",
        file_picker_callback: function(callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            let cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };
    if ($("textarea.tinymce_editor_init").length) {
        tinymce.init(editor_config);
    }

    // end  tinymce



    // Tính số ngày đăng tin
    $(document).on('change', 'input[name=time_expires]', function() {
        event.preventDefault();
        var time = 0;
        time = parseInt(time);
        let now = new Date();

        let ngay_start = $('[name=created_at]').val()

        let ngay_st = new Date(ngay_start).getDate();
        if (ngay_st<10) {
            ngay_st = '0'+ngay_st;
        }

        let thang_st = new Date(ngay_start).getMonth()+1;

        if (thang_st<10) {
            thang_st = '0'+thang_st;
        }

        let nam_st = new Date(ngay_start).getFullYear();

        let ngay_end = $('[name=time_expires]').val()

        let ngay_en = new Date(ngay_end).getDate();

        if (ngay_en<10) {
            ngay_en = '0'+ngay_en;
        }

        let thang_en = new Date(ngay_end).getMonth()+1;

        if (thang_en<10) {
            thang_en = '0'+thang_en;
        }

        let nam_en = new Date(ngay_end).getFullYear();

        var date_start = new Date(nam_st+'-'+thang_st+'-'+ngay_st);
        var date_end = new Date(nam_en+'-'+thang_en+'-'+ngay_en);

        let date2 = new Date(now.getFullYear()+'-'+(now.getMonth()+1)+'-'+now.getDate());

        // Đếm khoảng cách giữa 2 mốc thời gian
        if (date_end > now && date_end > date_start) {
            let diffTime = Math.abs(date_end.getTime() - date_start.getTime());
            time = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

        }
        $('input[name=so_ngay]').val(time);
        $('#date').text(time);
        tinhTongTien();
    });
    // End Tính số ngày đăng tin

    function tinhTongTien(){
        let price = 0;
        let total;
        price = parseInt(price);
        let vat = $('input[name=vat]').val();
        let so_ngay = $('#date').text();

        let hot = $('input[name=hot]').is(":checked")
        let vip = $('input[name=vip]').is(":checked")

        if (hot&&vip) {
            price = $('input[name=priceVip2]').val();
            $('#price2').text(price);
        }
        else if(hot){
            price = $('input[name=priceNB]').val();
            $('#price2').text(price);
        }
        else if(vip){
            price = $('input[name=priceVip]').val();
            $('#price2').text(price);
        }
        else{
            price = $('input[name=priceThuong]').val();
            $('#price2').text(price);
        }

        
        let n = Intl.NumberFormat('en-US');

        let priceVat = ((price*so_ngay)*vat/100);

        total = (price*so_ngay) + priceVat;
        
        priceVat = n.format(priceVat);

        $('#vat').text(priceVat);
        total = n.format(total);
        $('#total').text(total);
    }

    tinhTongTien();

    $(document).on('change', 'input[name=hot]', function() {
        tinhTongTien();
    });

    $(document).on('change', 'input[name=vip]', function() {
        tinhTongTien();
    });

      // js load áº£nh khi upload
    $(document).on('change', '.img-load-input', function() {
        let input = $(this);
        displayImage(input, '.wrap-load-image', '.img-load');
    });
    // js load nhiá»u áº£nh khi upload
    $(document).on('change', '.img-load-input', function() {
        let input = $(this);
        displayMultipleImage(input, '.wrap-load-image', '.load-multiple-img');
    });
    // end js load áº£nh khi upload

        // js create select tag
    $(".tag-select-choose").select2({
        tags: true,
        tokenSeparators: [','],
    });
    $(".select-2-init").select2({
        placeholder: "--- Chọn danh mục ---",
        allowClear: true,
    });
    // end create select tag
     // js render slug khi nhập tên
     $(document).on('change keyup', '#name', function() {
        let name = $(this).val();
        $('#slug').val(ChangeToSlug(name));
    });
    // end js render slug khi nhập tên


    // load category child

    $(document).on('change', '#typeGD', function() {
        let urlRequest = $(this).data("url");
        let mythis = $(this);
        let value = $(this).val();
        let defaultCategoryChild = "<option value=''>Chọn danh mục</option>";
        if (!value) {
            $('#categoryChild').html(defaultCategoryChild);
        } else {
            $.ajax({
                type: "GET",
                url: urlRequest,
                data: { 'id': value },
                success: function(data) {
                    if (data.code == 200) {
                        let html = defaultCategoryChild + data.html;
                        $('#categoryChild').html(html);
                    }
                }
            });
        }
    })
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            locale: 'vi',
            format:'d/m/Y H:i',
            formatTime:'H:i',
            formatDate:'d/m/Y',
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#form_dangtin").submit(function() {

            var msg = "";
            
            if (form_dangtin.category_id.value == '') {
                msg += "+ Vui lòng chọn danh mục \n";
            }

            /*if (form_dangtin.huongnha.value == '') {
                msg += "+ Vui lòng chọn hướng nhà \n";
            }*/

            if (form_dangtin.city_id.value == '') {
                msg += "+ Vui lòng chọn tỉnh/thành phố \n";
            }

            if (form_dangtin.district_id.value == '') {
                msg += "+ Vui lòng chọn quận huyện \n";
            }

            if (form_dangtin.commune_id.value == '') {
                msg += "+ Vui lòng chọn phường xã \n";
            }

            if (form_dangtin.address_detail.value == '') {
                msg += "+ Bạn đang để trống địa chỉ chi tiết \n";
            }

            if (form_dangtin.phone_chunha.value == '') {
                msg += "+ Bạn đang để trống số điện thoại chủ nhà \n";
            }

            /*if (form_dangtin.email_chunha.value == '') {
                msg += "+ Bạn đang để trống email chủ nhà \n";
            }*/

            if (form_dangtin.name_chunha.value == '') {
                msg += "+ Bạn đang để trống tên chủ nhà \n";
            }

            if (form_dangtin.name.value == '') {
                msg += "+ Bạn đang để trống tên bài đăng \n";
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
