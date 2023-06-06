

@php
    $i++;
@endphp
@if ($limit>=$i)
<li class="nav-sub-item">
    @isset($childs['childs'])
        @if (count($childs['childs'])>0&&$limit>=$i+1)
        {!! $icon_r??"" !!}
        @endif
    @endisset
    <a href="{{ $childs['slug_full'] }}">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        {{ $childs['name'] }}
        
    </a>
    @isset($childs['childs'])
        @if (count($childs['childs'])&&$limit>=$i+1)
            <ul class="nav-sub-child">
                @foreach ($childs['childs'] as $childValue2)
                    @include('frontend.components.menu-child', ['childs' => $childValue2])
                @endforeach
            </ul>
        @endif
    @endisset
</li>
@endif


