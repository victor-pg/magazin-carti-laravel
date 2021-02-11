<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Adauga</title>
</head>

<body>

    <div class="row">
        <div class="container">
            <form method="POST" action="{{ route('saveProduct') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="title">Titlul</label>
                    <input type="text" required class="form-control" id="title" name="title" placeholder="Indica titlul">
                </div>
                <div class="form-group">
                    <label for="description">Descriere</label>
                    <input type="text" required class="form-control" id="description" name="description" placeholder="Indica descrierea">
                </div>
                <div class="form-group">
                    <label for="content">Text</label>
                    <textarea class="form-control" required id="content" rows="3" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Pret</label>
                    <input type="number" class="form-control" required id="price" name="price" placeholder="Indica pretul">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="img" required name="book-image" multiple enctype="multipart/form-data"/>
                </div>
                <input type="submit" value="Adauga" class="btn btn-primary"/>
            </form>
        </div>
    </div>

</body>

</html>