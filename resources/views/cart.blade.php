 <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
  @foreach($product as $singleProduct)
      <p>Product: {{$singleProduct->name}}</p>
      <p>Amount: {{$singleProduct->amount}}</p>
  @endforeach

    <a href="{{route("cart.delete")}}">Empty</a>

</body>
</html>
