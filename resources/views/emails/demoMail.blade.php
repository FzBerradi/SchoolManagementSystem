<!DOCTYPE html>
<html>
<head>
    <title>ensa tetouan</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    @if(isset($data['attachment']))
    {{ $message->embed($data['attachment']) }}
    @endif
   <p>Thank you</p>
</body>
</html>