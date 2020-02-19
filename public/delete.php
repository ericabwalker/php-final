<?php
include "templates/header.php";
include "../controller.php";

if (isset($_POST['submit'])) {
  try {
    $controller = new Controller();
    $result = $controller->display_titles();
    // $controller->delete_book($selected_title);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}
?>
<h1>Delete a Book</h1>

<div class="container">
  <form method="POST">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select title to delete</label>
      <select class="form-control" id="exampleFormControlSelect1">
        <?php
        $controller = new Controller();
        $result = $controller->display_books();
        foreach ($result as $title) {
          echo "<option value=$title[0]>" . $title[0] . "</option>";
        }
        ?>
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