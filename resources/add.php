<?php
include "templates/header.php";
?>
<h1>Add a Book</h1>
<div class="container">
  <form method="POST" action="/add">
    <div class="form-group row">
      <label for="title" class="col-sm-1 col-form-label">Title</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="title" name="title">
      </div>
    </div>
    <div class="form-group row">
      <label for="author" class="col-sm-1 col-form-label">Author</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="author" name="author">
      </div>
    </div>
    <div class="form-group row">
      <label for="pages" class="col-sm-1 col-form-label">Pages</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" id="pages" name="pages">
      </div>
    </div>
    <fieldset class="form-group">
      <div class="row">
        <legend class="col-form-label col-sm-1 pt-0">Category</legend>
        <div class="col-sm-10">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="category" id="category" value="F">
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
        <input type="submit" name="submit" class="btn btn-outline-info" value="Add Book" />
      </div>
    </div>
  </form>
</div>
</body>
</html>