<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section("pageTittle")
            Shop
        @endsection</title>
</head>
<body>
@extends("layout")
@section("pageSection")

    <table class="table">
        <thead>
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allProducts as $singleProduct)
            <tr>
                <td>{{$singleProduct->name}}</td>
                <td>{{$singleProduct->description}}</td>
                <td>{{$singleProduct->price}}</td>
                <td>{{$singleProduct->amount}}</td>
                <td>
                    <a class="btn btn-danger" href="{{ route("products.delete", ["products" => $singleProduct->id]) }}">Delete</a>
                    <a class="btn btn-primary" href="{{ route("products.update", ["product" => $singleProduct->id]) }}">Edit</a>
                    <a class="btn btn-warning" href="{{route("products.permalink", ["product" => $singleProduct->id])}}">Pogledaj proizvod</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection

</body>
</html>





