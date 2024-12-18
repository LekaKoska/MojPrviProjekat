@extends("layout")
@section("pageTittle")
    Shop
@endsection

@section("pageSection")

    @foreach($products as $product)

        @if($product === "iPhone 12" || $product === "iPhone 13 pro max")
            <p>{{$product}} - AKCIJA</p>

        @else

            <p>{{$product}}</p>

        @endif


    @endforeach


@endsection

