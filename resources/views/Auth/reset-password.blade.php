<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{ route('password.update') }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" required placeholder="البريد">
    <input type="password" name="password" required placeholder="كلمة السر الجديدة">
    <input type="password" name="password_confirmation" required placeholder="تأكيد كلمة السر">
    <button type="submit">تغيير كلمة السر</button>
</form>

</body>
</html>
