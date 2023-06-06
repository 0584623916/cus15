@extends('frontend.layouts.main')
@section('title', $seo['title'] ?? '' )
@section('keywords', $seo['keywords']??'')
@section('description', $seo['description']??'')
@section('abstract', $seo['abstract']??'')
@section('image', $seo['image']??'')

@section('content')
   <div class="content-warper">
        <div class="banner-breadcrumds" style="background-image: url({{$category->icon_path}});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="title-breadcrumbM">
                            {{$category->name}}
                        </div>
                        <div class="breadcrumbsM clearfix">
                            <ul>
                                @include('frontend.components.breadcrumbs',[
                                    'breadcrumbs'=>$breadcrumbs,
                                    'breadcrumbs'=>$breadcrumbs,
                                    'type'=>$typeBreadcrumb,
                                ])
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sec-lvhd-child">
            <div class="container">
                <div class="noidung_in" style="margin-bottom: 20px;">
                    {!! $category->content !!}
                </div>
            </div>
        </div>
           <div class="section_project p-y-30">
                <div class="container">
					@if(isset($data) && $data->count()>0)
                    <div class="project-content">
                      
                        <div class="row row-project">
        
                                
                            @foreach($data as $key => $project)
                                @php
                                    $link = route('project.detail',['category' => $project->parent->slug, 'slug' => $project->slug]);
                                @endphp
                                <div class="product-item col-lg-4 col-md-5">
                                    <div class="product-title">
                                        <div>
                                            <p>
                                                <a href="">
                                                    <strong>65WR6BE</strong>
                                                </a>
                                                <a href=""><br></a>
                                                65” ADVANCED INTERACTIVE DISPLAY
                                            </p>
                                        </div>
                                    </div>
                                    <div class="product-img">
                                        <a href="{{ $link }}"><img src="../frontend/images/product.png" alt=""></a>
                                    </div>
                                    <div class="product-more">
                                        <a href="{{ $link }}">Learn More<i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>

                            @endforeach                     
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-12">
                                <div class="pagination-group">
                                    @if (count($data))
                                    {{$data->appends(request()->all())->links()}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    
                    </div>
        @endif
                </div>
            </div>
        
   </div>
@endsection
@section('js')
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
