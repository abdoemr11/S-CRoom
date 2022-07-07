<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @dd(Auth::guard('students')->user())
    @if(auth()->guard('students')->check())
        hi
    @else
        nooooooooo
@endif
{{--    {{ auth()->guard('students')->user()->name }}--}}

</body>
</html>
