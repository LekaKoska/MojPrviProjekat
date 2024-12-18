@extends("layout")
@section("pageTittle")
    Shop
@endsection

@section("pageSection")



        @foreach($allProducts as $singleProduct)
            <p>Name: {{$singleProduct->name}}</p>
            <p>Description: {{$singleProduct->description}}</p>
        @endforeach




@endsection

