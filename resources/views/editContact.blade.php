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
    <form action="{{route("contact.save", ["contactId" => $singleContact->id])}}" method="POST">
        {{csrf_field()}}
        <input value="{{$singleContact->email}}" type="text" name="email" placeholder="Enter email">
        <input value="{{$singleContact->subject}}" type="text" name="subject" placeholder="Enter subject">
        <input value="{{$singleContact->message}}" type="text" name="message" placeholder="Enter message">
        <button class="btn btn-primary">Edit</button>
    </form>

@endsection

</body>
</html>
