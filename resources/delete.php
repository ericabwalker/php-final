<?php
use Ericabwalker\PHPfinal\Models\Book;
include "templates/header.php";


// if (isset($_POST['submit'])) {
//   try {
//     $controller = new BooksController();
//     $bookID = $_POST['Books'][0];
//     $controller->delete_book($bookID);
//   } catch (PDOException $e) {
//     echo 'Connection failed: ' . $e->getMessage();
//   }
// }
?>
<h1>Delete a Book</h1>
<div class="container">
  <form method="POST" action="/delete">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select title to delete</label>
      <select name="Books[]" class="form-control" id="exampleFormControlSelect1">
        <?php
        $book = new Book();
        $books = $book->findAll();
        foreach ($books as $book) {
          $bookID = $book['bookID'];
          $title = $book['title'];
          echo "<option value=$bookID> $title </option>";
        }
        ?>
      </select>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <input type="submit" name="submit" class="btn btn-outline-info" value="Delete Book" />
      </div>
    </div>
  </form>
</div>
</body>
</html>