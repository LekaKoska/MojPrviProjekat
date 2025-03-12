@php use Illuminate\Support\Facades\Session; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
        @if(Session::has("error"))
            <p>{{Session::get("error")}}</p>

        @endif
        @foreach($combined as $item)
        <p>Name: {{$item['name']}}</p>
        <p>Price: {{$item['price']}}</p>
        <p>Amount: {{$item['amount']}}</p>
        <p>Total: {{$item['total']}}</p>
        <form action="{{route("cart.pay")}}" method="GET">
            <button>Poruci</button>
        </form>
@endforeach



</body>
</html>
