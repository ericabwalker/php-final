<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Book List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="booklistStyles.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>


<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #21B5B6">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="/display">Display Books</a>
                    <a class="nav-item nav-link" href="#">Add Book</a>
                    <a class="nav-item nav-link" href="#">Edit Book</a>
                    <a class="nav-item nav-link" href="#">Delete Book</a>
                </div>
            </div>
        </nav>
    </header>
    <h1>Book List</h1>
    <h2>A way to list all of your books!</h2>

    <div class="container">
        <div class="card text-center">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title">Welcome to Book List!</h5>
                <p class="card-text">A way for you to list all of the books on your bookshelf. Here you can add a book,
                    edit an existing book or delete a book from your bookshelf. Let's get started!</p>
                <a href="#" class="btn btn-info">Add a book!</a>
            </div>
            <div class="card-footer text-muted"></div>
        </div>
    </div>
</body>

</html>