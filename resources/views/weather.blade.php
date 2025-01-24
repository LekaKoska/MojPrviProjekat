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

        @foreach($prognoza as $city => $temperature)
            <p>{{$city}}</p>
            <p>{{$temperature}}</p>

        @endforeach
    @endsection
</body>
</html>
