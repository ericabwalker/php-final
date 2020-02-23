<?php
include "templates/header.php";
include "controller.php";

if (isset($_POST['submit'])) {
  try {
    $controller = new Controller();
    $result = $controller->display_books();
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
}
?>

<h1>Display Books</h1>
<div class="container">
  <table class="table" method="POST">
    <thead class="thead-light">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Pages</th>
        <th scope="col">Category</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $controller = new Controller();
      $result = $controller->display_books();
      foreach ($result as $row) {
        echo "<tr> <td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" .
          $row[2] . "</td><td>" . $row[3] . "</td><td><a href=\"update.php?bookID=" . $row[4] . "\">Edit</a></td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>