<?php
include "templates/header.php";
// what this will do is pull each key ex(title) into a variable ex($title)
extract($errors);
?>
<h1>Edit a Book</h1>
<div class="container">
  <form method="POST">
    <div class="form-group row">
      <label for="bookID" class="col-sm-1 col-form-label">Book ID</label>
      <div class="col-sm-5"> 
        <input type="text" class="<?php echo isset($bookID) ? 'form-control is-invalid' : 'form-control'; ?>" 
        id="bookID" name="bookID" value="<?php echo $book->bookID?>" readonly>
        <?php echo isset($bookID) ? "<div class=\"invalid-feedback\">$bookID</div>" : ""; ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="title" class="col-sm-1 col-form-label">Title</label>
      <div class="col-sm-5">
        <input type="text" class="<?php echo isset($title) ? 'form-control is-invalid' : 'form-control'; ?>" 
        id="title" name="title" value="<?php echo $book->title?>">
        <?php echo isset($title) ? "<div class=\"invalid-feedback\">$title</div>" : ""; ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="author" class="col-sm-1 col-form-label">Author</label>
      <div class="col-sm-5">
        <input type="text" class="<?php echo isset($author) ? 'form-control is-invalid' : 'form-control'; ?>" 
        id="author" name="author" value="<?php echo $book->author?>">
        <?php echo isset($author) ? "<div class=\"invalid-feedback\">$author</div>" : ""; ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="pages" class="col-sm-1 col-form-label">Pages</label>
      <div class="col-sm-2">
        <input type="text" class="<?php echo isset($pages) ? 'form-control is-invalid' : 'form-control'; ?>" 
        id="pages" name="pages" value="<?php echo $book->pages?>">
        <?php echo isset($pages) ? "<div class=\"invalid-feedback\">$pages</div>" : ""; ?>
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-1 pt-0">Category</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="category" value="F" 
            <?php if($book->category == "F") {echo "checked";}?>>
            <label class="form-check-label" for="category">Fiction</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="category" value="NF"
            <?php if($book->category == "NF") {echo "checked";}?>>
            <label class="form-check-label" for="category">Non-fiction</label>
          </div>
        </div>
      </div>
    </fieldset>
    <div class="form-group row">
      <div class="col-sm-10">
        <input type="submit" name="submit" class="btn btn-outline-info" value="Update Book"/>
      </div>
    </div>
  </form>
</div>
</body>

</html>