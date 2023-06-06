@isset($data)
    {{-- @if (isset($countProduct)&&$countProduct)
        <h2 class="count-search">{{ __('home.co') }} {{ $countProduct??0 }} {{ __('home.ket_qua_tim_kiem_voi_tu_khoa') }}</h2>
    @else
    <h2 class="count-search">{{ __('home.khong_tim_thay_san_pham') }}</h2>
    @endif --}}
    <div class="list-product-card">
        <div class="row">
            @if (isset($data)&&$data)
                @foreach ($data as $product)
                    @php
                        $tran=$product->translationsLanguage()->first();
                        $link=$product->slug_full;
                    @endphp
                    <div class="col-product-item2 col-lg-4 col-md-6 col-sm-6 col-6">
                        <div class="product-item">
                            <div class="box">
                                <div class="image">
                                    <a href="{{ $link }}">
                                        <img src="{{ $product->avatar_path != null ? asset($product->avatar_path) : '../frontend/images/no-images.jpg' }}" alt="{{ $tran->name }}">
                                        @if ($product->old_price && $product->price)
                                            <span class="sale">   {{ceil(100 -($product->price)*100/($product->old_price))." %"}} </span>
                                        @endif

                                        @if($product->baohanh)
                                            <div class="km">
                                                {{ $product->baohanh }}
                                            </div>
                                        @endif
                                    </a>
                                    {{-- <div class="headline_superheadline">
                                        <span>
                                            <span>
                                                <a href="{{route('product.productByCategory',['san-pham'])}}" class="btArticleCategory may-tro-thinh">Sản phẩm</a>
                                                <a href="{{route('product.productByCategory',[$product->category->slug])}}" class="btArticleCategory san-pham">{{$product->category->name}}</a>
                                                
                                            </span>
                                        </span>
                                    </div> --}}
                                    <div class="pro-item-star">
                                        <span class="pro-item-start-rating">
                                            @php
                                                $avgRating = 0;
                                                $sumRating = array_sum(array_column($product->productStars->toArray(), 'star'));
                                                $countRating = count($product->productStars);
                                                if ($countRating != 0) {
                                                    $avgRating = $sumRating / $countRating;
                                                }
                                            @endphp
                                            @for($i = 1; $i <= 5; $i++)

                                                @if($i <= $avgRating)
                                                    <i class="star-bold far fa-star"></i>
                                                @else
                                                @endif
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3>
                                        <a href="{{ $link }}">
                                           {{ $tran->name }}
                                        </a>
                                    </h3>
                                    <div class="box-price">
                                        <span class="new-price">{{ $product->price?number_format($product->price)." /".$product->size:"Liên hệ" }}</span>
                                        @if ($product->old_price>0)
                                            <span class="old-price">{{ number_format($product->old_price) }}/ {{ $product->size  }}</span>
                                        @endif
                                    </div>
                                    {{-- <div class="desc">{!! $tran->description !!}</div>
                                    <div class="xemthem_home">
                                        <a href="{{ $link }}">Xem chi tiết</a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="col-md-12">
        @if (count($data))
        {{$data->appends(request()->all())->links()}}
        @endif
    </div>
@endisset
