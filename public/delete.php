<?php include "templates/header.php"; ?>
  <h1>Delete a Book</h1>

  <div class="container">
    <form>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Select title to delete</label>
        <select class="form-control" id="exampleFormControlSelect1">
          <option>Title 1</option>
          <option>Title 2</option>
          <option>Title 3</option>
          <option>Title 4</option>
          <option>Title 5</option>
        </select>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-outline-info">Delete book</button>
        </div>
      </div>
    </form>
  </div>

</body>

</html>