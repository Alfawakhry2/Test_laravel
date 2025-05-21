<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
</head>
<body>
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="email" name="email" required placeholder="البريد الإلكتروني">
    <button type="submit">إرسال رابط إعادة التعيين</button>
</form>
</body>
</html>
