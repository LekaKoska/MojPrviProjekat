@php use Illuminate\Support\Facades\Session; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<div>
    <p>{{$product->name}}</p>
    <p>{{$product->description}}</p>
    <p>{{$product->amount}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->image}}</p>
</div>
@if(Session::has("error"))
    <p>{{Session::get("error")}}</p>
@endif

<form action="{{route("cart.add")}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$product->id}}">
    <input type="number" name="amount" placeholder="Enter amount">
    <button>Add to cart</button>
</form>
</body>
</html>
