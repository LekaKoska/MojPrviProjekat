<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    @foreach($allContacts as $singleContact)
        <p>Email: {{$singleContact->email}}</p>
        <p>Subject: {{$singleContact->subject}}</p>
        <p>Message: {{$singleContact->message}}</p>
    @endforeach
</body>
</html>
