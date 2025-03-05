<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
@extends("layout")
@section("pageSection")
    <form action="{{route("products.save", ['singleProduct' => $product->id])}}" method="POST">

        {{csrf_field()}}

        <input type="text" name="name" placeholder="Enter a name" value="{{ $product->name}}">
        <input type="text" name="description" placeholder="Enter description" value="{{$product->description}}">
        <input type="number" name="amount" placeholder="Enter amount" value="{{ $product->amount}}">
        <input type="number" name="price" placeholder="Enter a price" value="{{ $product->price}}">
        <input type="text" name="image" placeholder="Enter image" value="{{ $product->image}}">
        <button>Add product</button>
    </form>
@endsection
</body>
</html>
