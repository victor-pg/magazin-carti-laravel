<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Cos</title>
</head>

<body>

    <div class="details-page">
        @include('includes.navbar');
        <div class="container details-content">
            @foreach($item as $i)
            <div class="details-image">
                <img src='{{asset("/img/$i->img")}}' alt="book-image">
            </div>
            <div class="details-text">
                <h3 class="lead display-4">{{$i->title}}</h3>
                <p>{{$i->text}}</p>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>