@extends("layout")

@section("pageTittle")
    Home
@endsection

@section("pageSection")

    @foreach($products as $product)
        <p>{{$product->name}}</p>
    @endforeach

@endsection
