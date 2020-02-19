<?php include "templates/header.php"; ?>
<h1>Edit a Book</h1>

<div class="container">
  <form>
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
        <button type="submit" class="btn btn-outline-info">Update book</button>
      </div>
    </div>
  </form>
</div>


</body>

</html>