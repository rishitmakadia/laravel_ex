<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example</title>
</head>
<body>
    <h1>Hello!!!</h1>
    <h3>welcome.blade.php</h3>
    {{-- {{$detail}} --}}
    <br>
    {{-- {{route('home')}} --}}
    <br>
    {{-- {{$url}} --}}

    {{-- <form method="POST" action="/profile">
    @csrf
    <!-- Equivalent to... -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}

     <h4>This is welcome.blade.php <br> {{$share}} </h4>
</form>
</body>
</html>