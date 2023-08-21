@extends('website.template')


@section('content')

    <div>
        @foreach($products as $product)

            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <p class="card-text">{{ $product->description }}</p>
                    <h5>{{ $product->price }}</h5>
                </div>
                <div>
                    <form action="{{ route('cart.add') }}" method="post" >
                        @csrf
                        <input value="{{ $product->id }}" name="id" hidden>
                        <input value="1" name="quantity" hidden>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
                </div>
            </div>

        @endforeach
    </div>

@endsection
