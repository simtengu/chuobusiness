<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>send email</title>
</head>
<body>
    <form method="POST" action="{{ route('account') }}">
      @csrf
      <input type="text" name="body">
      <button type="submit">submit</button>

    </form>
</body>
</html>