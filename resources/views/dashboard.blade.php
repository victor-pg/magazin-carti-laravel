<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Dashboard</title>
</head>

<body>

    <div class="row">
        <div class="container">
            <button class="btn btn-warning m-4">
                <a href="/" class="text-white">Home</a>
            </button>
            <button class="btn btn-primary m-4">
                <a href="/admin/add" class="admin-add-button">Adauga</a>
            </button>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titlu</th>
                        <th scope="col" colspan="2">Actiuni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->title}}</td>
                        <td>
                            <a href="{{ route('adminEdit',['id'=>$product->id]) }}"><img src='{{asset("img/edit.svg")}}' alt="update-icon"></a>
                        </td>
                        <td>
                            <form action="{{ route('adminDelete') }}" method="post">
                                @csrf
                                <input type="hidden" name="deleted-id" value="{{$product->id}}" />
                                <button class="reset-this">
                                    <img src='{{asset("img/delete.svg")}}' alt="delete-icon">
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>