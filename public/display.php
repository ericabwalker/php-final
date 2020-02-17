<?php include "src/book.php"?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Display Books</title>
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
          <a class="nav-item nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active" href="#">Display Books</a>
          <a class="nav-item nav-link" href="#">Add Book</a>
          <a class="nav-item nav-link" href="#">Edit Book</a>
          <a class="nav-item nav-link" href="#">Delete Book</a>
        </div>
      </div>
    </nav>
  </header>
  <h1>Display Books</h1>

  <div class="container">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Pages</th>
          <th scope="col">Category</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        
        
        
        ?>



        <tr>
          <th scope="row">Book1</th>
          <td>Author1</td>
          <td>200</td>
          <td>Fiction</td>
        </tr>
        <tr>
          <th scope="row">Book2</th>
          <td>Author 2</td>
          <td>410</td>
          <td>Non-fiction</td>
        </tr>
        <tr>
          <th scope="row">Book</th>
          <td>Author3</td>
          <td>3020</td>
          <td>Fiction</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>