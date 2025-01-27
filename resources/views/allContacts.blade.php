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
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allContacts as $singleContact)
            <tr>
                <td>{{$singleContact->email}}</td>
                <td>{{$singleContact->subject}}</td>
                <td>{{$singleContact->message}}</td>
                <td>
                    <a class="btn btn-danger" href="{{route("deleteContact", ["contacts" => $singleContact->id ]) }}">Delete</a>
                    <a class="btn btn-primary" href="{{route("contact.save", ["contactId" => $singleContact->id])}}">Edit</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
</body>
</html>


