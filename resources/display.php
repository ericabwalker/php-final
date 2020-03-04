<?php
include "templates/header.php";
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
      foreach ($books as $row) {
        echo "<tr> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td><td>" .
          $row['pages'] . "</td><td>" . $row['category'] . "</td><td><a href=\"update?bookID=" . 
          $row['bookID'] . "\">Edit</a></td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>