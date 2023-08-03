@if(count($breadcrumbs))
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @foreach($breadcrumbs as $breadcrumb => $link)
                @if($link)
                    <li class="breadcrumb-item">
                        <a href="{{ $link }}">{{$breadcrumb}}</a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="#">{{$breadcrumb}}</a>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
