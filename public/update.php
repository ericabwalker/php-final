<?php
include "templates/header.php";
include "controller.php";

if (isset($_GET['bookID'])) {
  try {
    $controller = new Controller();
    $book_to_edit = new Book();
    $bookID = $_GET['bookID'];
    $book_to_edit = $controller->display_one_book($bookID);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}
?>


<h1>Edit a Book</h1>

<div class="container">
  <form method="GET">
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-1 col-form-label">Book ID</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="bookID" name="bookID" value="<?php echo $book_to_edit->bookID?>"readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-1 col-form-label">Title</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $book_to_edit->title?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-1 col-form-label">Author</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="author" name="author" value="<?php echo $book_to_edit->author?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-1 col-form-label">Pages</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="pages" name="pages" value="<?php echo $book_to_edit->pages?>">
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-1 pt-0">Category</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="category" value="<?php echo $book_to_edit->category?>" 
            <?php if($book_to_edit->category == "F") {
              echo "checked";}?>>
            <label class="form-check-label" for="category">
              Fiction
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="category" value="<?php echo $book_to_edit->category?>"
            <?php if($book_to_edit->category == "NF") {
              echo "checked";}?>>
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