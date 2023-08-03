@extends('website.template')


@section('content')

    <div>
        @foreach($products as $products)

            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ $products->name }}</h3>
                    <p class="card-text">{{ $products->description }}</p>
                    <h5>{{ $products->price }}</h5>
                </div>
            </div>

        @endforeach
    </div>

@endsection
