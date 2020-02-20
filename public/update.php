<?php
include "templates/header.php";
include "controller.php";

if (isset($_POST['submit'])) {
  try {
    $controller = new Controller();
    $bookID = $_POST['Books'][0];
    $controller->delete_book($bookID);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}
?>


<h1>Edit a Book</h1>

<div class="container">
  <form>
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
        <input type="submit" class="btn btn-outline-info" value="Select Book" />
      </div>
    </div>


    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-1 col-form-label">Title</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="inputEmail3">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-1 col-form-label">Author</label>
      <div class="col-sm-5">
        <input type="password" class="form-control" id="inputPassword3">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-1 col-form-label">Pages</label>
      <div class="col-sm-2">
        <input type="password" class="form-control" id="inputPassword3">
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-1 pt-0">Category</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
            <label class="form-check-label" for="gridRadios1">
              Fiction
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
            <label class="form-check-label" for="gridRadios2">
              Non-fiction
            </label>
          </div>
        </div>
      </div>
    </fieldset>
    <div class="form-group row">
      <div class="col-sm-10">
        <input type="submit" class="btn btn-outline-info" value="Update Book"/>
      </div>
    </div>
  </form>
</div>
</body>
</html>