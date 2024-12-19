@extends("layout")
@section("pageTittle")
    Shop
@endsection

@section("pageSection")
    @foreach($allProducts as $singleProduct)
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$singleProduct->name}}</th>
            <td>{{$singleProduct->description}}</td>
            <td>{{$singleProduct->price}}</td>
        </tr>

        </tbody>
    </table>




        @endforeach




@endsection

