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
    <form action="/send-product" method="POST">
        @if($errors->any())
            <p class="text-danger">{{$errors->first()}}</p>
        @endif
        {{ csrf_field() }}
        <input type="text" name="name" placeholder="Enter a name" value="{{old("name")}}">
        <input type="text" name="description" placeholder="Enter description" value="{{old("description")}}">
        <input type="number" name="amount" placeholder="Enter amount" value="{{old("amount")}}">
        <input type="number" name="price" placeholder="Enter a price" value="{{old("price")}}">
        <input type="text" name="image" placeholder="Enter image" value="{{old("image")}}">
        <button>Add product</button>
    </form>
@endsection
</body>
</html>
