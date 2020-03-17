<?php
use Ericabwalker\PHPfinal\Persistence\MySQLPersistence;
use Ericabwalker\PHPfinal\Repositories\BookRepository;
include "templates/header.php";
?>
<h1>Delete a Book</h1>
<div class="container">
  <form method="POST" action="/delete">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Select title to delete</label>
      <select name="Books[]" class="form-control" id="exampleFormControlSelect1">
        <?php
        $mysql = new MySQLPersistence();
        $repo = new BookRepository($mysql);
        $books = $repo->findAll();
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
        <input type="submit" name="submit" class="btn btn-outline-info" value="Delete Book" 
        <?php 
        $mysql = new MySQLPersistence();
        $repo = new BookRepository($mysql);
        $books = $repo->findAll();
        if(count($books) == 0) 
        {echo "disabled";}?>/>
      </div>
    </div>
  </form>
</div>
</body>

</html>