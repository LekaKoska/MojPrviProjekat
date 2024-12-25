<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

<form action="/admin/send-product" method="POST">
    @if($errors->any())
        <p>{{$errors->first()}}</p>
    @endif
    {{ csrf_field() }}
    <input type="text" name="name" placeholder="Enter a name">
    <input type="text" name="description" placeholder="Enter description">
    <input type="number" name="amount" placeholder="Enter amount">
    <input type="number" name="price" placeholder="Enter a price">
    <input type="text" name="image" placeholder="Enter image">
    <button>Add product</button>
</form>
</body>
</html>
