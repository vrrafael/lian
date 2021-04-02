<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>

    <form action="{{route('authenticate')}}" method="POST">
        <input type="text" name="email"> 
        <input type="password" name="password">
        <input type="submit" name="login" id="login">
        @csrf
    </form>

    </div>
</body>
</html>