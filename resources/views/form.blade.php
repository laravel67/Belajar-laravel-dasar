<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form CSRF TOKEN</h1>

    <form action="{{ route('csrf') }}" method="post">
        @csrf
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        <input type="text" name="body" value="Uji coba CSRF Token">
        <button type="submit">Submit</button>
    </form>
</body>
</html>