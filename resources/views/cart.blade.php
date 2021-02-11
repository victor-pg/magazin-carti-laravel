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

    <div class="cart-page">
        @include('includes.navbar');
        <div class="container cart-items">
            @if(isset($message))
                <h1 class="lead text-center display-3">Cosul este gol</h1>
            @else
            @foreach($cartProducts as $cartItem)
            <div class="row cart-item">
                <img src='{{asset("img/$cartItem->img")}}' alt="cart-item" class="cart-image">
                <div class="cart-text">
                    <h3>{{$cartItem->title}}</h3>
                    <p>{{$cartItem->description}}</p>
                </div>
                <div class="price text-muted">
                    <p>{{$cartItem->price}} lei</p>
                </div>
                <div class="delete-button">
                    <form action="{{ route('removeFromCart',['id'=>$cartItem->id]) }}" method="POST">
                    @csrf
                        <button type="submit" class="reset-this">
                            <img src='{{asset("img/delete.svg")}}' alt="delete-icon" class="delete-icon">
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
            <h3 class="lead text-right font-weight-bold">Pret total : {{$totalPrice}} lei</h3>
            @endif
        </div>
    </div>

</body>

</html>