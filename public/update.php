<?php
include "templates/header.php";
include "controller.php";

if (isset($_POST['submit'])) {
  try {
    $controller = new Controller();
    // $bookID = $_POST['Books'][0];
    // $controller->display_one_book($bookID);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}
?>


<h1>Edit a Book</h1>

<div class="container">
  <form method="POST">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select title to update</label>
      <select name="Books[]" class="form-control" id="exampleFormControlSelect1">
        <?php
        $controller = new Controller();
        $books = $controller->display_titles();
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
        <input type="submit" name="submit" class="btn btn-outline-info" value="Select Book" />
      </div>
      <div style="padding: 40px"></div>
    </div>
  </form>


  <form method="POST">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-1 col-form-label">Book ID</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="bookID" name="bookID" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-1 col-form-label">Title</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="title" name="title">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-1 col-form-label">Author</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="author" name="author">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-1 col-form-label">Pages</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="pages" name="pages">
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-1 pt-0">Category</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="category" value="F" checked>
            <label class="form-check-label" for="category">
              Fiction
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="category" value="NF">
            <label class="form-check-label" for="category">
              Non-fiction
            </label>
          </div>
        </div>
      </div>
    </fieldset>
    <div class="form-group row">
      <div class="col-sm-10">
        <input type="submit" name="submit" class="btn btn-outline-info" value="Update Book" />
      </div>
    </div>
  </form>
</div>
</body>

</html>