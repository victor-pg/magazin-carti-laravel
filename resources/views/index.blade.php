<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    <section class="home-section">
        @include('includes.navbar')
        <h1>
            Va prezentam top cele mai interesante carti <br>
        </h1>
    </section>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 product" id={{$product->id}}>
                <h3>{{$product->title}}</h3>
                <img src='{{asset("img/$product->img")}}' alt="image" class="standart-image-size" />
                <p>{{$product->description}}</p>
                <p class="text-muted .text-danger">{{$product->price}} lei</p>
                <div class="card-buttons">
                    <div>
                        <a class="btn btn-primary" href="/details/{{$product->id}}" role="button">Vezi detalii &raquo;</a>
                    </div>
                    <div>
                        <form action="{{ route('add-to-cart') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="id" />
                            <input type="submit" class="btn btn-warning" value="Adauga" />
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer>
        <h3 class="lead">&copy; Padure Cristi, W-1742</h3>
    </footer>
</body>

</html>